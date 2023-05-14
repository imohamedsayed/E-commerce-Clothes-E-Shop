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
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}" />
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
<!--notification-->
<div class="notification-toast">
    <button class="toast-close-btn">
        <i class="fa-solid fa-x"></i>
    </button>

    <div class="toast-banner">
        <img
            src="{{asset('assets/images/products/jewellery-1.jpg')}}"
            alt="Rose Gold Earrings"
            width="80"
            height="70"
        />
    </div>

    <div class="toast-detail">
        <p class="toast-message">Someone in new just bought</p>

        <p class="toast-title">Rose Gold Earrings</p>

        <p class="toast-meta"><time datetime="PT2M">2 Minutes</time> ago</p>
    </div>
</div>
<!--End Notification-->

<!--
  ----Mobile Navigations----
-->
<div class="aside-ovelay"></div>
<aside class="d-lg-none d-lg-none category has-scrollbar"></aside>
<aside class="d-lg-none d-lg-none menu has-scrollbar">
    <ul class="list-unstyled">
        <li>
            <h3><a href="{{route('home')}}" class="nav-link">HOME</a></h3>
        </li>
        <li>
            <h3><a href="#" class="nav-link">MEN'S</a></h3>
        </li>
        <li>
            <h3><a href="#" class="nav-link">WOMEN'S</a></h3>
        </li>
        <li>
            <h3><a href="#" class="nav-link">BLOG</a></h3>
        </li>
        <li>
            <h3><a href="#" class="nav-link">OFFERS</a></h3>
        </li>
    </ul>
</aside>

<div class="mobile-nav d-lg-none d-block d-flex">
      <span class="menu-toggler">
        <i class="fa-solid fa-bars"></i>
      </span>
    <span class="shopping-bag">
        <i class="fa-solid fa-bag-shopping"></i>
      </span>
    <span class="home-btn">
        <i class="fa-solid fa-house"></i>
      </span>
    <span class="fav-btn">
        <i class="fa-regular fa-heart"></i>
      </span>
    <span class="asideToggler"><i class="fa-solid fa-cubes"></i></span>
</div>

<!--Start Top Header-->
<div class="topHeader text-center">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="soical-icons d-none d-md-block">
            <a href="https://web.facebook.com/Eldbeany" target="_blank">
                <i class="fa-brands fa-facebook-f"></i
                ></a>
            <a href="https://twitter.com/Eldbeany" target="_blank"
            ><i class="fa-brands fa-twitter"></i
                ></a>
            <a href="https://www.instagram.com/eldbeany/" target="_blank"
            ><i class="fa-brands fa-instagram"></i
                ></a>
            <a
                href="https://www.linkedin.com/in/mohamed-el-sayed-4854b421a/"
                target="_blank"
            ><i class="fa-brands fa-linkedin-in"></i
                ></a>
        </div>
        <div class="message">FREE SHIPPING THIS WEEK ORDER OVER - $55</div>
    </div>
</div>
<!--End Top Header-->

