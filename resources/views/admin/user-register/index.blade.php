@extends('admin.layout.app')
@section('styles')
<style>
    .accordion-button::after {
        filter: invert(100%);
    }
</style>
@stop
@section('content')
    

<div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
    <div class="flex-grow-1">
        <h4 class="fs-18 fw-semibold m-0">Registrasi User</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Registrasi User</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="d-flex justify-content-end pe-3 pt-3">
                <a href="{{route('admin.user-register.create')}}" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap">No</th>
                                <th scope="col" class="text-nowrap">Kode Registrasi</th>
                                <th scope="col" class="text-nowrap">QrCode</th>
                                <th scope="col" class="text-nowrap">Nama Lengkap</th>
                                <th scope="col" class="text-nowrap">Nomor KTP</th>
                                <th scope="col" class="text-nowrap">Perusahaan / Unit Kerja</th>
                                <th scope="col" class="text-nowrap">Alamat Perusahaan</th>
                                <th scope="col" class="text-nowrap">Email</th>
                                <th scope="col" class="text-nowrap">Nomor Telepon Kantor</th>
                                <th scope="col" class="text-nowrap">Nomor Handphone</th>
                                <th scope="col" class="text-nowrap">Referensi</th>
                                <th scope="col" class="text-nowrap">Jumlah Orang</th>
                                <th scope="col" class="text-nowrap">Status</th>
                                <th scope="col" class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registers as $register)
                            <tr>
                                <td class="text-nowrap">{{$loop->iteration}}</td>
                                <td class="text-nowrap">{{$register->register_code}}</td>
                                <td class="text-nowrap">
                                    @if ($register->rangking == 2)
                                        {!!$register->qrcode!!}     
                                    @endif
                                </td>
                                <td class="text-nowrap">{{$register->name}}</td>
                                <td class="text-nowrap">{{$register->identity_number}}</td>
                                <td class="text-nowrap">{{$register->company}}</td>
                                <td class="text-nowrap">{{$register->company_address}}</td>
                                <td class="text-nowrap">{{$register->email}}</td>
                                <td class="text-nowrap">{{$register->office_number}}</td>
                                <td class="text-nowrap">{{$register->phone_number}}</td>
                                <td class="text-nowrap">{{$register->reference}}</td>
                                <td class="text-nowrap">{{$register->visitors->count() + 1}}</td>
                                <td class="text-nowrap">{{$register->status}}</td>
                    
                                <td class="text-nowrap">
                                    <a href="{{route('admin.user-register.detail',['id'=>$register->id])}}" class="btn btn-warning btn-sm">Detail</a>
                                    @if ($register->rangking == 1) 
                                        <form action="{{route('admin.user-register.approve',['id'=>$register->id])}}" method="POST" class="d-inline delete-form" id="delete-form">
                                            @csrf
                                            @method('PATCH')
                                            <button type="button" class="btn btn-success btn-sm" onclick="deleteItem(this)">Setujui</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
         
            </div> <!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row -->
@endsection
@section('scripts')
<script>
    function deleteItem(e){
              // console.log(form);
              Swal.fire({
                  title: 'Approve Data',
                  text: "Apakah kamu ingin menyutujui data ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Iya !'
              }).then((result) => {
                  if (result.isConfirmed) {
                      $(e).parent().submit();
                  }
              })
          }
  
  </script>
@endsection
