<?php

namespace App\Http\Controllers\Admin;

use Ramsey\Uuid\Uuid;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use App\Models\DetailVisitor;
use App\Models\PersonalRegister;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserRegisterController extends Controller
{
    public function index(){

        $registers = RegisterUser::latest()->paginate(25);
        $modifieds = $registers->map(function($item){
            $item->qrcode = QrCode::size(100)->generate(route('admin.user-register.qrcode',['uuid' => $item->uuid]));
            return $item;

        });

        $registers->setCollection($modifieds);
        $data['registers'] = $registers;
        return view('admin.user-register.index',$data);
    }

    public function approve($id){
        
        $register = RegisterUser::where('id',$id)->first();
        $register->status = 'Sudah Disetujui';
        $register->rangking = 2;
        $register->save();
        
        Alert::success('Approve Berhasil', 'Registrasi user berhasil di setujui!');
        return redirect()->back();
    }

    public function create(){
        $data['key'] = Uuid::uuid4();
        return view('admin.user-register.create',$data);
    }

    public function store(Request $request){

        try {
            DB::beginTransaction();
            $checkRegister = RegisterUser::where('key',$request->key)->first();
            if($checkRegister){
                Alert::success('Tambah Berhasil', 'Registrasi user berhasil di dibuat!');
                return redirect()->route('admin.user-register.index');
            }
            $register = RegisterUser::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'identity_number' => $request->identity_number,
                'company' => $request->company,
                'company_address' => $request->company_address,
                'email' => $request->email,
                'office_number' => $request->office_number,
                'phone_number' => $request->phone_number,
                'reference' => $request->reference,
                'area' => $request->area,
                'room_name' => $request->room_name,
                'necessary' => $request->necessary,
                'laptop' => $request->laptop ?? false,
                'handphone' => $request->handphone ?? false,
                'other' => $request->other ?? false,
                'other_text' => $request->necessary,
                'status' => 'Menunggu Persetujuan',
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
                'onsite_check' => $request->onsite_check ?? false,
                'email_check' => $request->email_check ?? false,
                'oncall_check' => $request->oncall_check ?? false,
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
            return redirect()->route('admin.user-register.index');
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
       

    }

    public function detail($id){
        $data['register'] = RegisterUser::where('id', $id)->first();
        $data['details'] = DetailVisitor::where('register_user_id', $data['register']->id)->get();
        return view('admin.user-register.detail',$data);
    }

    public function edit(){
        return view('admin.user-register.edit');
    }

    public function qrcode($uuid){
        $register = RegisterUser::where('uuid', $uuid)->first();
        $data['register'] = $register;

        if(!$register){
            return redirect()->route('user.index');
        }
        $data['details'] = DetailVisitor::where('register_user_id', $register->id)->get();
        return view('admin.user-register.qrcode',$data);
    }
}
