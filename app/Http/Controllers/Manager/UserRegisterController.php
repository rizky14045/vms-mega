<?php

namespace App\Http\Controllers\Manager;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Tenant;
use App\Models\Schedule;
use App\Models\BlockUser;
use App\Mail\SuccessEmail;
use App\Models\Reschedule;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use App\Models\DetailVisitor;
use App\Models\PersonalRegister;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserRegisterController extends Controller
{
    public function index(Request $request){

        $registers = RegisterUser::when($request->range_date, function ($query) use ($request) {
            $date = explode(" - ", $request->range_date);
        
            // Pastikan format tanggal sesuai menggunakan Carbon
            $startDate = Carbon::parse($date[0])->format('Y-m-d');
            $endDate = Carbon::parse($date[1])->format('Y-m-d');
        
            // Gunakan whereBetween langsung, tanpa if
            $query->whereBetween('visit_date', [$startDate, $endDate]);
        })
        ->where('rangking','!=',1)
        ->orderBy('rangking','asc')
        ->paginate(25)->appends(request()->query());
        $modifieds = $registers->map(function($item){
            $item->qrcode = QrCode::size(100)->generate(route('qrcode',['uuid' => $item->uuid]));
            return $item;

        });
        $data['range_date'] = $request->range_date ?? null;
        $registers->setCollection($modifieds);
        $data['registers'] = $registers;
        return view('manager.user-register.index',$data);
    }

    public function approve($id){
        
        $register = RegisterUser::where('id',$id)->first();
        $register->status = 'Sudah Disetujui' ;
        $register->rangking = 3;
        $register->save();

        $qrcode = QrCode::size(100)->generate(route('qrcode',['uuid' => $register->uuid]));
        $details = DetailVisitor::where('register_user_id', $register->id)->get();
        Mail::to($register->email)->send(new SuccessEmail($register,$details,$qrcode));
        
        Alert::success('Approve Berhasil', 'Registrasi user berhasil di setujui!');
        return redirect()->back();
    }

    public function create(){
        $data['key'] = Uuid::uuid4();
        $data['tenants'] = Tenant::all();
        return view('manager.user-register.create',$data);
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();
            $checkRegister = RegisterUser::where('key',$request->key)->first();
            if($checkRegister){
                Alert::success('Tambah Berhasil', 'Registrasi user berhasil di dibuat!');
                return redirect()->route('manager.user-register.index');
            }

            $attachmentReference = '';
            $attachmentAgreement = '';
            
            if($request->hasFile('attachment_reference'))
            {
                $file= $request->file('attachment_reference');
                $image_name = 'attachment-reference-' . time() .'.'. $file->getClientOriginalExtension();
                $file->move(public_path('uploads/attachment_reference/'),$image_name);   
                $attachmentReference = $image_name;
            }

            if($request->hasFile('attachment_agreement'))
            {
                $file= $request->file('attachment_agreement');
                $agreement_name = 'attachment-agreement-' . time() .'.'. $file->getClientOriginalExtension();
                $file->move(public_path('uploads/attachment_agreement/'),$agreement_name); 
                $attachmentAgreement = $agreement_name;
            }
            $block = [];
            $blockUser = BlockUser::where('identity_number',$request->identity_number)->first();
            if($blockUser){
                $block [] =[
                    'name' => $request->name,
                    'identity_number' => $request->identity_number
                ];
            }
            if($request->has('visitor_name')){
                $visitors = [];
    
                foreach ($request->visitor_name as $index => $unit) {
                    $visitors[] = [
                        'name' => $request->visitor_name[$index],
                        'identity_number' => $request->visitor_identity_number[$index],
                        'phone_number' => $request->visitor_phone_number[$index],
                        'company' => $request->visitor_company[$index]
                    ];
                    $blockUsers = BlockUser::where('identity_number',$request->visitor_identity_number[$index])->first();
                    if($blockUsers){
                        $block [] =[
                            'name' =>  $request->visitor_name[$index],
                            'identity_number' => $request->visitor_identity_number[$index]
                        ];
                    }
                }
            }
            if(!empty($block)){
                return redirect()->route('manager.user-register.index')->with('error',$block);
            }

            $register = RegisterUser::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'identity_number' => $request->identity_number,
                'visitor_type' => $request->visitor_type,
                'tenant_id' => $request->visitor_type == 'tenant' ? $request->tenant_id : null,
                'vendor_name' => $request->visitor_type == 'vendor' ? $request->vendor_name : null,
                'vendor_address' => $request->visitor_type == 'vendor' ?$request->vendor_address : null,
                'email' => $request->email,
                'office_number' => $request->office_number,
                'phone_number' => $request->phone_number,
                'reference' => $request->reference,
                'attachment_reference' => $attachmentReference,
                'area' => $request->area,
                'room_name' => $request->room_name,
                'visit_date' => $request->visit_date,
                'necessary' => $request->necessary,
                'laptop' => $request->laptop ?? false,
                'handphone' => $request->handphone ?? false,
                'other' => $request->other ?? false,
                'other_text' => $request->other ? $request->other_text : '',
                'category' => $request->category,
                'check_in_status' => 1,
                'status' => 'Menunggu Persetujuan manager',
                'rangking' => 1,
                'key' => $request->key
            ]);

            $code = date('Y-m-d') .'-'.$register->id;

            $register->register_code = $code;
            $register->save();
    
            PersonalRegister::create([
                'register_user_id' => $register->id,
                'name' => $request->personal_name,
                'identity_number' => $request->personal_identity_number,
                'email' => $request->personal_email,
                'office_number' => $request->personal_office_number,
                'phone_number' => $request->personal_phone_number,
                'agreement' => $request->agreement,
                'agreement_reference' => $attachmentAgreement,
                'note' => $request->note,
            ]);
    
            if($request->has('visitor_name')){
                $visitors = [];
    
                foreach ($request->visitor_name as $index => $unit) {
                    $visitors[] = [
                        'name' => $request->visitor_name[$index],
                        'identity_number' => $request->visitor_identity_number[$index],
                        'phone_number' => $request->visitor_phone_number[$index],
                        'company' => $request->visitor_company[$index]
                    ];
                }
    
    
                foreach ($visitors as $visitor) {
                    DetailVisitor::Create([
                        'register_user_id' => $register->id,
                        'name' => $visitor['name'],
                        'identity_number' => $visitor['identity_number'],
                        'phone_number' => $visitor['phone_number'],
                        'company' => $visitor['company'],
                    ]);
                };
            }

            DB::commit();
            Alert::success('Tambah Berhasil', 'Registrasi user berhasil di dibuat!');
            return redirect()->route('manager.user-register.index');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
       

    }

    public function detail($id){
        $data['register'] = RegisterUser::where('id', $id)->first();
        $data['details'] = DetailVisitor::where('register_user_id', $data['register']->id)->get();
        $data['personal'] = PersonalRegister::where('register_user_id', $data['register']->id)->first();
        return view('manager.user-register.detail',$data);
    }

    public function edit(){
        return view('manager.user-register.edit');
    }

    public function reschedule($id){
        $data['schedule'] = RegisterUser::where('id', $id)->first();
        return view('manager.user-register.reschedule',$data);
    }

    public function updateReschedule(Request $request,$id){
        try {
            DB::beginTransaction();
            
            $reschedule = RegisterUser::where('id', $id)->first();

            Reschedule::create([
                'register_user_id'=> $reschedule->id,
                'before_date' => $reschedule->visit_date,
                'after_date' => $request->reschedule_date,
            ]);
            $reschedule->visit_date = $request->reschedule_date;
            $reschedule->save();

            DB::commit();
            Alert::success('Reschedule Berhasil', 'Data Berhasil direschedule!');
            return redirect()->route('manager.user-register.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
