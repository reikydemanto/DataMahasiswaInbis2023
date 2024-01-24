<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ url('/css/app.min.css') }}" rel="stylesheet">
    <style>
        .page-container {
            padding: 0 !important;
        }

        .page-container .main-content {
            padding: 50px;
        }

        img {
            max-height: 200px;
        }

    </style>

    <title>Daftar Pasien</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    @yield('styles')

    @stack('scripts')
</head>

<body>
    <div class="app is-folded">
        <div class="layout">
            <!-- Page Container START -->
            <div class="page-container" style=".page-container">

                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <div class="media align-items-center"> --}}
                                    <h1 class="mt-4"><b>@yield('title')</b></h1>
                                    <div>
                                        @if(session()->has('success'))
                                            <div>{{ session('success') }}</div>
                                        @endif
                                    </div>
                                    <div>@yield('content')</div>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                        <p class="m-b-0">Copyright © 2019 Theme_Nate. All rights reserved.</p>
                        <span>
                            <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                            <a href="" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
        </div>
    </div>
</body>

</html>
