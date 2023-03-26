<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Include Bootstrap-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <!--include font awesome-->
    <link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}}" />
    <!--Include custom style-->

    <link rel="stylesheet" href="{{asset('assets/css/dash.css')}}" />
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    />
    <link rel="shortcut icon" href="{{asset('assets/images/icons/trolley.png')}}" />
    <title>MSO</title>
</head>
<body >
    <div class="dash-header d-flex justify-content-between align-items-center">
        <div class="logo">
                <h4>MSO</h4>
        </div>
        <div class="navs">
                <ul class="d-flex align-items-center">
                    <a href="{{route('logoutUser')}}"><button class="btn btn-danger">Logout</button></a>
                </ul>
        </div>
    </div>
    <div class="dash-view">
        <aside class="expanded">
            <div class="logo">
                <img src="{{asset('../assets/images/logo/logo.svg')}}" alt="logo" />
            </div>
            <div class="menu-toggler-wrap">
                <button class="menu-toggler" >
                    <i class="fa-solid fa-angles-right"></i>
                </button>
            </div>
            <div class="menu mt-3">
                <h3 class="mt-3 mb-4">Collections</h3>
                <a class="button">
                    <div class="text-center">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <span class="text">School</span>
                </a>
                <a class="button">
                    <div class="text-center">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <span class="text">Personal</span>
                </a>
                <a class="button">
                    <div class="text-center">
                        <i class="fa-solid fa-paintbrush"></i>
                    </div>
                    <span class="text">Design</span>
                </a>
                <a class="button">
                    <div class="text-center">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <span class="text">Groceries</span>
                </a>
            </div>
            <div class="flex"></div>
            <div class="menu">
                <a href="{{route('logoutUser')}}">
                    <div class="button cursor-pointer">
                        <div class="text-center">
                            <i
                                class="fa-solid fa-arrow-right-from-bracket"
                                style="transform: rotate(-180deg)"
                            ></i>
                        </div>
                        <span class="text">Logout</span>
                    </div>
                </a>

            </div>
        </aside>
        <div class="main"></div>
    </div>

    <div class="day-night s-icon">
        <i class="fas"></i>
    </div>
    <!--Include Bootstrap, js ,font- awesome -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/dashboard.js')}}"></script>
</body>
</html>
