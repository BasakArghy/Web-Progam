<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style>
        .infinity-container
{
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
	min-height:100vh;
	color:#000;
	background:url('images/bg3.jpg') center no-repeat;
	background-size:cover;
}

.infinity-form-block1
{
	width:500px;
	border-radius:5px;
	box-sizing:border-box;
	overflow:hidden;
}
.infinity-form-block
{
	width:350px;
	border-radius:5px;
	box-sizing:border-box;
	overflow:hidden;
}
.infinity-click-box
{
	height:50px;
	background-color:#ff8333;
	color:#fff;
	line-height:50px;
	font-size:20px;
	box-shadow:0 5px 10px rgba(0,0,0,.5);
}

.infinity-fold
{
	position:relative;
	width:100%;
	background:rgba(255,188,102,.5);
	padding:30px 20px;
}

.infinity-form .text-sm
{
	font-size:14px;
}

.infinity-form .form-input
{
	position:relative;
}

.infinity-form .form-input input
{
	width:100%;
	margin-bottom:20px;
	height:40px;
	border:2px solid #fff;
	border-radius:20px;
	outline:none;
	background:transparent;
	padding-left:45px;
}

.infinity-form .form-input span
{
	position:absolute;
	top:8px;
	padding-left:20px;
	color:#777;
}

.infinity-form .form-input input:focus,.infinity-form .form-input input:valid
{
	border:2px solid #ff8333;
}

.infinity-form .form-input input:focus::placeholder
{
	color:#454b69;
}

