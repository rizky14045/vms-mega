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
        <h4 class="fs-18 fw-semibold m-0">User Block</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Data User Block</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('admin.block-user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group pb-3 col-md-6">
                        <label class="form-label" for="text-id">Nama</label>
                        <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nama" name="name" required>
                    </div>
                    <div class="form-group pb-3 col-md-6">
                        <label class="form-label" for="identity-id">Nomor KTP</label>
                        <input type="text" class="form-control mb-0" id="identity-id" placeholder="Masukan Nomor KTP" name="identity_number" required>
                    </div>
                   
                    <div class="text-center pb-3">
                        <a href="{{route('admin.block-user.index')}}" class="btn btn-danger">Back</a>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
         
            </div> <!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row -->

@endsection
@section('scripts')

@endsection

