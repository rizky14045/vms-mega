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
                                    <div class="text-center">
                                        <img src="{{asset('logo.png')}}" alt="logo-dark" class="mx-auto pb-3" height="100" />
                                        <h5 class="mb-5">Detail Registrasi Visitor</h5>
                                    </div>  
                                   <div class="w-50-mobile w-50">
                                        @if (\Session::has('success'))
                                            <div class="alert alert-success">
                                                {!! \Session::get('success') !!}
                                            </div>
                                        @endif
                                   </div>
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
                                            @if ($register->rangking == 2)
                                                <div class="qrcode-desktop">
                                                    {!! $register->qrcode!!}
            
                                                </div>
                                            @endif
                                            <!-- /Content Table -->
                                    </div>
                                    @if ($register->rangking == 2)
                                        <div class="justify-content-center mt-5 qrcode-mobile">
                                            {!! $register->qrcode!!}

                                        </div>
                                    @endif
                                    
                                </div>
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
        
    </body>
</html>