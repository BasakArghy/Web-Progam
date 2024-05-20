<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top::20px;">
            <br>
                <h4>Registration</h4>
<hr>
                <form action=" {{route('register-user')}}" id="formMap" method="post">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                      
                    <label  >Salon owner</label>
                    <input type="checkbox" name="type" value="owner" id="owner" onclick="enable()">
                    <br>
                    <label >Customer</label>
                    <input type="checkbox" name="type" value="customer" id="cus" onclick="enable()">
                    <br>
                    <span class="text-danger">@error('type'){{$message}}@enderror</span>
                  <div id="cus_label" style="display:none;"> Customer Registration
                    </div> 
                    <div id="own_label" style="display:none;"> Owner Registration
                    </div> 
                    <hr>
<div class="form-group" >
<label for="name">Full Name</label>
<input type="text" class="form-control" placeholder="Enter FullName" name="name" value="{{old('name')}}">
<span class="text-danger">@error('name'){{$message}}@enderror</span>
</div>

<div class="form-group">
<label for="number">Phone Number</label>
<input type="textr" class="form-control" placeholder="Enter Phone Number" name="number" value="{{old('email')}}">
<span class="text-danger">@error('number'){{$message}}@enderror</span>
</div>

<div class="form-group">
<label for="password">Password</label>
<input type="text" class="form-control" placeholder="Enter Password" name="password" value="">
<span class="text-danger">@error('password'){{$message}}@enderror</span>
</div>

<div id="own_extra" style="display:none;">
<div class="form-group" >
    <label for="location">Find Location From Google Map </label> 
  
          
      
       
            <input type="text" class="form-control" id="latitude" placeholder="latitude" name="lat" value=""> 
            <input type="text"  class="form-control" id="longitude" placeholder="longitude" name="lng" value="">
            
        
        <div class="element-map" id="gmaps-canvas" class="field" style="clear: both;height:295px;border: 1px solid #999;">
        </div>
    
    </div>
    <div class="form-group" >
        <label for="price">Price for each cutting</label>
        <input type="number" class="form-control" placeholder="Price" name="price" value="">
        
        </div>
</div>

<br>
<div class="form-group">
    <button class="btn btn-block btn-primary" type="submit">Register</button>
</div>
<br>
<a href="login" >Already Registered !! Login Here. </a>

</form>
            </div>
        </div>
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