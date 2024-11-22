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
        </style>
    </head>
   
    <body class="bg-white">
        <!-- Begin page -->
        <div class="account-page ">
            <div class="container-fluid p-0">
                <div style="background-color:#44546e; background-size: cover;background-repeat: no-repeat;" class="vh-100">
                    <div class="row d-flex align-items-center justify-content-center vh-100">
                        <div class="col-md-12 col-xl-9 col-sm-8 shadow-sm">
                            <div class="card p-4" style="max-height: 95vh; overflow-y: auto;">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="{{asset('logo.png')}}" alt="logo-dark" class="mx-auto pb-3" height="100" />
                                        <h5 class="">Registrasi Visitor</h5>
                                    </div>
                                    <form action="{{route('user.store')}}" method="POST">
                                        @csrf
                                        <h3> A . Data Visitor </h3>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Nama Lengkap</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nama Lengkap" name="name">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">No KTP</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan No KTP" name="identity_number">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">Perusahaan / Unit Kerja</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Perusahaan / Unit Kerja" name="company">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">Alamat Perusahaan</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Alamat Perusahaan" name="company_address">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Email</label>
                                            <input type="email" class="form-control mb-0" id="email-id" placeholder="Masukan Email" name="email">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">No. Telepon Kantor</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nomor Telepon Kantor" name="office_number">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">No. Handphone</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nomor Handphone" name="phone_number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Referensi</label>
                                            <select class="form-select" id="example-select" name="reference" required>
                                                <option value="">Pilih Referensi</option>
                                                <option>Memo Dinas</option>
                                                <option>Email</option>
                                                <option>Surat Perintah Kerja (SPK)*</option>
                                            </select>
                                        </div>
                                        <div class="add-person">
                                            <div class="add-person-header d-flex align gap-3">
                                                <h6 class="page-title my-auto">Nama Visitor</h6>
                                                <button class="btn btn-primary text-white" type="button" data-bs-toggle="modal" data-bs-target="#personModal"> Tambah </button>
                                            </div>
                                            <div class="store-training-table">
                                                <div class="table-responsive pt-3">
                                                    <table class="table table-bordered text-center">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Visitor</th>
                                                            <th>Nip / No.Ktp</th>
                                                            <th>No. Telp / Handphone</th>
                                                            <th>Nama Perusahaan</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="tb-person">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3> B . Data Area </h3>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Area yang Dituju</label>
                                            <div class="checkbox-field d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="area" id="working-area" value="Working Area" checked="">
                                                    <label class="form-check-label" for="working-area">
                                                        Working Area
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="area" id="data-center-area" value="Data Center Area" checked="">
                                                    <label class="form-check-label" for="data-center-area">
                                                        Data Center Area
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">Nama Ruangan</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nama Ruangan" name="room_name">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">Keperluan</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Keperluan" name="necessary">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Peralatan yang Dibawa</label>
                                            <div class="checkbox-field d-flex gap-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="1" id="check-laptop" name="laptop">
                                                    <label class="form-check-label" for="check-laptop">
                                                        Laptop
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="1" id="check-handphone" name="handphone">
                                                    <label class="form-check-label" for="check-handphone">
                                                        Handphone
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="1" id="check-other" name="other">
                                                    <label class="form-check-label" for="check-other">
                                                        Lainnya
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="hidden" name="key" id="" value="{{$key}}">
                                        <h3> Personal Authorized </h3>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Nama Lengkap</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nama Lengkap" name="personal_name">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">No KTP</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan No KTP" name="personal_identity_number">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Email</label>
                                            <input type="email" class="form-control mb-0" id="email-id" placeholder="Masukan Email" name="personal_email">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">No. Telepon Kantor</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Alamat Perusahaan" name="personal_office_number">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">No. Handphone</label>
                                            <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan No. Handphone" name="personal_phone_number">
                                        </div>
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="email-id">Persetujuan</label>
                                            <div class="checkbox-field d-flex gap-3">
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="1" id="check-onsite" name="onsite_check">
                                                    <label class="form-check-label" for="check-onsite">
                                                        Onsite
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="1" id="check-email" name="email_check">
                                                    <label class="form-check-label" for="check-email">
                                                        Email
                                                    </label>
                                                </div>
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" value="1" id="check-call" name="oncall_check">
                                                    <label class="form-check-label" for="check-call">
                                                        On Call ( Emergency Only )
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group pb-3">
                                            <label class="form-label" for="text-id">Catatan</label>
                                            <input type="text" class="form-control mb-0" id="text-id" placeholder="Masukan Catatan" name="note">
                                        </div>
                                       
                                        <div class="text-center pb-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- training Modal -->
    <div class="modal fade" id="personModal" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="personModalLabel">Tambah</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group pb-3">
                    <label class="form-label" for="email-id">Nama Lengkap</label>
                    <input type="text" class="form-control mb-0 person-name" id="person_name" placeholder="Masukan Nama Lengkap">
                </div>
                <div class="form-group pb-3">
                    <label class="form-label" for="text-id">No KTP</label>
                    <input type="text" class="form-control mb-0 person-ktp" id="person_ktp" placeholder="Masukan No KTP">
                </div>
                <div class="form-group pb-3">
                    <label class="form-label" for="text-id">No. Telepon Kantor</label>
                    <input type="text" class="form-control mb-0 person-phone" id="person_phone" placeholder="Masukan Nomor Telepon Kantor">
                </div>
                <div class="form-group pb-3">
                    <label class="form-label" for="text-id">Nama Perusahaan</label>
                    <input type="text" class="form-control mb-0 person-company" id="person_company" placeholder="Masukan Nama Perusahaan">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-primary" id="btn-person-add">Submit</button>
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
        <script>
            $("#btn-person-add").click(function () {

                var getnumber = $('.tb-person').find('.tr-person').last().find('.tr-number').val()

                var name = $('#person_name').val()
                var ktp = $('#person_ktp').val()
                var phone = $('#person_phone').val()
                var company = $('#person_company').val()
                var qty = $('#person_qty').val()

                var number
                if(getnumber === undefined){

                    number = 1
                }else{
                    number = parseInt(getnumber) + 1
                }

                $('.tb-person').append(
                    `<tr class="tr-person">
                        
                        <td>
                            <input type="number" class="form-control tr-number" value="${number}" readonly>
                        </td>
                        <td><input type="text" class="form-control" value="${name}" name="visitor_name[]"></td>
                        <td><input type="text" class="form-control" value="${ktp}" name="visitor_identity_number[]"></td>
                        <td><input type="text" class="form-control" value="${phone}" name="visitor_phone_number[]"></td>
                        <td><input type="text" class="form-control" value="${company}" name="visitor_company[]"></td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteRow(this)">
                                <span class="mdi mdi-trash-can"></span>
                            </button>
                        </td>
                    </tr>`
                )
                $('#personModal').modal('hide')
            });
            function deleteRow(e){
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
                            $(e).parent().parent().remove()
                        }
                    })
            
            }
        </script>
        
    </body>
</html>