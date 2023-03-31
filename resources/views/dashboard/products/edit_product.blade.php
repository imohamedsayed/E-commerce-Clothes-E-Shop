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
            <form method="post" action="{{route('product.update',$product->id)}}">
                @csrf
                @method('PUT')
                <h2 class="mb-5">Edit Product : <span class="text-muted">{{$product->title}}</span></h2>
                <div class="row inputs">
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product Name</label>
                            <input type="text" placeholder="Product Name" name="title" value="{{$product->title}}"/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Category</label>
                            <select name="catID">
                                @foreach($categories as $cat)
                                    @if($product->category_id == $cat->id)
                                        <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Category</label>
                            <select name="supID">
                                @foreach($suppliers as $s)
                                    @if($product->supplier_id == $s->id)
                                        <option value="{{$s->id}}" selected>{{$s->name}}</option>
                                    @else
                                        <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product's Price </label>
                            <input type="text" name="price" value="{{$product->price}}" placeholder="type the Price here ..."/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product's offer </label>
                            <input type="text" name="discount" value="{{$product->discount}}" placeholder="type the discount here ..."/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Product's Picture </label>
                            <input type="text" name="img" value="{{$product->img}}"  placeholder="type the img name with extension here ..."/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Sales (0 if new)</label>
                            <input type="number" name="sales" value="{{$product->sales}}"  placeholder="type the sales here ..."/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Rate (0 if new)</label>
                            <input type="number" name="rate" value="{{$product->rate}}"  placeholder="type the rate here ..."/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Origin</label>
                            <input type="text" name="origin" value="{{$product->origin}}"  placeholder="type the manufacturing country here ..."/>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Gender</label>
                            <select name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="input-field">
                            <label>Age Group</label>
                            <select name="ageGroup">
                                <option value="kids">Kids</option>
                                <option value="Adults">Adults</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"> Edit Product</button>
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
