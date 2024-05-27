<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/salon_logo1.jpg" type="">
      <title>Salon Store</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body >
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container ">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand " href="/" ><img width="200" src="images/salon_logo1.jpg" alt="salon" class="rounded-lg" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class=""> </span>
                     </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link "  href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/myappoint">My reservation</a>
                        </li>
                        <li class="nav-item ">
                          
                              <a class="nav-link"  href="stores"><i class="fa fa-search" aria-hidden="true"></i>  Nearest Salon</a>
                             
                           </form>
                           
                        </li>
                        <li class="nav-item">
                           <a class="nav-link"  href="{{URL::to('/appoint')}}">Appointment</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/product">Products</a>
                        </li>
                        <li class="nav-item dropdown"  >
                           
                           
                          <?php
                          
                          if(Session::has('loginId')){ ?>
 <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label" style="color: blue"><i class="fa fa-user"></i> {{$data->name}}<span class="caret"></span></a>
 <ul class="dropdown-menu">
    <li><a href="logout">Logout</a></li>
    
 </ul>

                       
                     <?php if($data->type=="admin"){?>
                        <a class="nav-link" style="background-color: rgb(111, 165, 241) " href="/admin">Admin Pannel</a>
                     <?php }
                     
                  }
                          else{
                           ?>
                           <a class="nav-link" style="background-color: rgb(111, 165, 241) " href="login">login</a>
                           <?php
                          }
                          
                          ?>
                        </li>
                       
                     </ul>
                  </div>
                
               </nav>
            </div>
         </header>