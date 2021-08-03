<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <style>
        h5{
            margin-left:40px;
        }
    </style>
    <body>

        <div class="container">
            <div class="row justify-content-center">
                   <div class="col-md-8">
                        <div class="card">
                            <p>User Details</p>
                            <div class="card-header">Dear {{$emailinfo->name}}</div>
                            <div class="card-body">
                                <div class="card" style="width: 18rem;">
                                <img src="{{asset('upload/'.$emailinfo->image)}}" class="card-img-top" width="100px" height="100px">
                                <div class="card-body">
                                    <h5 class="card-title">User Country:- {{$country}}</h5>
                                    <h5 class="card-title">User state:- {{$state}}</h5>
                                    <h5 class="card-title">User city:- {{$city}}</h5>
                                    <h5 class="card-title">User hobby:- {{$emailinfo->hobby}}</h5>
                                    <h5 class="card-title">User Gender:- {{$emailinfo->gender}}</h5>
                                    <p class="card-text">Thank you</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
