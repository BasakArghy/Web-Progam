<!DOCTYPE html>
<html lang="en">
<head>
   	<title>Add Products</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
             /* Full viewport height */
            
        }
        .box {
            border: 2px solid #000; /* Black border */
            padding: 20px; /* Inner space between the border and the form */
            border-radius: 10px; /* Optional: rounded corners */
            background-color: #f9f9f9;
            width: 500px; /* Optional: background color */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h5>Product details</h5>
            <br>
    <form  action="{{route('products.update',$product->id)}}"  method="POST"  enctype="multipart/form-data" >
        @method('put')
        @csrf

        <div class="mb-5">
            <label for="name" class="form-label">Name</label>
            <input type="text" required minlength="2" maxlength="50" class="form-control" id="name" name="name" placeholder="Name" value="{{$product->name}}">
            <div class="invalid-feedback">Please provide your name</div>
        </div>  
    
      
        <div class="mb-5">
            <label for="description" class="form-label">Description</label>
            <textarea maxlength="2500" required class="form-control" id="description" name="description" rows="3" placeholder="">{{$product->description}}</textarea>
        </div>
        <div class="mb-5">
            <label for="image" class="form-label">Image</label>
            <input type="file"  class="form-control" id="image" name="image" value="{{$product->image}}"
                >
            
        </div>
        <button type="submit" class="btn btn-primary px-4">Submit</button>
    </form>
    </div>
    </div>
    <script>
    $(()=>{
      $('#contact_form').submit((evt)=>{
        const form = evt.target;
        if(!form.checkValidity())
        {
          evt.preventDefault()
          evt.stopPropagation()
        }
        $(form).addClass('was-validated');
      })
    })
    </script>
    
</body>
</html>    