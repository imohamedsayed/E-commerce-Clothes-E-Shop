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
    <link rel="stylesheet" href="{{asset('assets/css/dashborad.css')}}" />
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet"
    />
    <link rel="shortcut icon" href="{{asset('assets/images/icons/trolley.png')}}" />
    <title>MSO - Add Product</title>
</head>
<body class="dark">
<div class="dashboard">
    <div class="container">
        <form method="post" action="{{route('product.insert')}}">
            @csrf
            <label>Product Name  </label>
            <input type="text" name="title" placeholder="type the name here ..."/>
            <label>Category</label>
            <select name="catID">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <label>Product's Price </label>
            <input type="text" name="price" placeholder="type the Price here ..."/>
            <label>Product's offer </label>
            <input type="text" name="discount" placeholder="type the discount here ..."/>
            <label>Product's Picture </label>
            <input type="text" name="img" placeholder="type the img name with extension here ..."/>
            <label>Sales (0 if new)</label>
            <input type="number" name="sales" placeholder="type the sales here ..."/>
            <label>Rate (0 if new)</label>
            <input type="number" name="rate" placeholder="type the rate here ..."/>
            <label>Origin</label>
            <input type="text" name="origin" placeholder="type the manufacturing country here ..."/>
            <label>Gender</label>
            <select name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label>Age Group</label>
            <select name="ageGroup">
                <option value="kids">Kids</option>
                <option value="kids">Adults</option>
            </select>
            <div class="text-center">
                <button class="btn btn-warning">Insert New Product</button>
            </div>
        </form>
    </div>
</div>
<!--Include Bootstrap, js ,font- awesome -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/all.min.js')}}"></script>
</body>
</html>
