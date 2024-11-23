<head>

    <meta charset="utf-8" />
    <title>Manajer - Visitor Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('ico.ico')}}">

    <!-- App css -->
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/select-2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/date-range/daterangepicker.css')}}" />
    <style>
        /* Pastikan Select2 terlihat seperti form-control Bootstrap 4 */
        .select2-container--bootstrap4 .select2-selection {
          height: calc(1.5em + 0.75rem + 2px); /* Tinggi yang sama dengan form-control */
          padding: 0.375rem 0.75rem;
          font-size: 1rem;
          line-height: 1.5;
          border-radius: 0.25rem;
          border: 1px solid #ced4da;
        }
        .select2-container--bootstrap4 .select2-selection__arrow {
          top: 50%;
          transform: translateY(-50%);
        }
        .select2-container--bootstrap4 .select2-selection__placeholder {
          color: #6c757d; /* Warna placeholder Bootstrap 4 */
        }
      </style>
</head>