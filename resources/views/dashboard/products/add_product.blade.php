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
            <a class="button active" href="{{route('allProducts')}}">
                <div class="text-center">
                    <i class="fa-solid fa-shirt"></i>
                </div>
                <span class="text">Products</span>
            </a>
            <a class="button"  href="{{route('allCategories')}}">
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
            <form method="post" action="{{route('product.insert')}}">
                @csrf
                <h2>Add New Product</h2>
                <div class="row inputs">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product Name</label>
                            <input type="text" placeholder="Product Name" name="title" class="@error('title') is-invalid @enderror" value="{{old('title')}}"/>
                            @error('title')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Category</label>
                            <select name="catID" class="@error('catID') is-invalid @enderror">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                            @error('catID')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Supplier</label>
                            <select name="supID" class="@error('supID') is-invalid @enderror">
                                @foreach($suppliers as $s)
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                            @error('supID')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product's Price </label>
                            <input type="text" name="price" value="{{old('price')}}" placeholder="type the Price here ..." class="@error('price') is-invalid @enderror"/>
                            @error('price')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product's offer </label>
                            <input type="text" name="discount" value="{{old('discount')}}" placeholder="type the discount here ..."  class="@error('discount') is-invalid @enderror"/>
                            @error('discount')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product's Picture </label>
                            <input type="text" name="img" value="{{old('img')}}" placeholder="type the img name with extension here ..."  class="@error('img') is-invalid @enderror"/>
                            @error('img')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Sales (0 if new)</label>
                            <input type="number" name="sales" value="{{old('sales')}}" placeholder="type the sales here ..."  class="@error('sales') is-invalid @enderror"/>
                            @error('sales')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Rate (0 if new)</label>
                            <input type="number" name="rate" value="{{old('rate')}}" placeholder="type the rate here ..."  class="@error('rate') is-invalid @enderror"/>
                            @error('rate')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Origin</label>
                            <input type="text" name="origin" value="{{old('origin')}}" placeholder="type the manufacturing country here ..."  class="@error('origin') is-invalid @enderror"/>
                            @error('origin')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender"  class="@error('gender') is-invalid @enderror">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Age Group</label>
                            <select name="ageGroup" class="@error('ageGroup') is-invalid @enderror">
                                <option value="kids">Kids</option>
                                <option value="Adults">Adults</option>
                            </select>
                            @error('ageGroup')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Add Product</button>
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