.infinity-form input[type="checkbox"]:not(:checked) + label:before
{
	background:transparent;
	border:2px solid #fff;
	width:15px;
	height:15px;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before
{
	background-color:#ff8333!important;
	border:0;
	width:15px;
	height:15px;
}

.infinity-form button[type="submit"]
{
	margin-top:10px;
	border:none;
	cursor:pointer;
	width:150px;
	height:40px;
	border-radius:5px;
	background:#ff8333;
	color:#fff;
	font-weight:700;
	transition:.5s;
	margin-bottom:10px;
}

.infinity-form button[type="submit"]:hover
{
	background:#ff741a;
	-webkit-box-shadow:0 9px 10px -2px rgba(0,0,0,0.55);
	-moz-box-shadow:0 9px 10px -2px rgba(0,0,0,0.55);
	box-shadow:0 9px 10px -2px rgba(0,0,0,0.55);
}

.forget-link,.login-link,.register-link
{
	color:#000;
	font-weight:700;
}

.forget-link:hover,.login-link:hover,.register-link:hover
{
	color:#ff8333;
}

.infinity-social-btn ul
{
	display:flex;
}

.infinity-social-btn ul li
{
	position:relative;
	list-style:none;
	width:50px;
	height:50px;
	top:10px;
	left:20px;
	align-items:center;
	margin-right:20px;
	background:#fff;
	text-align:center;
	border:4px solid transparent;
	box-sizing:border-box;
	border-radius:50%;
	transition:.5s;
	overflow:hidden;
	margin-bottom:10px;
}

.infinity-social-btn ul li .facebook .fa
{
	color:#3b5999;
}

.infinity-social-btn ul li .google .fa
{
	color:#dd4b39;
}

.infinity-social-btn ul li .twitter .fa
{
	color:#3cf;
}

.infinity-social-btn ul li:hover:nth-child(1)
{
	background-color:#3b5999;
}

.infinity-social-btn ul li:hover:nth-child(2)
{
	background-color:#dd4b39;
}

.infinity-social-btn ul li:hover:nth-child(3)
{
	background-color:#55acee;
}

.infinity-social-btn ul li .fa
{
	position:absolute;
	top:50%;
	left:50%;
	transform:translate(-50%,-50%);
	font-size:24px;
	color:#2196f3;
	transition:.5s;
}

.infinity-social-btn ul li .fa:nth-child(1)
{
	left:-50%;
	opacity:0;
}

.infinity-social-btn ul li:hover .fa:nth-child(1)
{	
	left:50%;
	opacity:1;
	color:#fff;
}

.infinity-social-btn ul li:hover .fa:nth-child(2)
{
	left:150%;
	opacity:0;
}

</style>
</head>
<body>
	<div class="infinity-container" style="background-image: url('images/bg3.jpg');">
		<!-- Company Logo -->
		
		<!-- FORM CONTAINER BEGIN -->
		<div class="infinity-form-block1">
			<div class="infinity-click-box text-center">Create an account</div>
			
			<div class="infinity-fold">
				<div class="infinity-form">
                <form action=" {{route('users.update',$user->id)}}" id="formMap" method="post" class="form-box">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @method('put')
                    @csrf
					<div>
                      
                        <?php if($user->type=="owner"){?>
                    <label>Salon owner</label>
                    <input name="type" value="owner" id="owner" hidden>
                    <?php }?>
                    <?php  if($user->type=="customer") { ?>
                    <label >Customer</label>
                    <input  name="type" value="customer" id="cus" hidden>
                    <?php }?>
                    <span class="text-danger">@error('type'){{$message}}@enderror</span>
                  <div id="cus_label" style="display:none;"> Customer Registration
                    </div> 
                    <div id="own_label" style="display:none;"> Owner Registration
                    </div> 
                    <hr>
					<div class="form-input">
<label for="name">Full Name</label>
<input type="text" class="form-control" placeholder="Enter FullName" name="name" value="{{$user->name}}" required>
<span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>

<div class="form-input">
<label for="number">Phone Number</label>
<input type="textr" class="form-control" placeholder="Enter Phone Number" name="number" value="{{$user->number}}" required>
<span class="text-danger">@error('number'){{$message}}@enderror</span>
</div>

<div class="form-input">
<label for="password">Password</label>
<input type="text" class="form-control" placeholder="Enter Password" name="password" value="" required>
<span class="text-danger">@error('password'){{$message}}@enderror</span>
</div>
<?php if($user->type=="owner"){?>
<div id="own_extra" >
	<div class="form-input">
    <label for="location">Find Location From Google Map </label> 
  
          
      
       
            <input type="text" class="form-control" id="latitude" placeholder="latitude" name="lat" value="{{$user->lat}}"> 
            <input type="text"  class="form-control" id="longitude" placeholder="longitude" name="lng" value="{{$user->lng}}">
            
        
        <div class="element-map" id="gmaps-canvas" class="field" style="clear: both;height:295px;border: 1px solid #999;">
        </div>
    
    </div>
	<div class="form-input">
        <label for="price">Price for each cutting</label>
        <input type="number" class="form-control" placeholder="Price" name="price" value="{{$user->price}}">
        
        </div>
</div>
<?php }?>
<br>
<div class="col-12 px-0 text-right">
	<button type="submit" class="btn mb-3">Register</button>
</div>
<div class="text-center">Already have an account?
	<a class="login-link" href="login">Login here</a>
</div>


</form>
            </div>
		</div>
	</div>
	<!-- FORM CONTAINER END -->
</div>

<script>
function enable()
{
    var owner= document.getElementById("owner");
    var cus= document.getElementById("cus");
    var cus_label=document.getElementById("cus_label");
    var own_label=document.getElementById("own_label");
    var own_extra=document.getElementById("own_extra");
    if(cus.checked)
    {
        owner.checked=false;
        own_label.style.display = 'none';
        own_extra.style.display = 'none';
        cus_label.style.display = 'inline';
    }
    else if(owner.checked){
        cus.checked=false;
        cus_label.style.display = 'none';
        own_label.style.display = 'inline';
        own_extra.style.display = 'inline';
    }
  



    
}
    </script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.0/jquery-ui.min.js" type="text/javascript"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
		<script>
			var geocoder;
			var map;
			var marker;
			var formName = 'formMap';
			var formLatitudeField = 'latitude';
			var formLongitudeField = 'longitude';
			var formSearchLocation = 'maps-location-search';
			var formErrorText = 'gmaps-error';
			var existingLat;
			var existingLng;
			
			// Initialize Google Maps
			function initialize_google_maps(){
			
				// If no lat/lng values, center the map marker on 0,0 coordinates
				if (existingLat == null) {
					var latlng = new google.maps.LatLng(0,0);
					var zoomLevel = 1;
				} else {
					var latlng = new google.maps.LatLng(existingLat,existingLng,true);
					var zoomLevel = 12;
				}
			  
				// Set the options for the map
				var options = {
					zoom: zoomLevel,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};
			
				// Create the Google Maps Object
				map = new google.maps.Map(document.getElementById("gmaps-canvas"), options);
			
				// Create Google Geocode Object that will let us do lat/lng lookups based on address or location name
				geocoder = new google.maps.Geocoder();
				
				// Add marker. Set draggable to TRUE to allow it to be moved around the map
				marker = new google.maps.Marker({
					map: map,
					draggable: true,
					position: latlng
				});
			
				// Listen for event when marker is dragged and dropped
				google.maps.event.addListener(marker, 'dragend', function() {
					update_ui('', marker.getPosition(), true);
					$('#' + formErrorText).html('');
				});
				
				// Listen for event when marker is dropped (map clicked)
				google.maps.event.addListener(map, 'click', function(event) {
				    marker.setPosition(event.latLng);
				    update_ui(event.latLng.lat() + ', ' + event.latLng.lng(), event.latLng, true);   
				    $('#' + formErrorText).html('');                                             
				});
			  
				// Listen for map zoom changing
				google.maps.event.addListener(map, 'zoom_changed', function() {
					zoomChangeBoundsListener = 
					    google.maps.event.addListener(map, 'bounds_changed', function(event) {
					        if (this.getZoom() > 15 && this.initialZoom == true) {
					            // Change max/min zoom here
					            this.setZoom(15);
					            this.initialZoom = false;
					        }
					    google.maps.event.removeListener(zoomChangeBoundsListener);
					});
				});
			  
			  map.initialZoom = true;
			
			}
			
			// Moves the map marker to a given lat/lng and centers the map on that location
			function update_map( geometry ) {		
				marker.setPosition(geometry.location);
				map.fitBounds(geometry.viewport);
			}
			
			// Updates form fields with address and/or lat/lng info
			function update_ui( address, latLng, plot ) {
				$('#' + formSearchLocation).autocomplete("close");
				
				// If we are plotting a point with the marker, we need to clear out
				// any text in location search.
				if (plot){
					$('#' + formSearchLocation).val('');
				}
				
			
			   	oFormObject = document.forms[formName];
				oFormLat = oFormObject.elements[formLatitudeField].value = latLng.lat();
				oFormLng = oFormObject.elements[formLongitudeField].value = latLng.lng();

				
			
			}
			
			// Query the Google geocode object
			//
			// type: 'address' for search by address
			//       'latLng'  for search by latLng (reverse lookup)
			//
			// value: search query
			//
			// update: should we update the map (center map and position marker)?
			function geocode_lookup( type, value, update ) {
			  // default value: update = false
			  update = typeof update !== 'undefined' ? update : false;
			
			  request = {};
			  request[type] = value;
			
			  geocoder.geocode(request, function(results, status) {
			    $('#' + formErrorText).html('');
			    if (status == google.maps.GeocoderStatus.OK) {
			      // Google geocoding has succeeded!
			      if (results[0]) {
			        // Always update the UI elements with new location data
			        update_ui( results[0].formatted_address,
			                   results[0].geometry.location,
			                   false )
			
			        // Only update the map (position marker and center map) if requested
			        if( update ) { update_map( results[0].geometry ) }
			      } else {
			        // Geocoder status ok but no results!?
			        $('#' + formErrorText).html("Sorry, something went wrong. Try again!");
			      }
			    } else {
			      // Google Geocoding has failed. Two common reasons:
			      //   * Address not recognised (e.g. search for 'zxxzcxczxcx')
			      //   * Location doesn't map to address (e.g. click in middle of Atlantic)
			
			      if( type == 'address' ) {
			        // User has typed in an address which we can't geocode to a location
			        $('#' + formErrorText).html("Google could not find " + value + ". Try a different search term, or click the map to manually select a location." );
			      }
			    };
			  });
			};
			
			
			
			
			
			
			$(document).ready(function() { 
				
				if( $('#gmaps-canvas').length  ) {
			
					
					initialize_google_maps();
					
					$('#' + formSearchLocation).autocomplete({
					
						// source is the list of input options shown in the autocomplete dropdown.
						// see documentation: http://jqueryui.com/demos/autocomplete/
						source: function(request,response) {
						
							// the geocode method takes an address or LatLng to search for
							// and a callback function which should process the results into
							// a format accepted by jqueryUI autocomplete
							geocoder.geocode( {'address': request.term }, function(results, status) {
								response($.map(results, function(item) {
									return {
										label: item.formatted_address, // appears in dropdown box
										value: item.formatted_address, // inserted into input element when selected
										geocode: item                  // all geocode data
									}
								}));
							})
						},
						
						// event triggered when drop-down option selected
						select: function(event,ui){
							update_ui(  ui.item.value, ui.item.geocode.geometry.location )
							update_map( ui.item.geocode.geometry )
						}
						
					});
					
					// triggered when user presses a key in the address box
				    $('#' + formSearchLocation).bind('keydown', function(event) {
				      if(event.keyCode == 13) {
				        geocode_lookup( 'address', $('#' + formSearchLocation).val(), true );
				  
				        // ensures dropdown disappears when enter is pressed
				        $('#' + formSearchLocation).autocomplete("disable")
				      } else {
				        // re-enable if previously disabled above
				        $('#' + formSearchLocation).autocomplete("enable")
				      }
				    });
				    
					
				
				};
			
			});
			
			function clearMap() {
			
				$('#' + formLatitudeField).val(null);
				$('#' + formLongitudeField).val(null);
				$('#' + formSearchLocation).val(null);
				$('#' + formErrorText).html(''); 
				
				var latLng = new google.maps.LatLng(0,0);
			  	var bounds = new google.maps.LatLngBounds(latLng);
				
				marker.setPosition(latLng);	
				map.setZoom(1);
			}
		</script>                  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>