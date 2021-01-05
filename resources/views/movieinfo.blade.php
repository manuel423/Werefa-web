<script>
    function checke(){
        //var no=;
        const rbs = document.querySelectorAll('input[name="time"]');
            var no=0;
            for (const rb of rbs) {
                if (rb.checked) {
                    no++;
                }
            }

            if(no>0){
                return true;
            }else{
                var load=document.getElementById("wrapper");
      load.style.display='none';
                var al = document.getElementById("werefaAlert");
                    al.style.display = "block";
                    $("#mesage").html("Choose time!");
                return false;
            }

       
         
     }
</script>

<link rel="stylesheet" href="css/boxraidobtn.css">  
                     
                      @foreach($price as $p)
                        <h1	style="color:black;	font-family:Menlo; font-size:30px;" 	align="center">{{$p->Name}} Cinema</h1>
                        <hr>
                        <?php
                             session(['price' => $p->Price]);
                             ?>
                        <h6>Location: {{$p->location}}</h6><br>
                        <h6 style=" color:black;">Price:  ETB{{$p->Price}}</h6>
                        @endforeach
                        
                        <form action="/cinemmap" method="post" onsubmit="return checke();"> 
                        <h5 align="center" style="color:black;">Schedule</h5>
                        @csrf
                        @foreach($movieinfos as $movieinfo)
                            <?php 
                                $days=json_decode( $movieinfo->Schedule, true);
                            ?>
                            @foreach($days as $day=>$time)

                            <a data-toggle="collapse" href="#{{$day}}">
                                <div
                                    style="width: 100%; background-color: black; height: fit-content;   padding: 2px; margin-bottom: 5px;">
                                    <h3 align="center" style="color: white;">{{$day}} <span style="color: white; float:right; padding-right:5px;">+</span></h3>
                                    
                                </div>
                            </a>
                            <div style="background-color: white;" id="{{$day}}" class="panel-collapse collapse">
                                <div class="suschedule">
                                    <h3 align="center">Time schedule</h3>
                                </div>
                               
                                <div class="container">
                                        <div class="row">
                            <?php $size=count($time);?>
                            @for($i=0; $i<$size; $i++)       
                                        <div style="background-color:black; color:white; border-radius: 0.8rem; box-shadow: 10px 15px 20px 10px rgba(0, 0, 0, 0.1);" class="cols ">
                                                
                                                <label>
                                                <input type="radio" name="time"	value="{{$time[$i][0]}},{{$time[$i][1]}},{{$day}}" class="card-input-element" />

                                                    <div  class="  card-input">
                                                    <div style="width: 100%;" class="panel-body">
                                                    {{$time[$i][0]}}
                                                    </div>
                                                    </div>

                                                </label>  
                                            </div>     
                            @endfor
                            </div> 
                                </div>
                                <input onclick="load();" value="Selecte seat" type="submit" class="btn-success" 
                                    style="margin-bottom: 5%; margin-right: 5%; float: right; "/><br><br>
                            </div>
                            
                            @endforeach
                        @endforeach
                        </form>
                                                  
<script src="js/plugins.js"></script> 