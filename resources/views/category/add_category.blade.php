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
    <title>MSO - Add Category</title>
</head>
<body class="dark">
    <div class="dashboard">
        <div class="container">
            <form method="post" action="{{route('category.insert')}}">
                @csrf
                <label>Category Name  </label>
                <input type="text" name="catName" placeholder="type the name here ..."/>
                <label>Category Icon  </label>
                <input type="text" name="catIcon" placeholder="type the name of svg file here"/>
                <div class="text-center">
                    <button class="btn btn-success">Insert New Category</button>
                </div>
            </form>
        </div>
    </div>
<!--Include Bootstrap, js ,font- awesome -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/all.min.js')}}"></script>
<script>
    let addForm =document.querySelector('form');

   addForm.submit = (e)=>{
        e.preventDefault();
        alert("Category Added Successfully");
        addForm.reset();
    };


</script>
</body>
</html>
