<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlockUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BlockUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blocks'] = BlockUser::paginate(25);
        return view('admin.block-user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.block-user.create');
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
            
            $block = BlockUser::create([
                'name' => $request->name,
                'identity_number' => $request->identity_number,
            ]);

            DB::commit();
            Alert::success('Tambah Berhasil', 'Blocking User berhasil dibuat!');
            return redirect()->route('admin.block-user.index');

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
        $block = BlockUser::where('id', $id)->first();
        if(!$block){
            Alert::error('Data Tidak Ada','Data tidak ada!!');
            return redirect()->route('admin.block-user.index');
        }
        $data['block'] = $block;
        return view('admin.block-user.edit',$data);
    }

    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            
            $block = BlockUser::where('id', $id)->first();
            $block->name = $request->name;
            $block->identity_number = $request->identity_number;
            $block->save();

            DB::commit();
            Alert::success('Ubah Berhasil', 'Blocking User berhasil diubah!');
            return redirect()->route('admin.block-user.index');
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            
            $block = BlockUser::where('id', $id)->first();
            $block->delete();

            DB::commit();
            Alert::success('Hapus Berhasil', 'Blocking User berhasil dihapus!');
            return redirect()->route('admin.block-user.index');
            
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
