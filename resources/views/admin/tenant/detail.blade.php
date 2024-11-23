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
        <h4 class="fs-18 fw-semibold m-0">Tenant</h4>
    </div>

    <div class="text-end">
        <ol class="breadcrumb m-0 py-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Tenant</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center align-item-center">
                    <!--Content table-->
                
                    <table class="w-50-mobile w-50">
                     
                          <tr>
                              <th class="pe-2 text-nowrap ">Kode Registrasi</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->register_code}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Nama</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->name}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Perusahaan</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->company}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Referensi</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->reference}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Area yang Dituju</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->area}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Nama Ruangan</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->room_name}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Keperluan</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->necessary}}</td>
                          </tr>
                          @if ($details->isNotEmpty())
                              <tr>
                                  <th class="pe-2 text-nowrap align-item-center">Orang</th> <!-- Adjust spacing with pe-* class -->
                                  <td class="text-nowrap">
                                      <ol class="me-5">
                                          @foreach ($details as $detail)
                                              <li>{{$detail->name}} - {{$detail->identity_number}} - {{$detail->phone_number}}</li>
                                          @endforeach
                                      </ol>
                                  </td>
                              </tr>
                          @endif
                          <tr>
                              <th class="pe-2 text-nowrap ">Status</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->status}}</td>
                          </tr>
                      </table>
                      <!-- /Content Table -->
                </div>
                <div class="d-flex justify-content-center gap-2 mt-5">
                    <a href="{{route('admin.user-register.index')}}" class="btn btn-danger">Back</a>
                </div>
                
            </div>
            
            </div> <!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row -->
@endsection
@section('scripts')
@endsection

