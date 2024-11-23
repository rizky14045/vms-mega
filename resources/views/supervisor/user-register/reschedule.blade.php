@extends('supervisor.layout.app')
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
        <h4 class="fs-18 fw-semibold m-0">Registrasi Visitor</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="{{route('supervisor.home.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Tambah Data Registrasi Visitor</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('supervisor.user-register.updateReschedule',['id'=>$schedule->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group pb-3">
                        <label class="form-label" for="email-id">Nama Lengkap</label>
                        <input type="text" required class="form-control mb-0" id="text-id" disabled value="{{$schedule->name}}">
                    </div>
                    <div class="form-group pb-3">
                        <label class="form-label" for="text-id">No KTP</label>
                        <input type="text" required class="form-control mb-0" id="text-id" disabled value="{{$schedule->identity_number}}">
                    </div>
                    <div class="form-group pb-3">
                        <label class="form-label" for="text-id">Tujuan</label>
                        <input type="text" required class="form-control mb-0" id="text-id" disabled value="{{$schedule->necessary}}">
                    </div>
                    <div class="form-group pb-3">
                        <label class="form-label" for="text-id">Tanggal Sebelum</label>
                        <input type="date" required class="form-control mb-0" id="text-id" disabled value="{{$schedule->visit_date}}">
                    </div>
                    <hr>
                    <h4>Rubah Tanggal Kunjungan</h4>
                    <div class="form-group pb-3 col-md-3">
                        <label class="form-label" for="text-id">Tanggal Schedule</label>
                        <input type="date" required class="form-control mb-0" id="text-id" name="reschedule_date">
                    </div>
                    <div class="text-center pb-3">
                        <a href="{{route('supervisor.user-register.index')}}" class="btn btn-danger">Back</a>

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