<!--Stat Main Body-->
<div class="row main-container">
    <!--
      --- Stat Aside
    -->
    <div class="categories col-2 d-none d-lg-block">
        <div class="container">
            <div class="cats ps-2">
                <h1 class="fw-normal fs-2 mb-5 pb-3">Categories</h1>

                @foreach($categories as $cat)
                    <div>
                        <h5>
                            <a
                                class="nav-link"
                                role="button"
                                href="category/{{$cat->id}}"
                            >
                                <img
                                    src="{{asset('assets/images/icons/' . $cat->icon)}}"
                                    width="30"
                                    height="30"
                                    alt=""
                                />
                                {{$cat->name}}
                            </a>
                        </h5>

                    </div>
                @endforeach
            </div>
            <div class="bestSeller">
                <h1 class="fw-normal fs-2 mb-5 mt-5 pb-3">BEST SELLERS</h1>
                @foreach($trending as $product)
                    <div class="best-seller-box d-flex gap-3">
                        <div class="img">
                            <img
                                src="{{asset('assets/images/products/' . $product->img)}}"
                                width="80"
                                height="80"
                                class="img-fluid"
                                alt=""
                            />
                        </div>
                        <div class="p-details">
                            <h6>{{$product->title}}</h6>

                            <p style="font-size: 10px; color: gold">
                                @for($i=0;$i<5;$i++)
                                    @if($i < $product->rate)
                                        <i class="fa-solid fa-star"></i>
                                    @else
                                        <i class="fa-regular fa-star"></i>
                                    @endif
                                @endfor
                            </p>
                            @if($product->discount>0)
                                <p><b>${{$product->price - $product->discount}}</b> <del>${{$product->price}}</del></p>
                            @else
                                <p><b>${{$product->price}}</b></p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--
      --- End Aside
    -->
    <div class="main col-lg-9 col-12">
        <div class="second-header pt-3 pb-3">
            <div class="container">
                <div class="row text-center align-items-center">
                    <div class="logo col-md-2 col-12">
                        <h1 id="mainLogo">MSO</h1>
                    </div>
                    <div
                        class="Search col-lg-7 col-md-10 col-12 d-flex align-items-center"
                    >
                        <form action="{{route('search')}}" method="post" class="w-100 d-flex mt-4 mt-md-2" >

                            @csrf

                            <div class="row align-items-center">
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Enter Product Name"
                                        name="pName"
                                    />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Enter Category "
                                        name="pCat"
                                    />
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 mb-2">
                                    <input
                                        type="search"
                                        class="form-control"
                                        placeholder="Enter Supplier Name"
                                        name="pSup"
                                    />
                                </div>
                            </div>

                            <button class="btn ms-2" type="submit"
                            ><i class="fa-solid p-2 fa-magnifying-glass"></i
                                ></button>
                        </form>
                    </div>
                    <div class="navs col-lg-3 d-lg-block d-none">
                        <a class="btn rounded-circle" href="#"
                        ><i class="fa-regular fa-user"></i
                            ></a>
                        <a class="btn rounded-circle" href="#">
                            <i class="fa-regular fa-heart"></i>
                            <span class="count">0</span>
                        </a>
                        <a class="btn rounded-circle" href="#"
                        ><i class="fa-solid fa-cart-shopping"></i>
                            <span class="count">{{count(session()->get('cart'))}}</span>
                        </a>
                    </div>
                </div>
                <div class="navBar pt-3 pb-3 text-center d-none d-md-block">
                    <ul class="list-unstyled gap-3 align-items-center" >
                        <li><a  href="{{route('home')}}" class="text-uppercase nav-link">Home</a></li>
                        <li><a href="" class="text-uppercase nav-link">Men's</a></li>
                        <li><a href="" class="text-uppercase nav-link">Women's</a></li>
                        <li><a href="" class="text-uppercase nav-link">Testimonials</a></li>
                        <li><a href="" class="text-uppercase nav-link">offers</a></li>
                        <li><a href="" class="text-uppercase nav-link">Blog</a></li>
                        @if( auth()->user())
                            <li><a href="{{route('logoutUser')}}"><button class="btn btn-danger">Log out</button></a></li>
                            @if(auth()->user()->role=='admin')
                                <li><a href="{{route('dashboard')}}"> <button class="btn btn-warning">Admin Panel</button></a></li>
                            @endif
                        @else
                            <li><a href="{{route('login')}}"><button class="btn btn-info">Login</button></a></li>
                            <li><a href="{{route('signup')}}"><button class="btn btn-secondary">Signup</button></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <!--Start Cart Content-->
            <form class="cart-update-from" action="{{route('updateCart')}}" method="post">

                <div class="cart-content mb-5">
                    <h4
                        class="groupTitle pb-3 mb-5"
                        style="border-bottom: 1px solid rgba(128, 128, 128, 0.198)"
                    >
                       <i class="fa-solid fa-cart-shopping me-2"></i> Cart Content
                    </h4>
                    <?php
                    $total = 0;
                    ?>
                    @if(count(session()->get('cart')) > 0)
                            @csrf
                        @foreach($items as $item)
                            <?php
                                $total += ($item->price - $item->discount) * $item->qty;
                            ?>

                            <div class="cart-item d-flex align-items-center my-3" data-id = "{{$item->id}}" >
                                <div class="product-img" >
                                    <img src="{{asset('assets/images/products/' . $item->img)}}" class="img-fluid" alt="">
                                </div>
                                <div class="product-details ">
                                    <h3>{{$item->title}}</h3>
                                    <p style="font-size: 24px; color: gold">
                                        @for($i=0;$i<5;$i++)
                                            @if($i < $item->rate)
                                                <i class="fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor
                                    </p>
                                    @if($item->discount>0)
                                        <p><b>${{$item->price - $item->discount}}</b> <del>${{$item->price}}</del></p>
                                    @else
                                        <p><b>${{$item->price}}</b></p>
                                    @endif
                                    <button type="button" class="increment">+</button> <input type="number" min="1" value="{{$item->qty}}" name="{{$item->id}}" class="pQty"><button type="button" class="decrement">-</button>
                                    <a class="text-light" href="{{route('removeFromCart',$item->id)}}"><span class="del-item"> <i class="fa-solid fa-trash"></i></span></a>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <h3 class="text-warning">Cart is empty</h3>
                    @endif

                </div>

            <!--End Cart Content-->
            <!-- Start Total -->
            @if(count(session()->get('cart')) > 0)
                <div class="total">



                    <p><span class="text-muted">Subtotoal</span> : ${{$total}}</p>
                    <p><span class="text-muted">Shipping</span> : $20.00</p>

                    <p class="total_money">Total : <span>${{$total + 20}}</span></p>
                    <button  type="submit" class="btn btn-success purchaseBtn" ><i class="fa-regular fa-credit-card me-2"></i>Purchase</button>
                </div>
            @endif
            <!-- End Total -->
                <?php session()->put('total',$total+20);?>
            </form>
        </div>
    </div>
