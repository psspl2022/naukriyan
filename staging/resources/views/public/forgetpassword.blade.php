<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Naukriyan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/fontawesome.min.css"
        type="text/css">
    <link href="{{ asset('assets/public/asset/css/bootstrap-responsive.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['PT+Sans:400,700', 'Roboto:300,400,500,700,900', 'Merriweather:300,400,700',
                    'Bree Serif:300,400,500,700,900'
                ]
            }
        });

    </script>

</head>

<body>



    <div id="app">
        <div id="wrapper">
            {{-- @include('public.mdl')
            <main-header></main-header> --}}
            <forget-password></forget-password>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.0/jquery.nicescroll.min.js"></script>
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(".select-box").select2();

    </script>
</body>

</html>
