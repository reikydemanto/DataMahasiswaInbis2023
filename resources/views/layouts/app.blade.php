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
    </style>

    <title>Mahasiswa Inbis</title>
    @yield('styles')
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
                                        @if (session()->has('success'))
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
