<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Visitor Management - Bank Mega</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('ico.ico')}}">
    
        <!-- App css -->
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    
        <!-- Icons -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <style>
            /* Ensure full-height without white space */
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            
            .account-page, .vh-100, .bg-primary {
                min-height: 100vh; /* Always use full viewport height */
                margin: 0;
                padding: 0;
                background-color: #44546e;
            }
    
            /* Remove extra space */
            .container-fluid {
                padding: 0 !important;
            }
    
            /* Remove card overflow on smaller screens */
            .card {
                max-height: 95vh;
                overflow-y: auto;
            }
            .qrcode-mobile{
                display:none;
            }
            @media (max-width: 576px) {
                .w-50-mobile {
                    width: auto !important; /* Reset width on larger screens */
                }
                .qrcode-desktop{
                    display: none;
                }
                .qrcode-mobile{
                    display: flex;
                }
            }
            
            
        </style>
    </head>
   
    <body class="bg-white">
        <!-- Begin page -->
        <div class="account-page ">
            <div class="container-fluid p-0">
                <div style="background-color:#44546e; background-size: cover;background-repeat: no-repeat;" class="vh-100">
                    <div class="row d-flex align-items-center justify-content-center vh-100">
                        <div class="col-md-12 col-xl-9 col-sm-8 shadow-sm">
                            <div class="card p-4" style="max-height: 95vh; overflow-x: auto; max-width:100vw;">
                                <div class="card-body">
                                    <div class="text-center pb-3">
                                        <img src="{{asset('logo.png')}}" alt="logo-dark" class="mx-auto" height="50" />
                                    </div>
                                    <h5 class="text-center">Detail Visitor</h5>
                                    @if ( $register->visit_date != date('Y-m-d'))
                                        <div class="alert alert-danger">
                                            <div class="d-flex justify-content-center">
                                                User bisa masuk pada tanggal {{$register->visit_date}}
                                            </div>
                                        </div>
                                    @endif
                                   
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
                                                  <th class="pe-2 text-nowrap ">Tanggal Visit</th> <!-- Adjust spacing with pe-* class -->
                                                  <td class="text-nowrap"> : {{$register->visit_date}}</td>
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
                                              @if ($register->check_in)
                                                <tr>
                                                    <th class="pe-2 text-nowrap ">Checkin</th> <!-- Adjust spacing with pe-* class -->
                                                    <td class="text-nowrap"> : {{$register->check_in}}</td>
                                                </tr>
                                              @endif
                                              @if ($register->check_out)
                                                <tr>
                                                    <th class="pe-2 text-nowrap ">Checkout</th> <!-- Adjust spacing with pe-* class -->
                                                    <td class="text-nowrap"> : {{$register->check_out}}</td>
                                                </tr>
                                              @endif
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
                                                    <td class="text-nowrap text-capitalize"> : {{$personal->agreement}} </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center gap-2 mt-5">
                                            @if (Auth::check() && Auth::user()->role == 'petugas' && $register->visit_date == date('Y-m-d'))
                                                
                                                @if ($register->check_in_status == 1)
                                                    <form action="{{route('security.user-register.checkIn',['uuid' => $register->uuid])}}" method="post" enctype="multipart/form-data" class="approve-checkin">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group pb-3">
                                                            <label class="form-label" for="image-id">Bukti Foto</label>
                                                            <input type="file" required class="form-control mb-0" id="image-id" name="check_in_image" capture="environment">
                                                        </div>
                                                        <div class="form-group pb-3">
                                                            <label class="form-label" for="image-id">Foto KTP</label>
                                                            <input type="file" required class="form-control mb-0" id="image-id" name="check_in_identity" capture="environment">
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="button" class="btn btn-success" onclick="approveCheckIn(this)">Checkin</button>
                                                        </div>
                                                    </form>
                                                @endif
                                                @if ($register->check_out_status == 1)
                                                    <form action="{{route('security.user-register.checkOut',['uuid' => $register->uuid])}}" method="post" enctype="multipart/form-data" class="approve-checkout">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group pb-3">
                                                            <label class="form-label" for="image-id">Bukti Foto</label>
                                                            <input type="file" required class="form-control mb-0" id="image-id" name="check_out_image" capture="environment">
                                                        </div>
                                                        <div class="form-group pb-3">
                                                            <label class="form-label" for="image-id">Foto KTP</label>
                                                            <input type="file" required class="form-control mb-0" id="image-id" name="check_out_identity" capture="environment">
                                                        </div>
                                                        <div class="d-flex justify-content-center">
                                                            <button type="button" class="btn btn-warning" onclick="approveCheckOut(this)">Checkout</button>
                                                        </div>
                                                    </form>
                                                @endif
                                            @endif

    
                                        </div>
                                    </div>       
                                </div> <!-- end card body -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/libs/feather-icons/feather.min.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- App js-->
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/swal/sweetalert2.all.min.js')}}"></script>
        <script>
            function approveCheckIn(e){
                      // console.log(form);
                      Swal.fire({
                          title: 'Checkin Data',
                          text: "Apakah kamu ingin melakukan check in?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Iya !'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              $(e).parent().parent().submit();
                          }
                      })
                  }
            function approveCheckOut(e){
                      // console.log(form);
                      Swal.fire({
                          title: 'Checkout Data',
                          text: "Apakah kamu ingin melakukan check out?",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Iya !'
                      }).then((result) => {
                          if (result.isConfirmed) {
                              $(e).parent().parent().submit();
                          }
                      })
                  }
          
          </script>
        @include('sweetalert::alert')

    </body>
</html>