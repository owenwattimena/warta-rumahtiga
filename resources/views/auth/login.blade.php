<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body style="overflow:hidden">
    <div class="alert alert-dark rounded-0" role="alert">
        <marquee behavior="" direction=""> SELAMAT DATANG DI APLIKASI WARTA JEMAAT RUMAHTIGA! </marquee>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-3">

            <h2 class="text-center my-3">LOGIN</h2>
            <div class="card">
                <div class="card-body">
                    @if (session('pesan'))
                        <div class="alert {!! session('tipe') !!} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            {!! session('pesan') !!}
                        </div>
                    @endif
                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukan username"
                                name="username" required>

                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Masukan password" name="password" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-dark btn-block my-3">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
