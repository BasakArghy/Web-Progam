<!DOCTYPE html>
<html lang="en">
<head>
   	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="infinity-container" style="background-image: url('images/bg3.jpg');">
		<!-- Company Logo -->
		

		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block">
			<div class="infinity-click-box text-center">Login into your account</div>

			<div class="infinity-fold">
				<div class="infinity-form">
            

                <form action="{{route('login-user')}}" method="post" class="form-box">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf


                    <div class="form-input">
<label for="">Phone Number</label>
<input type="text" class="form-control" placeholder="Enter Phone Number" name="number" value="{{old('number')}}" required>
<span class="text-danger">@error('number'){{$message}}@enderror</span>
</div>

<div class="form-input">
<label for="password">Password</label>
<input type="text" class="form-control" placeholder="Enter Password" name="password" value="" required>
<span class="text-danger">@error('password'){{$message}}@enderror</span>
</div>
<br>
<div class="col-12 px-0 text-right">
    <button type="submit" class="btn mb-3">Login</button>
</div>
<br>
<div class="text-center">Don't have an account?
    <a class="register-link" href="registration">Register here</a>
</div>


</form>
</div>
</div>
</div>
<!-- FORM CONTAINER END -->
</div>

</body>
</html>