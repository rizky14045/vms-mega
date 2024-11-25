<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Visitor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 120px;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            font-size: 20px;
            color: #555;
        }
        .details {
            font-size: 14px;
            line-height: 1.6;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .details th {
            text-align: left;
            padding-right: 10px;
            vertical-align: top;
            width: 30%; /* Memberikan lebar tetap untuk konsistensi */
        }
        .details td {
            text-align: left;
            vertical-align: top;
        }
        .details th, .details td {
            padding: 8px 0;
        }
        .paragraf{
            display: flex !important;
            justify-content: space-between;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{asset('logo.png')}}" alt="Bank Mega Logo">
            <h2>Detail Visitor</h2>
        </div>
        <div class="paragraf">
            <p>Registrasi anda berhasil disetujui : </p>
            {!! $qrcode !!}
        </div>
        <div class="paragraf">
            <p>Tanggal visit terbaru : {{$visit}}  </p>
        </div>

        <!-- Details -->
        <div class="details">
            <table>
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
</body>
</html>
