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
        <div class="container mt-5">
            <div class="products-panel">
                <h2 class="text-center text-muted mb-5">Products</h2>
                <form class="mb-5">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <input type="text" placeholder="search for product by title" class="searchTitle">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <input type="text" placeholder="search for product by category" class="searchCategory">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <input type="text" placeholder="search for product by supplier" class="searchSupplier">
                        </div>
                    </div>
                </form>
                <div class="text-end my-3">
                    <a href="{{route('addProduct')}}" class="btn btn-outline-info mx-2">Add Product</a>
                    <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Delete All Products</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td class="d-none d-md-table-cell">ID</td>
                            <td class="d-none d-md-table-cell">Img</td>
                            <td class="">Title</td>
                            <td class="d-none d-lg-table-cell">Category</td>
                            <td class="d-none d-lg-table-cell">Supplier</td>
                            <td class="d-none d-md-table-cell">Price</td>
                            <td class="d-none d-lg-table-cell">Discount</td>
                            <td class="d-none d-lg-table-cell">Origin</td>
                            <td class="d-none d-lg-table-cell">Gender</td>
                            <td class="d-none d-lg-table-cell">Age Group</td>
                            <td class="d-none d-md-table-cell">Sales</td>
                            <td class="d-none d-lg-table-cell">Rate</td>
                            <td>Update</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($products) > 0)

                            @foreach($products as $p)
                                <tr>
                                    <td class="d-none d-md-table-cell">{{$p->id}}</td>
                                    <td class="d-none d-md-table-cell"><img src="{{asset('assets/images/products/' . $p->img)}}" alt=""></td>
                                    <td class="title">{{$p->title}}</td>
                                    <td class="d-none d-lg-table-cell category">{{$p->name}}</td>
                                    <td class="d-none d-lg-table-cell supplier">{{$p->sname}}</td>
                                    <td class="d-none d-md-table-cell">{{$p->price}}</td>
                                    <td class="d-none d-lg-table-cell">{{$p->discount}}</td>
                                    <td class="d-none d-lg-table-cell">{{$p->origin}}</td>
                                    <td class="d-none d-lg-table-cell">{{$p->gender}}</td>
                                    <td class="d-none d-lg-table-cell">{{$p->age_group}}</td>
                                    <td class="d-none d-md-table-cell">{{$p->sales}}</td>
                                    <td class="d-none d-lg-table-cell">{{$p->rate}}</td>
                                    <td><a href="{{route('editProduct',$p->id)}}" class="btn btn-info">Update</a></td>
                                    <td><a href="{{route('product.delete',$p->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        @else

                            <div class="alert alert-warning"> There is no products found</div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-dark" id="staticBackdropLabel" >Delete All Products</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                Are you sure you want to delete all the products ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a href="{{route('deleteAllProducts')}}" type="button" class="btn btn-danger">Yes, Delete</a>
            </div>
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
<script src="{{asset('assets/js/search_products.js')}}"></script>
</body>
</html>
