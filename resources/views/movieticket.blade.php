
<!DOCTYPE html>
<html id="html"lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Werefa Online Ticket Service!!</title>
  <link	rel="icon"	href="img/home/w.jpg"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
     <link rel="stylesheet" href="css/alert.css">
	  <link rel="stylesheet" href="css/load.css">
	  <link rel="stylesheet" href="style.css">
	  
	  <script src="js/jquery.min.js"></script>
		
		<script>
		
		 function load(){
	         var load=document.getElementById("wrapper");
			 load.style.display='block';
	        
		}
		function checkifdownload(){
			var load = document.getElementById("werefaAlert");
            load.style.display = "block";
            $("#mesage").html("Did you download/Screenshot the ticket?");
	        
		}
		
			    
				$(document).ready(function(){
					
					var qr_id = document.getElementById("c_ticket_no").innerHTML;
						
						let qrcode = new QRCode("Tqrcode", {
							text: qr_id,
							width: 150,
							height: 150,
							colorDark : "#000000",
							colorLight : "#ffffff",
							correctLevel : QRCode.CorrectLevel.H
							});
	});
	
		function	exit(){
		    var load=document.getElementById("wrapper");
			 load.style.display='block';
			window.location="/home";
			      
				
		}

		function cancel(){
			var load = document.getElementById("werefaAlert");
            load.style.display = "none";
	        
	    }
				
		
			
		function pdf() {
		
		var num=Math.floor((Math.random() * 9000) + 1);
		var imgname='wt_'+num;

			html2canvas($('#popupBoxWrapper'),{
					onrendered:	function(canvas){
					
							var	a=document.createElement('a');
						a.href=canvas.toDataURL("HTTP/HTTPS");
							a.download=imgname+".jpg";
							a.base64_decode;
							a.click();		
					}
			});
		}
		</script>
		
  </head>
  <body	>
			@foreach($movieinfo as $movie)
				<h4	id="c_ticket_no"	style="display:none;">{{$movie->Ticket_No}}</h4>
			@endforeach
             

			<div id="popupBoxOnePosition"	style="top: 0; left: 0; position:flex; min-width: 340px; max-width: 500px; height:120%;
				background-color: rgba(,0,0,0.7); 	
				justify-content:center;	align-text:center;">
				<div style="min-width: 340px; max-width: 500px;"><h4	onclick="checkifdownload()"class="closse"	style="  float:right;font-size:42px;transform:rotate(45deg);cursor:pointer;	color:#000000">+</h4></div>
				<div  id="popupBoxWrapper"	style="min-width: 350px; max-width: 500px; text-align: left;	height:auto;">
				<div class="popupBoxContent"	style="background-color: #fff; padding-left: 5%;	">
				    <div style="width:100%; " align="center">
					<img	id="logot"src="img/home/logo.jpg"	style="padding-top:10px;	padding-bottom:0%;"	/>
					</div>
                    <hr>
					<div	id="info"	style="padding:0px;">
						@foreach($movieinfo as $movie)
						    Movie: {{$movie->Movie_Name}}<br>
							Cinema Name: {{$movie->Cinema_Place}}<br>
							Seat-no: <?php 
								$seats[]=json_decode( $movie->Seat_No, true);
								?>
								@foreach($seats as $seat)
								<?php $size=count($seat);?>
									@for($i=0; $i<$size; $i++)
										{{$seat[$i]}}
										@if($i==$size-2)
											and
										@elseif($i<$size-2)
											,
										@endif
									@endfor
								@endforeach
							<br>
							Date: {{$movie->Day}},{{$movie->Time}}
						@endforeach
					</div>
					<div id="Tqrcode"	style="padding-left: 25%;	padding-top: 4%;	padding-bottom:2%;"></div>
					
					<hr	id="line"	style="background-color:black;text-color:black;">
					<h6>This ticket is for one use only!!</h6>
					<h6>Please Download or Screenshot the Ticket!!</h6>
					<table	width="100%" style="color: black;">		
								<tr>
								<td align="left">Ticket_price</td>
								<td align="center">{{$price}} birr</td>
								</tr>		
            </table>
			</div>
		</div>
	</div><br><br>
	<input onclick="pdf();" style="border-radius: 0.5rem; margin-left:25%; padding: 5px; align:center; background-color:black; color:white; width:50%; " type="button" value="Download Ticket">
	


  <script src="js/alert.js"></script>
	<script src="js/html2canvas.js"></script>
	<script src="js/canvas2Image.js"></script>
  
  <script src="js/qrcode.js"></script>


  </body>

  
    <div id="werefaAlert">
    <div class="preloader d-flex align-items-center justify-content-center">
    <section class="listings-content-wrapper section-padding-100">
      <div class="container">
        <div
          style="min-width: 330px; max-width: 500px; background-color:#fff; padding-left:5px; padding-right:5px; border-radius: 0.7rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1); ">
          <h4 align="center" style="color:black; font-size:40px; padding:10px;">Caution</h4>

          <div id="mesage"></div>

          <div class="form-group">
			<input onclick="exit()"  type="submit" name="submit" value="Yes" class="button " />
			<input onclick="cancel()"  type="submit" name="submit" value="No" class="button " />

          </div>
        </div>
      </div>

    </section>
    </div>
  </div>
   
@include('loder')
</html>