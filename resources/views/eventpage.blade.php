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
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/load.css">
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
            <h2 align="center">Upcoming Events</h2><br>
            <div class="row">

                <!-- Single Featured Property -->
                @foreach($events as $event)
                
                <div class="col-12 col-md-6 col-xl-4">
            <a onclick="load()"  href="event?name={{$event->Event}}">
                <div class="single-featured-property mb-50">
                    <!-- Property Thumbnail -->
                    <div class="property-thumb">
                        <img style=" min-height: 250px; max-height: 250px; min-width: 350px; max-width: 350px;" src="img/events/{{$event->Event}}.jpg" alt="">

                    </div>
                    <!-- Property Content -->
                    <div class="property-content">
                    <div class="weekly-office-hours" style="color:black;">
                            <ul>
                                <li class="d-flex align-items-center justify-content-between"><span>Date:</span> <span>{{$event->Date}}</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Time:</span> <span>{{$event->Time}}</span></li>
                                <li class="d-flex align-items-center justify-content-between"><span>Location:</span> <span>{{$event->Location}}</span></li>
                                <?php 
                                        $avilabl=$event->VVIP_am +  $event->VIP_am + $event->Regular_am + $event->Other_am;
                                        ?>
                                <li class="d-flex align-items-center justify-content-between"><span>Available:</span> <span>{{$avilabl}}</span></li>  
                            </ul>
                        </div>
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