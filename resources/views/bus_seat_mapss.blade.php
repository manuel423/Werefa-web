<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Werefa Online Ticket Service!!</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">
	<link rel="stylesheet" href="css/alert.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/load.css">
	<link href="cssmap/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/boxraidobtn.css">
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
    <script src="jsmap/jquery-1.11.0.min.js"></script>
	   <script src="js/busseatmap.js"></script>
	  <script>
 function cancel(){
	         var load=document.getElementById("userinfo");
					  load.style.display='none';
	        
	    }  

         function load(){
	         var load=document.getElementById("wrapper");
					  load.style.display='block';
	        
	    }   
    </script>
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
    <!-- ##### Header Area End ##### -->


    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
    <div	style="display: none;">	
		<h4	id="price">{{$businfo->Price}}</h4>		
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
			</select>		
	</div>
    <h1	style="margin-top:10%;	font-size:30px;" align="center">{{ $businfo->BusName }} Seat Map</h1>

<div  class="content">
	<div style="margin-left:10%;" id="legend"></div>
	<div class="main">
		
		<div class="demo">
			<div id="seat-map">
				<div style="padding-left:20px;"><img src="img/home/wheel.png" style="width:45px; height:40px;" /></div>					
			</div>
			<div class="booking-details">
				<ul class="book-left">
					<li>Bus_Name </li>
					<li>Departure_Date</li>
					<li>Time</li>
					<li>Tickets</li>
					<li>Total</li>
					<li>Seats :</li>
				</ul>
				<ul class="book-right">
					<li>: {{ $businfo->BusName }}</li>
					<li>: {{$businfo->Date}}</li>
					<li>: {{$businfo->TakeofTime}}am</li>
					<li>: <span id="counter">0</span></li>
					<li style="color:black;">: <b><span  id="total">0</span><i>birr</i></b></li>
				</ul>
				<div class="clear"></div>
				<ul id="selected-seats" class="scrollbar scrollbar1"></ul>	
				<button	onclick="gotopayment()"	class="checkout-button">Book Now</button>	
			</div>
			<div style="clear:both"></div>
	    </div>
		</div>
 </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('footer')

  <!-- loader -->
 
    <!-- ##### Footer Area End ##### -->

	<div id="userinfo" >
<section class="listings-content-wrapper section-padding-100">
<div class="container">       
	<div style="min-width: 330px; max-width: 500px; background-color:#fff; padding-left:5px; padding-right:5px; border-radius: 0.7rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1); ">
					<h4 align="center" style="color:black; font-size:40px; padding:10px;">Info</h4>
					<div class="form-group">
						<input id="name"	type="text" class="form-control" placeholder="Name">
						<label id="nameval" style="color:red; visibility:hidden;"></label>
					</div>
					<div class="form-group">
						<input id="phone"	type="text" class="form-control" placeholder="Phone eg.(0913********)">
						<label id="phoneval" style="color:red; visibility:hidden;"></label>
					</div>
					
					<div class="form-group">
					<input	onclick="pay()" id="second"	type="submit"	name="submit"	value="Buy"	 class="button "/>
					<input	onclick="cancel()" id="cancel"	type="submit"	name="submit"	value="cancel"	 class="button "/>
					</div>
				</div>
				</div>
				
		</section>
</div>


<div id="werefaAlert">
    <div class="preloader d-flex align-items-center justify-content-center">
    <section class="listings-content-wrapper section-padding-100">
      <div class="container">
        <div
          style="min-width: 330px; max-width: 500px; background-color:#fff; padding-left:5px; padding-right:5px; border-radius: 0.7rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1); ">
          <h4 align="center" style="color:black; font-size:40px; padding:10px;">Coution</h4>

          <div id="mesage"></div>

          <div class="form-group">
            <input onclick="colose()" id="second" type="submit" name="submit" value="OK" class="button " />

          </div>
        </div>
      </div>

    </section>
    </div>
  </div>
@include('loder')
    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <script src="js/classy-nav.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <!-- Active js -->
	<script src="js/active.js"></script>
	
	<script src="jsmap/jquery.seat-charts.min.js"></script>
  <script src="jsmap/jquery.nicescroll.js"></script>
  <script src="jsmap/scripts.js"></script>

</body>

</html>