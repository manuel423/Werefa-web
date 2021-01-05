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
<br><br>

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
        <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
              <?php if($_SERVER["QUERY_STRING"]=='amh'){?>
            <a onclick="load()" href="/cinema?amh" class="active"  >Amharic</a>
            <a onclick="aler()"  class=""  >English</a>
              <?php }else{?>
                <a onclick="load()" href="/cinema?amh" class=""  >Amharic</a>
            <a onclick="aler()"  class="active"  >English</a>
              <?php }?>
            
          </div>
        </div>
      </div>
            <div class="row">

                <!-- Single Featured Property -->
                @foreach($movies as $movie)
                
                <div class="column">
            <a onclick="load()"  href="movie?{{ $movie->id}}">
                <div  class="single-featured-property mb-50">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                            <img style=" min-height: 200px; max-height: 200px; min-width: 100%;"
                                src="img/moveis/{{ $movie->MovieName }}.jpg" alt="">

                        </div>
                    <!-- Property Content -->
                    <div class="property-content">
                    <h6>{{$movie->MovieName}}</h6>
                    </div>
                </div>
            </a>
            </div>
            
                @endforeach

                <!-- Single Featured Property -->

                
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="south-pagination d-flex justify-content-end">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
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