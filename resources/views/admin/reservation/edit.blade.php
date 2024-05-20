

<html>
  <head>
    <title>Educational registration form</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      color: #040404;
      }
      form{
        width: 700px;

      }
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
      display: flex;
    justify-content: center;
    align-items: center;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 50%;
      padding: 25px;
      
      }
      .left-part, form {
     
      padding: 25px;
 
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: rgba(0, 0, 0, 0.7); 
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid #eee;
      }
      input::placeholder {
      color: #0d0101;
      }
      option:focus {
      border: none;
      }
      option {
      background: black; 
      border: none;
	  color: #eee
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      background: #26a9e0; 
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #100e0e;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
    
      }
	  h2,i {
      color: rgb(247, 247, 247)
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
	 label{
		color:#faf8f8;
		font-size: 16px;
	 }
	 label.shop{
		color:#080808;
		
	 }
   .box{
    border-collapse: collapse;
    width: 100%;
   
   }
   tfoot tr:last-child td {
  border-bottom: 0;
}
th,
td {
  border-bottom: 1px solid #e3e4ee;
  padding: 10px 15px;
  background: #3f3c3c;
  height: 20px;

}
th{
  background: #cac8c8;
}
td{
  color: #fdf8f8;
}
select .id{
  color: white;
}
.ar{
    box-align: center;
}
	
      }
    </style>


  </head>
  <body>
 
    <div class="ar">

      <form action=" {{route('reservation.update',$reservation->id)}}"  method="POST">
        @method('put')
        @csrf
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Reservation</h2>
        </div>
        <div class="info">
			<label for="name">Your Name</label>
          <input class="fname" type="text" id="name" name="name" placeholder="Your Name" value="{{$reservation->name}}">
		  <label for="number">Your Phone Number</label>
   

          <input type="text" name="number" id="number" placeholder="Your Phone Number" value="{{$reservation->number}}">
          <label for="shop_id">Shop ID</label>
          <input  id="shop_id" name="shop_id" value="{{$reservation->shop_id}}">
		  <label for="date">Select Date</label>
          <input type="date" name="date" id="date" value="{{$reservation->date}}">
		  <label for="time">Select Time</label>
		  <input type="time" name="time" id="time" value="{{$reservation->time}}">
          
        </div>
        
        <button type="submit" href="/">Submit</button>
      </form>




    </div>
  </body>
</html>