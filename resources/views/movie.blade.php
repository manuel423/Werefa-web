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
    <link	rel="icon"	href="img/home/w.jpg"/>

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/load.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/select2.min.css">
   
    <script src="js/jquery.min.js"></script>
    <script src="js/select2.min.js"></script>
	<script>
	
	    function load(){
	         var load=document.getElementById("wrapper");
			 load.style.display='block';
	        
	    }

        function colose() {
    var load = document.getElementById("werefaAlert");
    load.style.display = "none";
}
	
		$(document).ready(function(){
            $("#opp").select2();
		$('#opp').change(function () {
		     var load=document.getElementById("wrapper");
			load.style.display='block';
        var decision = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                 type: "POST",
                 url: "/checkmovie",
                 data: {decision:	decision},
				 cache:false,
				 
                 success: function(html) {
                     
					          load.style.display='none';
                     $('#acd').html(html);
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
    @include('poster')
    <!-- ##### Header Area End ##### -->
    <br><br>

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single Featured Property -->

                <div class="column">

                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 160px; max-height: 160px; min-width: 100%;"
                                src="img/moveis/{{ $movie->MovieName}}.jpg" alt="">
                        </div>
                        <!-- Property Content -->
                    </div>
                </div>

                <div class="single-featured-property mb-50">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <h6 align="center">Detail</h6>
                        <h6>{{$movie->MovieName}}</h6>
                        <h6>{{$movie->Gener}}</h6>
                        <h6>{{$movie->Time}}hr</h6>
                    </div>
                    <!-- Property Content -->
                </div>
                <div style=" margin-left:5%; width: 50%;" >
                <h6>Choose Cinema</h6>
                <select id="opp" >
                    <option  value="choose" disabled selected hidden>Choose</option>
                    @foreach($cinemas as $cinema)
                    <option value="{{ $cinema->Name }}">{{ $cinema->Name }} Cinema</option>
                    @endforeach
                </select><br><br>
               
            </div>
            </div>

            <!-- Single Featured Property -->
            
            <div style="width: 100%;" id="acd"></div>
        </div>

        </div>
    </section>
    <section class="listings-content-wrapper section-padding-100">
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('footer')
    
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
    <script src="js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

   

</body>

</html>
