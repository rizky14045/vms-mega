<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tenants'] = Tenant::paginate(25);
        return view('admin.tenant.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tenant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            
            $tenant = Tenant::create([
                'name' => $request->name,
                'address' => $request->address,
            ]);

            DB::commit();
            Alert::success('Tambah Berhasil', 'Tenant berhasil dibuat!');
            return redirect()->route('admin.tenant.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tenant = Tenant::where('id', $id)->first();
        if(!$tenant){
            Alert::error('Data Tidak Ada','Data tidak ada!!');
            return redirect()->route('admin.tenant.index');
        }
        $data['tenant'] = $tenant;
        return view('admin.tenant.edit',$data);
    }

    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            
            $tenant = Tenant::where('id', $id)->first();
            $tenant->name = $request->name;
            $tenant->address = $request->address;
            $tenant->save();

            DB::commit();
            Alert::success('Ubah Berhasil', 'Tenant berhasil diubah!');
            return redirect()->route('admin.tenant.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            
            $tenant = Tenant::where('id', $id)->first();
            $tenant->delete();

            DB::commit();
            Alert::success('Hapus Berhasil', 'Tenant berhasil dihapus!');
            return redirect()->route('admin.tenant.index');
            
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
