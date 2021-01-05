
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Werefa Online Ticket Service!!</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    
     <link rel="stylesheet" href="css/load.css">


	<script>
	
	    function load(){
			// var	rad=document.getElementsByClassName("radio");
			// var	cun=0;
			// for(var	i=0;i<rad.length;i++){
			// 	if(rad[i].checked==false){
			// 		cun++;
			// 	}
			// }
	
			// if(cun==rad.length){
			// 	alert("You_have_to_choose_time!!");
			// }
				var load=document.getElementById("wrapper");
				load.style.display='block';
	        
	    }
    </script>
  </head>
  <body>
  @include('nav')
    
	@include('poster')

	<section class="ftco-section">
      <div class="container">
			
					 <h4	align="center" style="color:black;">Selected Game</h4>
					 <div style="background-color:#fff; color:#000; padding-left:10px; padding-right:10px; padding-top:10px; margin:10px;">
                <table	width="100%" >		 
								<tr	>
										<td	width="20%"	><img	 width= "40px"  id="logot" src="images/footballlogo/{{$match->HomewTeam}}.jpg"></img></td>	
										<td	width="20%" >{{$match->HomewTeam}}</td>
										<td	align="center" style="color: red;">Vs</td>
										<td	width="20%"	>{{$match->AwayTeam}}</td>
										<td	width="20%"	align="center"><img	 width= "40px" id="logot"src="images/footballlogo/{{$match->AwayTeam}}.jpg"></img></td>
								</tr>
            </table>
            <hr	id="line"	style="background-color:#000;text-color:#000;">
            <table	width="100%">		
                <tr>
                  <td align="left">Day</td>
                  <td align="right">Time</td>
                </tr> 
								<tr	>
										<td	width="20%" align="left">{{$match->Date}}</td>
										<td	width="20%"	align="right">{{$match->Time}}</td>
								</tr>
            </table>
                </div>
							<div style="background-color:#34495e; padding-top:20px; padding-left:5px; border-radius: 1rem;">
								<h4	align="center" style="color:white;">Choose	Gate	you	Want</h4><br>
								<form	action="/payment?stadium"	method="post">
									@csrf
									<table	width="100%"	>
											<tr>
												<th style="color:white;">Section_Name</th>
												<th align="center" style="color:white;">Price(birr)</th>
											</tr>
												@foreach($gates as $gate)
													<tr>
															<td style="color:white; padding-left:15px;"><input class="radio"	type="radio" name="Stadium_Secsion"	value="{{$gate->id}}" 	checked="checked">{{$gate->Gate_Name}}</input></td>
															<td	align="left" style="color:white; padding-left:15px;">{{$gate->Price}}</td>
													</tr>
												@endforeach
										</table>
									<input style="margin-left:10px;" onclick="load()" style="align:center;"type="submit"	name="submit"	value="Buy	Ticket"	 class="button "	style="	align:center;"/>
								</form>
							</div>
		</div>
	</section>
	<section class="ftco-section">
	</section>
	@include('footer')
  <!-- loader -->
  

  @include('loder')

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