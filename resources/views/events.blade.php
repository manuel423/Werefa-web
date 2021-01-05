
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>www.Werefa.com</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/newcss/style.css">
     <link rel="stylesheet" href="css/load.css">
     <script src="jsmap/jquery-1.11.0.min.js"></script>
	<script>
	
	    function vvip(){
	         var load=document.getElementById("wrapper");
             load.style.display='block';
             var type='VVIP';                     
             $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

             $.ajax({
                 type: "POST",
                 url: "/payment?event",
                 data: {eventtype:	type,},
				          cache:false,
				 
                 success: function(html) {
                     
					window.location = html;
                 },
                 error: function(data) {
                  load.style.display='none';
                console.log(data);
        }
				 }) 
	        
        }
        
        function vip(){
	         var load=document.getElementById("wrapper");
             load.style.display='block';
             var type='VIP';
             $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

             $.ajax({
                 type: "POST",
                 url: "/payment?event",
                 data: {eventtype:	type},
				          cache:false,
				 
                 success: function(html) {
                    window.location = html;
                 },
                 error: function(data) {
                  load.style.display='none';
                console.log(data);
        }
				 }) 
	        
        }
        
        function regular(){
	         var load=document.getElementById("wrapper");
             load.style.display='block';
             var type='Regular';
             $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

             $.ajax({
                 type: "POST",
                 url: "/payment?event",
                 data: {eventtype:	type},
				          cache:false,
				 
                 success: function(html) {
                    window.location = html;
                 },
                 error: function(data) {
                  load.style.display='none';
                console.log(data);
        }
				 }) 
	        
        }
        
        function other(){
	         var load=document.getElementById("wrapper");
             load.style.display='block';
             var type='Other';

             $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });

             $.ajax({
                 type: "POST",
                 url: "/payment?event",
                 data: {eventtype:	type},
				          cache:false,
				 
                 success: function(html) {
                     
                    window.location = html;
                 },
                 error: function(data) {
                  load.style.display='none';
                console.log(data);
        }
				 }) 
	        
	    }
	
	</script>
  </head>
  <body>
    
  @include('nav')
    <!-- END nav -->
    
    @include('poster')<br>
        <section class="ftco-about d-md-flex">
        </section><br>
        
	
	

    <section class="rehome-house-sale-area section-padding-80">
            <div class="container">
                <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                        <div class="single-property-area wow fadeInUp" data-wow-delay="200ms">
                            <!-- Property Thumb -->
                            <div class="property-thumb">
                                <img style=" min-height: 400px; max-height: 400px;" src="images/{{ $event}}.jpg" alt="">
                            </div>

                            <!-- Property Description -->
                            <div class="property-desc-area">
                            @foreach($responces as $responce)
                                <!-- Property Title & Seller -->
                                <div class="property-title-seller d-flex justify-content-between">
                                    <!-- Title -->
                                    <div class="property-title">
                                        <h4>Event</h4>
                                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $event}}</p>
                                    </div>
                                    <!-- Seller -->
                                    <div class="property-seller">
                                        <p>Organizer:</p>
                                        <h6>{{$responce->Organizer}}</h6>
                                    </div>
                                </div>
                                <!-- Property Info -->
                               
                                <div class="property-info-area d-flex flex-wrap">
                                    <p>Date: <span>{{$responce->Date}}</span></p>
                                    <p>Time: <span>{{$responce->Time}}</span></p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <h2 align="center">Select Ticket Tyep</h2>
                    @foreach($responces as $responce)
                            @if($responce->VVIP!='n')
                            <a  onclick="vvip()" >
                                <div class="col-sm col-md-6 col-lg ftco-animate">
                                <div  class="destination" style= " min-width: 330px; max-width: 500px; background-color:#fff; color:#000; padding-left:10px; padding-right:10px; padding-top:10px; margin:10px; border-radius: 1rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);">
                                <table	width="100%" >	
                                    <tr>
                                        <td width="38%" style="color:black;">V-VIP</td>		
                                        <td	width="38%" align="center" style="color:black;">{{$responce->VVIP}}Br</td>
                                    </tr>
                                </table>
                                    <h6 align="center">Avilable Ticket: {{$responce->VVIP_am}}</h6>
                                </div>
                                </div>
                            </a>
                            @endif
                            @if($responce->VIP!='n')
                            <a  onclick="vip()" >
                                <div class="col-sm col-md-6 col-lg ftco-animate">
                                <div  class="destination" style= " min-width: 330px; max-width: 500px; background-color:#fff; color:#000; padding-left:10px; padding-right:10px; padding-top:10px; margin:10px; border-radius: 1rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);">
                                <table	width="100%" >	
                                <tr>
                                    <td width="38%" style="color:black;">VIP</td>		
                                    <td	width="38%" align="center" style="color:black;">{{$responce->VIP}}Br</td>
                                </tr>
                                </table>
                                <h6 align="center">Avilable Ticket: {{$responce->VIP_am}}</h6>
                                </div>
                                </div>
                            </a>
                            @endif
                            @if($responce->Regular!='n')
                            <a  onclick="regular()">
                                <div class="col-sm col-md-6 col-lg ftco-animate">
                                <div  class="destination" style= " min-width: 330px; max-width: 500px; background-color:#fff; color:#000; padding-left:10px; padding-right:10px; padding-top:10px; margin:10px; border-radius: 1rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);">
                                <table	width="100%" >	
                                <tr>
                                    <td width="38%" style="color:black;">Regular</td>
                                    <td	width="38%" align="center" style="color:black;">{{$responce->Regular}}Br</td>
                                </tr>
                                </table>
                                <h6 align="center">Avilable Ticket: {{$responce->Regular_am}}</h6>
                                </div>
                                </div>
                            </a>
                            @endif
                            @if($responce->Other!='n')
                            <a  onclick="other()" >
                                <div class="col-sm col-md-6 col-lg ftco-animate">
                                <div  class="destination" style= " min-width: 330px; max-width: 500px; background-color:#fff; color:#000; padding-left:10px; padding-right:10px; padding-top:10px; margin:10px; border-radius: 1rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);">
                                <table	width="100%" >	
                                <tr>
                                    <td width="38%" style="color:black;">Other</td>		
                                    <td	width="38%" align="center" style="color:black;">{{$responce->Other}}Br</td>
                                </tr>
                                </table>
                                <h6 align="center">Avilable Ticket: {{$responce->Other_am}}</h6>
                                </div>
                                </div>
                            </a>
                                @endif
                        @endforeach
                    </div>

                        </div>

                    </div>
                </section>

    @include('footer')

  <!-- loader -->
 

  @include('loder')
	
	<script src="js/jquery-latest.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>