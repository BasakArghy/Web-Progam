<!DOCTYPE html>
<html>
<head>
    <title>Laravel Multiple Marker</title>   
</head>
<style>
    #map{
        height:500px;
    }
    </style>
<div id="map"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var location= [
            ['center', 23.7848, 86.7039],
            ['North ', 23.793809, 86.7039],
            ['South', 23.775791, 86.7039],
            ['East', 23.7848, 86.712909],
            ['West', 23.7848, 86.694891],
        ];
        var mylatlng= {
            lat:22.702248088761554,
            lng: 89.07220709513331
        }
        var map= new google.maps.Map(document.getElementById("map"),{
            zoom:12,
            center: mylatlng,
        });
        // for(var i=0; i< location.length; i++){
        //     new google.maps.Marker({
        //         position: new google.maps.LatLng(location[i][1],location[i][2]),
        //         map: map

        //     });
        // }

        var markers = [];
        var i=0;

        @foreach ($user as $us)
     <?php if($us->type=="owner"){ ?>
   
      
        var marker = new google.maps.Marker({
                 position: new google.maps.LatLng({{$us->lat}},{{$us->lng}}),
                map: map,
                title:{{$us->id}}
            });

             markers.push(marker);

                    // Add click event listener to marker
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            // Create and open info window
                            var infowindow = new google.maps.InfoWindow({
                                content: "ID: {{$us->id}}"
                            });
                            
                            infowindow.open(map, marker);

                            // Set infowindow property on marker
                            marker.infowindow = infowindow;
                        }
                    })(marker, i));
                
            
                    i=i+1;
       <?php } ?>

       
  
   @endforeach
        
    });   
</script>
<script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries" >
</script>


   
</body>
</html>