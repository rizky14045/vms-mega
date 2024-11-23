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
            <li class="breadcrumb-item active">Tambah Data Registrasi Visitor</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('manager.user-register.store')}}" method="POST" enctype="multipart/form-data">
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
                    <label class="form-label" for="email-id">Jenis Perusahaan</label>
                        <div class="checkbox-field d-flex gap-3 pb-3">
                            <div class="form-check">
                                <input class="form-check-input tenant_check" type="radio" name="visitor_type" id="tenant-type" checked="" value="tenant">
                                <label class="form-check-label" for="tenant-type">
                                    Tenant
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input tenant_check" type="radio" name="visitor_type" id="vendor-type" value="vendor">
                                <label class="form-check-label" for="vendor-type">
                                    Vendor Luar
                                </label>
                            </div>
                        </div>

                    <div class="mb-3 tenant-type">
                        <label for="example-select" class="form-label">Tenant</label>
                        <select class="form-select select-2" id="example-select" name="tenant_id">
                            <option value="">Pilih Tenant</option>
                            @foreach ($tenants as $tenant)
                                <option value="{{$tenant->id}}">{{$tenant->name}}</option>
                            @endforeach
                        </select>
                    </div>    
                    <div class="vendor-type" style="display: none">                 
                        <div class="form-group pb-3">
                            <label class="form-label" for="text-id">Perusahaan / Unit Kerja</label>
                            <input type="text" class="form-control mb-0" id="text-id" placeholder="Masukan Perusahaan / Unit Kerja" name="vendor_name">
                        </div>
                        <div class="form-group pb-3">
                            <label class="form-label" for="text-id">Alamat Perusahaan</label>
                            <input type="text" class="form-control mb-0" id="text-id" placeholder="Masukan Alamat Perusahaan" name="vendor_address">
                        </div>
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
                    <div class="reference-input row">
                        <div class="mb-3 col-md-6">
                            <label for="example-select" class="form-label">Referensi</label>
                            <select class="form-select" id="example-select" name="reference" required>
                                <option value="">Pilih Referensi</option>
                                <option value="memo">Memo Dinas</option>
                                <option value="email">Email</option>
                                <option value="spk">Surat Perintah Kerja (SPK)*</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="example-select" class="form-label">Attachment Referensi</label>
                            <input type="file" class="form-control mb-0" name="attachment_reference" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                    </div>
                    <div class="mb-3 category-type col-md-6">
                        <label for="example-select" class="form-label">Kategori Registrasi</label>
                        <select class="form-select" id="example-select" name="category" required>
                            <option value="">Pilih Kategori Registrasi</option>
                            <option value="terjadwal">Terjadwal</option>
                            <option value="urgent">Urgent</option>
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
                        <div class="form-group pb-3 col-md-6">
                            <label class="form-label" for="text-id">Tanggal Visit</label>
                            <input type="date" required class="form-control mb-0" name="visit_date">
                        </div>
                        <label class="form-label" for="email-id">Area yang Dituju</label>
                        <div class="checkbox-field d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="area" id="working-area" value="Working Area" checked="">
                                <label class="form-check-label" for="working-area">
                                    Working Area
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="area" id="data-center-area" value="Data Center Area">
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
                                <input class="form-check-input check-other" type="checkbox" value="1" id="check-other" name="other">
                                <label class="form-check-label" for="check-other">
                                    Lainnya
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pb-3 col-md-6 other-text" style="display:none;">
                        <label class="form-label" for="email-id">Lainnya</label>
                        <input type="text" class="form-control mb-0" id="text-id" placeholder="Masukan Peralatan Lainnya" name="other_text">
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
                        <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan Nomor Telepon" name="personal_office_number">
                    </div>
                    <div class="form-group pb-3">
                        <label class="form-label" for="text-id">No. Handphone</label>
                        <input type="text" required class="form-control mb-0" id="text-id" placeholder="Masukan No. Handphone" name="personal_phone_number">
                    </div>
                    <div class="accept-form row">
                        <div class="agreement-type col-md-5">      
                            <label class="form-label" for="email-id">Persetujuan</label>
                            <div class="checkbox-field d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="agreement" id="onsite-agreement" value="onsite" checked="">
                                    <label class="form-check-label" for="onsite-agreement">
                                        Onsite
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="agreement" id="email-agreement" value="email">
                                    <label class="form-check-label" for="email-agreement">
                                        Email
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="agreement" id="call-agreement" value="call">
                                    <label class="form-check-label" for="call-agreement">
                                        On Call ( Emergency Only )
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label for="example-select" class="form-label">Attachment Persetujuan</label>
                            <input type="file" class="form-control mb-0" name="attachment_agreement" accept=".pdf,.jpg,.jpeg,.png">
                        </div>
                    </div>
                    
                    <div class="form-group pb-3">
                        <label class="form-label" for="text-id">Catatan</label>
                        <input type="text" class="form-control mb-0" id="text-id" placeholder="Masukan Catatan" name="note">
                    </div>
                   
                    <div class="text-center pb-3">
                        <a href="{{route('manager.user-register.index')}}" class="btn btn-danger">Back</a>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
         
            </div> <!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row -->
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
@endsection
@section('scripts')
<script>
    $("#btn-person-add").click(function () {

        var getnumber = $('.tb-person').find('.tr-person').last().find('.tr-number').val()

        var name = $('#person_name').val()
        var ktp = $('#person_ktp').val()
        var phone = $('#person_phone').val()
        var company = $('#person_company').val()

        var number
        if(getnumber === undefined){

            number = 1
        }else{
            number = parseInt(getnumber) + 1
        }

        console.log(name, ktp, phone, company, number)
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
<script>
    $('.tenant_check').on('change', function() {
        const value = $(this).val() // Dapatkan nilai checkbox

        console.log(value)

        if (value == 'tenant') {

            $('.tenant-type').show()
            $('.vendor-type').hide()
            
        }else{
            $('.tenant-type').hide()
            $('.vendor-type').show()
        }
    });
    $('.check-other').on('change', function() {
        const value = $(this).is(':checked')// Dapatkan nilai checkbox

        console.log(value)

        if (value == true) {
            $('.other-text').show()
            
        }else{
            $('.other-text').hide()
        }
    });
</script>
@endsection

