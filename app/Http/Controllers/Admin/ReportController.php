<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\RegisterUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $request){

        if ($request->has('range_date')) {
            $date = explode(" - ", $request->range_date);
            
            // Pastikan format tanggal sesuai menggunakan Carbon
            $startDate = Carbon::parse($date[0])->format('Y-m-d');
            $endDate = Carbon::parse($date[1])->format('Y-m-d');
            $registers = RegisterUser::whereBetween('visit_date', [$startDate, $endDate])
            ->latest()
            ->get()
            ->map(function($item){
                $selisihMenit = 0;
                $checkin = $item->check_in;
                $checkout = $item->check_out;
    
                // Konversi ke instance Carbon
                $checkinCarbon = Carbon::parse($checkin);
                $checkoutCarbon = Carbon::parse($checkout);
    
                // Hitung selisih dalam menit
                $selisihMenit = $checkinCarbon->diffInMinutes($checkoutCarbon);
                $item->minute = $selisihMenit;
    
                return $item;
            });

            $data['registers'] = $registers;
            $data['startDate'] = $startDate;
            $data['endDate'] = $endDate;
        }
       
        $data['range_date'] = $request->range_date ?? null;

        return view('admin.report',$data);
    }
}
