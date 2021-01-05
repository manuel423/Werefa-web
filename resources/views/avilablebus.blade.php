
        <section class="screen-bus">
        

    <div  class="screen-bus__location-filter-wrap">
      <div class="screen-bus__location-filter-row">
        <div class="screen-bus__location">
          <div class="screen-bus__location-row">
            <span class="screen-bus__location-col">{{$from}}</span>
            <span class="screen-home__rs-arrow"></span>
            <span class="screen-bus__location-col">{{$to}}</span>
          </div>
          <div class="screen-bus__date-row">
            <span>{{$date}}</span>
          </div>
        </div>
      </div>
    </div>
    @foreach($responces as $responce)
        @if($responce->avilablseat>0)
    <div class="screen-bus__travels-wrap">
      <div class="screen-bus__travels-row">
      <a onclick="load()" href="/busseats?{{$responce->id}}">
        <div style="color: black;" class="screen-bus__travels-col">
          <div class="screen-bus__name-time-seat">
            <div class="screen-bus__name-wrap">
              <span class="screen-bus__name">Selam Bus</span>
            </div>
            <div class="screen-bus__time-wrap">
              <div class="screen-bus__time">
                <div class="screen-bus__start">{{$responce->TakeofTime}}</div>
                <div class="screen-bus__time-arrow-wrap">
                  <span class="screen-bus__time-arrow"></span>
                </div>
                <div class="screen-bus__end">15:40</div>
              </div>
              <div class="screen-bus__hrs">
                <span>ተዋት</span>
              </div>
            </div>
            <div class="screen-bus__seat-wrap">
              <div>
                <span class="screen-bus__count">{{$responce->avilablseat}}</span>
                Seats Available
              </div>
            </div>
          </div>
          <div class="screen-bus__rating-price">
            <div class="screen-bus__rating-price-row">
              
              <div  class="screen-bus__price">
                <span><span>ETB</span>{{$responce->Price}}</span>
              </div>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
    @endif
        @endforeach
  </section>
        
       