<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Werefa Online Ticket Service!!</title>

    <!-- Favicon  -->
    <link	rel="icon"	href="img/home/w.jpg"/>
    <!-- Style CSS -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="cinemamappcss/jquery.seat-charts.css">
    <link rel="stylesheet" href="cinemamappcss/interstyle.css">
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script>
	
	 function load(){
	    var load=document.getElementById("wrapper");
			 load.style.display='block';
	        
		}
		function cancel(){
	         var load=document.getElementById("userinfo");
					  load.style.display='none';
	        
	    }
	</script>

	<style>
		#userinfo{
			display:none;
			position:fixed;
			top:0;
			left:0;
			right:0;
			bottom:0;
			z-index:999;
			background-color: rgba(255,255,255,0.4);
			width: 100%; 
			height:100%
		}
		</style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader-active">
        <div class="preloaders d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                <img src="img/home/w.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    @include('nav')
    @include('poster')
    <!-- ##### Header Area End ##### -->
	<div	style="display: none;">	
	<select id="seatno">
				@foreach($soldSeats as $soldseat)
				<?php 
					$i=0;
					$seats[]=json_decode( $soldseat->Seat_id, true);
					
					?>
					@foreach($seats as $seat)
					<?php $size=count($seat);?>
						@for($i=0; $i<$size; $i++)
						<option value="{{$seat[$i]}}">{{$seat[$i]}}</option>
						@endfor
					@endforeach
                @endforeach
                @foreach($cinemasoald as $cinema)
				<?php 
					$i=0;
					$cseats[]=json_decode( $cinema->Seat_id, true);
					
					?>
					@foreach($cseats as $cseat)
					<?php $size=count($cseat);?>
						@for($i=0; $i<$size; $i++)
						<option value="{{$cseat[$i]}}">{{$cseat[$i]}}</option>
						@endfor
					@endforeach
				@endforeach
			</select>	

	@foreach($infos as $info)
		<h4	id="rprice">{{$info->Price}}</h4>	
		<h4	id="vprice">{{$info->Price}}</h4>	
		@endforeach
		
	</div>

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <h6 align="center">cinema 1 seat map</h6>
			<div id="legend"></div>
    <div class="wrapper">
    <div class="front">SCREEN</div>
    <h6 align="center"><< slide for more seat >></h6><br>
			<div  id="seat-map">
			</div>
    </div>
    <div class="booking-details">
                <h2>Booking Details</h2>
                <h3></h3>
				<h3> Selected Seats (<span id="counter">0</span>):</h3>
				<ul id="selected-seats">
				</ul>
				<b style="font-size: 15px;">Total:</b> <b>ETB<span id="total">0</span></b>
				<input onclick="gotopayment();" style="border-radius: 1rem; margin-left:25%; padding: 5px; align:center; background-color:black; color:white; width:50%; " type="button" value="Buy Ticket">

			</div>
    </section>
   
    <!-- ##### Listing Content Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('footer')

  <!-- loader -->
 
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <script src="js/classy-nav.min.js"></script>
    
    <!-- Active js -->
    <script src="js/active.js"></script>
    
	<script src="cinemajs/jquery.seat-charts.js"></script>
	<script src="js/cinemamaps/{{$cplace}}{{$screen}}.js"></script>

    <div id="werefaAlert">
    <div class="preloader d-flex align-items-center justify-content-center">
    <section class="listings-content-wrapper section-padding-100">
      <div class="container">
        <div
          style="min-width: 330px; max-width: 500px; background-color:#fff; padding-left:5px; padding-right:5px; border-radius: 0.7rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1); ">
          <h4 align="center" style="color:black; font-size:40px; padding:10px;">Caution</h4>

          <div id="mesage"></div>

          <div class="form-group">
            <input onclick="colose()" id="second" type="submit" name="submit" value="OK" class="button " />

          </div>
        </div>
      </div>

    </section>
    </div>
  </div>

<div id="userinfo" >
<section id="paymentch" style="background-color: white;" class="listings-content-wrapper section-padding-100">
	<h5 align="center">Choose Payment</h5>
<div class="container">

            <div class="row">

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="pay();" >
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/cbe.jpg" alt="">

                        </div>
                        
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="pay();" >
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/amole.png" alt="">

                        </div>
                        
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="pay();">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/yenepay.png" alt="">

                        </div>
                        
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="pay();">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/hellocash.jpg" alt="">

                        </div>
                        
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->  
            </div>
		</div>
		<input onclick="cancel();" style="border-radius: 1rem; margin-left:25%; padding: 5px; align:center; background-color:black; color:white; width:50%; " type="button" value="cancel">
</section>
</div>

@include('loder')

</body>


</html>