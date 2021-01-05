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
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="css/select2.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="css/businfo.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/datepicker.js"></script>
    <script>
	
	 function load(){
	    var load=document.getElementById("wrapper");
			 load.style.display='block';
	        
	    }
  
	$(document).ready(function(){
    
    $(".slect").select2();
    $( "#date" ).datepicker({
        dateFormat: 'yy-mm-dd',
        
    });
    
		$('#second').click(function () {
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		    var load=document.getElementById("wrapper");
      load.style.display='block';
     var date = $("#date").val();
     var departure = $("#opp").val();
		 var destination = $("#opp2").val();
        $.ajax({
                 type: "POST",
                 url: "/bus/avilablbuss",
                 data: {departure:	departure,destination:	destination, Date:date},
				          cache:false,
				 
                 success: function(html) {
                     
					           load.style.display='none';
                     $('#avilable').html(html);
                 },
                 error: function(data) {
                  load.style.display='none';
                console.log(data);
        }
				 }) 
				 
				var de = document.getElementById("second");
				 
    });
    
	});
	
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
        <div class="container">
        <h4		align="center">Search For Available Buses</h4><br>
				
        <input	id="second"	type="submit"	name="submit"	value="Go"	 class="button "	style="	float:right; "/>
        
        <select required class="slect"  id="opp"	style="margin-right: 10%;	float:left; margin-bottom: 8px; width:135px;" placeholder="From">
						<option value="Choose" disabled selected hidden>From</option>
            @foreach($citys as $city)
							<option value="{{$city->City}}">{{$city->City}}</option>
            @endforeach
				</select>
					
					<select required class="slect" id="opp2"	style="float:right; width:135px;" placeholder="From">
						<option value="choose" disabled selected hidden>To</option>
            @foreach($citys as $city)
							<option value="{{$city->City}}">{{$city->City}}</option>
            @endforeach
          </select><br><br>
          <label for="trip-start">Date:</label>
          <input id="date"  type="button" name="trip-start" value="MM/DD/YY" />
					<hr	id="line"	style="background-color:black;color:black;">
					<div	id="avilable"></div>
        </div>
    </section>
    <section class="listings-content-wrapper section-padding-100">
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('footer')

  <!-- loader -->
  @include('loder')
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

</body>

</html>