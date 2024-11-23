@extends('manager.layout.app')
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
            <li class="breadcrumb-item"><a href="{{route('manager.home.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Registrasi Visitor</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-center">Detail Visitor</h5>
                <div class="d-flex justify-content-center align-item-center">
                    <!--Content table-->
                    <table class="w-50-mobile w-50">
                     
                          <tr>
                              <th class="pe-2 text-nowrap ">Kode Registrasi</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->register_code}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Kategori</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap text-capitalize"> : {{$register->category}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Nama</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->name}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Nomor KTP</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->identity_number}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Email</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->email}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Nomor Kantor</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->office_number}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Nomor Telepon</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->phone_number}}</td>
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Perusahaan</th> <!-- Adjust spacing with pe-* class -->
                              @if ($register->visitor_type == 'tenant')
                              <td class="text-nowrap"> : {{$register->tenant->name ?? ''}}</td>
                              
                              @else
                              
                              <td class="text-nowrap"> : {{$register->vendor_name}}</td>
                              @endif
                          </tr>
                          <tr>
                              <th class="pe-2 text-nowrap ">Referensi</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap"> : {{$register->reference}}
                                @if ($register->attachment_reference)
                                    <a href="#" class="btn btn-sm btn-success ms-3">Download</a>
                                @endif
                                </td>
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
                          <tr>
                              <th class="pe-2 text-nowrap ">Peralatan</th> <!-- Adjust spacing with pe-* class -->
                              <td class="text-nowrap">
                                <ul>
                                    @if ($register->laptop == 1)
                                        <li>Laptop</li>
                                    @endif
                                    @if ($register->handphone == 1)
                                        <li>Handphone</li>
                                    @endif
                                    @if ($register->other == 1)
                                        <li>{{$register->other_text}}</li>
                                    @endif
                                </ul>
                            </td>
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
                      
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-center">Personal Authorized</h5>
                    <div class="d-flex justify-content-center">
                        <table class="w-50-mobile w-50">
                            <tr>
                                <th class="pe-2 text-nowrap ">Nama</th> <!-- Adjust spacing with pe-* class -->
                                <td class="text-nowrap"> : {{$personal->name}}</td>
                            </tr>
                            <tr>
                                <th class="pe-2 text-nowrap ">Nomor KTP</th> <!-- Adjust spacing with pe-* class -->
                                <td class="text-nowrap"> : {{$personal->identity_number}}</td>
                            </tr>
                            <tr>
                                <th class="pe-2 text-nowrap ">Email</th> <!-- Adjust spacing with pe-* class -->
                                <td class="text-nowrap"> : {{$personal->email}}</td>
                            </tr>
                            <tr>
                                <th class="pe-2 text-nowrap ">Nomor Kantor</th> <!-- Adjust spacing with pe-* class -->
                                <td class="text-nowrap"> : {{$personal->office_number}}</td>
                            </tr>
                            <tr>
                                <th class="pe-2 text-nowrap ">Nomor Telepon</th> <!-- Adjust spacing with pe-* class -->
                                <td class="text-nowrap"> : {{$personal->phone_number}}</td>
                            </tr>
                           
                            <tr>
                                <th class="pe-2 text-nowrap ">Referensi</th> <!-- Adjust spacing with pe-* class -->
                                <td class="text-nowrap text-capitalize"> : {{$personal->agreement}} 
                                    @if ($personal->agreement_reference)
                                        <a href="#" class="btn btn-sm btn-success ms-3">Download</a>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center gap-2 mt-5 pb-5">
                        <a href="{{route('manager.user-register.index')}}" class="btn btn-danger">Back</a>
                    </div>
                </div>       
            </div> <!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row -->
@endsection
@section('scripts')
@endsection
