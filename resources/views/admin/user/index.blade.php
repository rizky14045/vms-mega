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
        <h4 class="fs-18 fw-semibold m-0">User</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="d-flex justify-content-end pe-3 pt-3">
                <a href="{{route('admin.user.create')}}" class="btn btn-success">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap">No</th>
                                <th scope="col" class="text-nowrap">Nama</th>
                                <th scope="col" class="text-nowrap">Email</th>
                                <th scope="col" class="text-nowrap">Role</th>
                                <th scope="col" class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-nowrap">{{$loop->iteration}}</td>
                                <td class="text-nowrap">{{$user->name}}</td>
                                <td class="text-nowrap">{{$user->email}}</td>
                                <td class="text-nowrap">{{$user->role}}</td>
                                <td class="text-nowrap">
                                    <a href="{{route('admin.user.edit',['id'=>$user->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{route('admin.user.destroy',['id'=>$user->id])}}" method="POST" class="d-inline delete-form" id="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem(this)">Hapus</button>
                                    </form>
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
                  title: 'Hapus Data',
                  text: "Apakah kamu ingin menghapus data ?",
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