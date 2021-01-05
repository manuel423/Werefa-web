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
            <h2 align="center">This Week's Match</h2><br>
            <div class="row">

                <!-- Single Featured Property -->
                @foreach($ff as $footf)
                <a onclick="load()" href="/selectedgame?{{$footf->id}}">
                    <div class="col-12 col-md-6 col-xl-4">

                        <div style=" min-width: 100%; max-width: 100%; background-color:#fff; color:#000; padding-left:10px; padding-right:10px; padding-top:10px; margin:5px; border-radius: 1rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);"
                            class="single-featured-property mb-50">
                            <!-- Property Thumbnail -->
                            <table width="100%">
                                <tr>
                                    <td width="20%"><img width="40px" id="logot"
                                            src="img/footballlogo/{{$footf->HomwTeam}}.jpg"></img></td>
                                    <td style="color: black;" width="20%">{{$footf->HomwTeam}}</td>
                                    <td align="center" style="color: red;">Vs</td>
                                    <td style="color: black;" width="20%">{{$footf->AwayTeam}}</td>
                                    <td width="20%" align="center"><img width="40px" id="logot"
                                            src="img/footballlogo/{{$footf->AwayTeam}}.jpg"></img></td>
                                </tr>
                            </table>
                            <hr id="line" style="background-color:#000;text-color:#000;">
                            <table width="100%">
                                <tr>
                                    <td style="color: black;" align="left">Day</td>
                                    <td style="color: black;" align="right">Time</td>
                                </tr>
                                <tr>
                                    <td style="color: black;" width="20%" align="left">{{$footf->Date}}</td>
                                    <td style="color: black;" width="20%" align="right">{{$footf->Time}}</td>
                                </tr>
                            </table>
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
