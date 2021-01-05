

<!DOCTYPE html>
<html id="html"lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>www.Werefa.com</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/alert.css">
      <link rel="stylesheet" href="css/load.css">
	  <link rel="stylesheet" href="css/button.css">
	  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="js/jquery-latest.min.js"></script>
		
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
							a.click();		
					}
			});
		}
		</script>
		
  </head>
  <body	>
			@foreach($eventinfo as $event)
				<h4	id="c_ticket_no"	style="display:none;">{{$event->Ticket_No}}</h4>
			@endforeach
             

<div id="werefaAlert">
			<div id="box">
				<div class="heading">
					<img src="images/whlogo.jpg"></img>
				</div>
				
				<div  class="content">
				
				<div id="mes"></div>
					<button type="button" id="confirmbtn" onclick="hidealert()" >ok</button>
					
				</div>
				
			</div>
</div> 
@include('loder')
  <script src="js/alert.js"></script>
	<script src="js/html2canvas.js"></script>
	<script src="js/canvas2Image.js"></script>
  <script src="js/jquery.min.js"></script>
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
						@foreach($eventinfo as $event)
						    Event: {{$event->EventName}}<br>
							Type: {{$event->Type}}<br>
							Date: {{$event->Day}},{{$event->Time}}
						@endforeach
					</div>
					<div id="Tqrcode"	style="padding-left: 25%;	padding-top: 4%;	padding-bottom:2%;"></div>
					
					<hr	id="line"	style="background-color:black;text-color:black;">
					<h6>This ticket is for one use only!!</h6>
					<h6>Please Download or Screenshot the Ticket!!</h6>
					<table	width="100%" style="color: black;">		
								<tr>
								<td align="left">Ticket_price</td>
								<td align="center">{{$buses}} birr</td>
								</tr>
								<tr>
									<td	width="20%" align="left" >Service_cost</td>
									<td	width="20%"	align="center">4 birr</td>
								</tr>
								<tr>
									<td	width="20%" align="left" >Total</td>
									<td	width="20%"	align="center">{{$buses +4}} birr</td>
								</tr>
            </table>
			</div>
		</div>
	</div>
	<button id="butn" onclick="pdf()" class="btns btn-4 btn-sep icon-download" align="center" style="min-width: 350px; max-width: 360px;">Download Ticket</button>
</html>