</div>
<!--End Main Body-->
<!--Start Subscribe-->
<div class="subscribe pt-5 pb-5 text-center text-md-start">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-3">
                <div class="fw-bold fs-5 mb-3">Subscribe to our Newsletter:</div>
            </div>
            <div class="col-md-6 col-lg-7" id="inputm">
                <input
                    type="email"
                    placeholder="Enter Email Address"
                    class="w-100 text-light bg-transparent p-2"
                />
            </div>
            <div class="col-md-6 col-lg-2">
                <input type="submit" value="Subscribe" class="btn rounded-pill" />
            </div>
        </div>
    </div>
</div>
<!--End Subscribe-->
<!--Start Footer-->
<div class="footer pt-5 pb-5 text-center text-md-start text-white-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="info mb-5">
                    <h4 id="logo">MSO STORE</h4>
                    <p class="mb-5">
                        Pellentesque in ipsum id orci porta dapibus. Vivamus magna
                        justo, lacinia eget consectetur sed, convallis at tellus.
                    </p>
                    <p>
                        Created By <span class="Graphberry">Mohamed Sayed</span> <br />©
                        2023 -
                        <span id="bondi">MSO</span>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <h5>Link</h5>
                <ul class="list-unstyled lh-lg">
                    <li>Home</li>
                    <li>MEN's</li>
                    <li>WOMEN's</li>
                    <li>Categories</li>
                    <li>Testimonials</li>
                    <li>DISCOUNTS</li>
                    <li>DEAL OF DAY</li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-2">
                <h5>About Us</h5>
                <ul class="list-unstyled lh-lg">
                    <li>Sign In</li>
                    <li>Register</li>
                    <li>About Us</li>
                    <li>Blog</li>
                    <li>Contact Us</li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-4">
                <h5>Contact Us</h5>
                <p class="lh-lg mb-4">
                    Get in touch with us via mail phone.We are waiting for your call
                    or message
                </p>
                <a href="#" class="btn btn-info w-100 rounded-pill"
                >MohamedElsayed@gmail.com</a
                >
                <ul class="d-flex list-unstyled mt-5 gap-3 justify-content-center">
                    <li>
                        <a
                            href="https://web.facebook.com/Eldbeany"
                            class="d-block text-light"
                            target="_blank"
                        >
                            <i
                                class="fa-brands fa-facebook fa-lg facebook rounded-circle p-2"
                            ></i>
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://twitter.com/Eldbeany"
                            class="d-block text-light"
                            target="_blank"
                        >
                            <i
                                class="fa-brands fa-twitter fa-lg twitter rounded-circle p-2"
                            ></i>
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://www.linkedin.com/in/mohamed-el-sayed-4854b421a/"
                            class="d-block text-light"
                            target="_blank"
                        >
                            <i
                                class="fa-brands fa-linkedin fa-lg linkedin rounded-circle p-2"
                            ></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-block text-light">
                            <i
                                class="fa-brands fa-youtube fa-lg youtube rounded-circle p-2"
                            ></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--End Footer-->
<div class="day-night s-icon">
    <i class="fas"></i>
</div>
<!--Include Bootstrap, js ,font- awesome -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/all.min.js')}}"></script>
<script src="{{asset('assets/js/cart.js')}}"></script>
</body>
</html>
