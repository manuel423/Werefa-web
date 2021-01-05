

<!DOCTYPE html>
<html id="html"lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Werefa Online Ticket Service!!</title>
    
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
		    
		   // var options = {
		///'width':390.5,
 /// 	};
  ///	var pdf = new jsPDF('p', 'pt', 'a5');
  ///	pdf.addHTML($("#popupBoxOnePosition"), -1, 60, options, function() {
   // 	pdf.save('admit_card.pdf');
  //	});
			
			html2canvas($('#popupBoxOnePosition'),{
					onrendered:	function(canvas){
					
							var	a=document.createElement('a');
						a.href=canvas.toDataURL("HTTP/HTTPS");
							a.download="file.jpg";
							a.click();		
					}
			});
		}
		</script>
		
  </head>
  <body	>
			@foreach($stadiuminfo as $stad)
				<h4	id="c_ticket_no"	style="display:none;">{{$stad->Ticket_No}}</h4>
			@endforeach
             


</div>
@include('loder')
  <script src="js/alert.js"></script>
	<script src="js/html2canvas.js"></script>
	<script src="js/canvas2Image.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/qrcode.js"></script>


  </body>
  <h4	onclick="exit()"class="closse"	style="float:right;font-size:42px;transform:rotate(45deg);cursor:pointer;	color:#000000">+</h4>
    	<div id="popupBoxOnePosition"	style="top: 0; left: 0; position:flex; width: 100%; height:120%;
				background-color: rgba(,0,0,0.7); 	
				justify-content:center;	align-text:center;">
				
		<div class="popupBoxWrapper"	style="width: 100%; text-align: left;	height:auto;">
				<div class="popupBoxContent"	style="background-color: #fff; padding-left: 5%;	">
				    <div style="width:100%; " align="center">
					<img	id="logot"src="images/logo.jpg"	style="padding-top:10px;	padding-bottom:0%;"	/>
					</div>
                    <hr>
					<div	id="info"	style="padding:0px;">
					@foreach($stadiuminfo as $stad)
						<table width="100%">
							<tr>
								<td	width="20%"	align="center"><img	id="logot"src="images/footballlogo/{{$stad->Home_Team}}.jpg"></img></td>	
								<td	width="20%"	align="right">{{$stad->Home_Team}}</td>
								<td	align="center">Vs</td>
								<td	width="20%">{{$stad->Away_Team}}</td>
								<td	width="20%"	align="center"><img	id="logot"src="images/footballlogo/{{$stad->Away_Team}}.jpg"></img></td>
							</tr>
						</table>
						
							Stadium_Name: {{$stad->Stadium_Name}}<br>
							Stadium_Secsion: {{$stad->Stadium_Section}}<br>
							Date: {{$stad->Day}},{{$stad->Time}}
						@endforeach
					</div>
					<div id="Tqrcode"	style="padding-left: 25%;	padding-top: 4%;	padding-bottom:2%;"></div>
					
					<hr	id="line"	style="background-color:black;text-color:black;">
					<p	style="color:red;padding-bottom:0;">Show	this ticket at the gate!!</p>
					<h6>This ticket is for one use only!!</h6>
					<h6>Please Download or Screenshot the Ticket!!</h6>
			</div>
		</div>
	</div>
	
	<button id="butn" onclick="pdf()" class="btns btn-4 btn-sep icon-download" align="center">Download Ticket</button>
</html>