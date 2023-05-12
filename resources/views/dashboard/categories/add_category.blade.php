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
            <a href="{{route('home')}}"><button class="btn btn-secondary">Back to Store</button></a>
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
            <a class="button" href="{{route('dashboard')}}">
                <div class="text-center">
                    <i class="fa-solid fa-home back"></i>
                </div>
                <span class="text">Home</span>
            </a>
            <a class="button" href="{{route('allProducts')}}">
                <div class="text-center">
                    <i class="fa-solid fa-shirt"></i>
                </div>
                <span class="text">Products</span>
            </a>
            <a class="button active"  href="{{route('allCategories')}}">
                <div class="text-center" >
                    <i class="fa-solid fa-cubes-stacked"></i>
                </div>
                <span class="text">Categories</span>
            </a>
            <a class="button"  href="{{route('allSuppliers')}}">
                <div class="text-center">
                    <i class="fa-solid fa-user"></i>
                </div>
                <span class="text">Suppliers</span>
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
    <div class="main has-scrollbar">
        <div class="container add_product mt-5">
            <form method="post" action="{{route('category.insert')}}">
                @csrf
                <h2>Add New Category</h2>
                <div class="row inputs">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Category Name</label>
                            <input type="text" placeholder="Product Name" name="catName"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Category's Icon</label>
                            <input type="text" name="catIcon" placeholder="img name with extension"/>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
            </form>
        </div>
    </div>
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
