

@include('header');
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
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
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
      height: 100%;
      padding: 25px;
      background: rgba(255, 254, 254, 0.5); 
      }
      .left-part {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
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
     
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
     
	  h2,i {
      color: rgb(247, 247, 247)
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
	
      }
    </style>


  </head>
  <body>
    <div class="main-block">
      <div class="left-part">
        
    
        <h1>My reservation</h1>
        
    
  
   


<script type="text/javascript">
  function run() {
      var e = document.getElementById("id");
      var value = e.value;
      var f = document.getElementById("shop_id");
      f.value = value;
      document.getElementById('userForm').submit();
  }
</script>
          <table class="box" >
            <thead>
                <tr>
                  <th >
                    shop_id
                </th>
                    <th >
                        name
                    </th>
                    <th >
                      number
                    </th>
                    <th >
                        date
                    </th>
                    <th>
                        time
                    </th>
                    <th>
                      Bill
                  </th>
                  <th>
                   pay
                </th>
                <th>
                 cancel
               </th>
                   
                    
                </tr>
            </thead>
            <tbody ><div class="bo">
                @foreach ( $reservations as  $reservation)
               <?php $price=0;
                if($reservation->number==$data->number)
                {?><tr >
                   <td  >
                    {{$reservation->shop_id}}
                </td>
                    <td  >
                        {{$reservation->name}}
                    </td>
                    <td  >
                      {{$reservation->number}}
                    </td>
                    <td  >
                      {{$reservation->date}}
                    </td>
                    <td  >
                        
                      {{$reservation->time}}
    
                    </td>
                    <td  >
                      @foreach ( $user as  $use)
                      <?php if($use->id==$reservation->shop_id){$price=$use->price ?>
                        {{$use->price}}
                            <?php }?>
                            @endforeach
                    </td>
                    <td  >
                        
                      <form action="{{route('checkoutRe',$price)}}" method="POST" >
                        @method('put')
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" class="option2" >  Pay Now</button>
                    </form>
    
                    </td>
                    <td  >
                        
                      <form  method="POST" action="{{route('reservation-destroy',$reservation->id)}}"
                        onsubmit="return confirm('Are you sure?');">
                        @method('put')
                        @csrf
   
   
                       <button type="submit" class="fo" >Cancel</button> 
                       </form>
    
                    </td>
                </tr>
                <?php  } ?>
                    @endforeach
                    </div>
            </tbody>
        </table>
        
      </div>
      




    </div>
    @include('footer');