

<!DOCTYPE html>
<html id="html"lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Werefa Online Ticket Service!!</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="css/alert.css">
      <link rel="stylesheet" href="css/load.css">
	  <script src="js/jquery.min.js"></script>
		
		<script>
		
		 function load(){
	         var load=document.getElementById("wrapper");
			 load.style.display='block';
	        
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
				window.location="/";
			      
				
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
			@foreach($businfo as $bus)
				<h4	id="c_ticket_no"	style="display:none;">{{$bus->Ticket_No}}</h4>
			@endforeach
              
			@include('loder')
  <script src="js/alert.js"></script>
	<script src="js/html2canvas.js"></script>
	<script src="js/canvas2Image.js"></script>
  <script src="js/qrcode.js"></script>
  

  </body>
  
    	<div id="popupBoxOnePosition"	style="top: 0; left: 0; position:flex; min-width: 340px; max-width: 500px; height:120%;
				background-color: rgba(,0,0,0.7); 	
				justify-content:center;	align-text:center;">
				<div style="min-width: 340px; max-width: 500px;"><h4	onclick="exit()"class="closse"	style="  float:right;font-size:42px;transform:rotate(45deg);cursor:pointer;	color:#000000">+</h4></div>
				
		<div  id="popupBoxWrapper"	style="min-width: 350px; max-width: 500px; text-align: left;	height:auto;">
				<div class="popupBoxContent"	style="background-color: #fff; padding-left: 5%;	">
				    <div style="width:100%; " align="center">
					<img	id="logot"src="images/logo.jpg"	style="padding-top:10px;	padding-bottom:0%;"	/>
					</div>
                    <hr>
					<div	id="info"	style="padding:0px;">
						@foreach($businfo as $bus)
							Bus Name: {{$bus->Bus_Name}}<br>
							Bus_Number: {{$bus->Bus_No}}<br>
							Seat:
							<?php 
								$seats[]=json_decode( $bus->Seat_No, true);
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
							Path: {{$bus->From}} to {{$bus->To}}<br>
							Date: {{$bus->Date}},{{$bus->Time}}am
						@endforeach
					</div>
					<div id="Tqrcode"	style="padding-left: 25%;	padding-top: 4%;	padding-bottom:2%;"></div>
					<hr	id="line"	style="background-color:black;text-color:black;">
					<h6>This ticket is for one use only!!</h6>
					<h6>Please Download or Screenshot the Ticket!!</h6>
					<table	width="100%" style="color: black;">		
								<tr>
								<td align="left">Ticket_price</td>
								<td align="center">ETB{{$price}}</td>
								</tr>
								
            </table>
					
			</div>
		</div>
	</div><br>
	<button id="butn" onclick="pdf()" class="btns btn-4 btn-sep icon-download" align="center" style="min-width: 350px; max-width: 360px;">Download Ticket</button>
</html>