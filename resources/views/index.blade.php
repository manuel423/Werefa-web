<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Werefa Online Ticket Service!!</title>
    <!-- Favicon  -->
    <link	rel="icon"	href="img/home/w.jpg"/>

    <!-- Style CSS -->
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/load.css">
<script>
    function load(){
	         var load=document.getElementById("wrapper");
					  load.style.display='block';
	        
        }
        function aler(){
            var load = document.getElementById("werefaAlert");
            load.style.display = "block";
            $("#mesage").html("Comming Soon!");
	        
        }
        function colose() {
    var load = document.getElementById("werefaAlert");
    load.style.display = "none";
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
    @include('poster')
    <!-- ##### Header Area End ##### -->

   <br><br><br>
    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">

            <div class="row">

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="load()"  href="/cinema?amh">
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/cin.jpg" alt="">

                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h6>Movies Ticket</h6>
                        </div>
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="aler()"  >
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/sta.jpeg" alt="">

                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h6>Stadium Ticket</h6>
                        </div>
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="aler()" >
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/bus.jpg" alt="">

                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h6>Bus Ticket</h6>
                        </div>
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->
                <div class="column">
                <a onclick="aler()" >
                    <div class="single-featured-property mb-50">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <img style=" min-height: 150px; max-height: 150px; min-width: 100%;" src="img/home/event.jpg" alt="">

                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h6>Event Ticket</h6>
                        </div>
                    </div>
                </a>
                </div>

                <!-- Single Featured Property -->  
            </div>
        </div>
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

</body>

</html>