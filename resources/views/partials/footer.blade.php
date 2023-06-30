    <div class="container py-5 ">
        <div class="row g-5 ">
            <div class="col-lg-3 col-md-6 ">
                <h4 class="text-white mb-4 ">Our Office</h4>
                <p class="mb-2 "><i class="fa fa-map-marker-alt me-3 "></i>{{$data['setting']->office_location}}</p>
                <p class="mb-2 "><i class="fa fa-phone-alt me-3 "></i>{{$data['setting']->office_phone}}</p>
                <p class="mb-2 "><i class="fa fa-envelope me-3 "></i>{{$data['setting']->office_email}}</p>
                <div class="d-flex pt-2 ">
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href=" {{$data['setting']->facebook_link}}"><i class="fab fa-facebook-f "></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href="{{$data['setting']->instagram_link}}"><i class="fab fa-instagram "></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href="{{$data['setting']->youtube_link}}"><i class="fab fa-youtube "></i></a>
                    <a class="btn btn-square btn-outline-light rounded-circle me-2 " href="{{$data['setting']->linkedin_link}}"><i class="fab fa-linkedin-in "></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <h4 class="text-white mb-4 ">REEEP Partners</h4>
                @foreach($data['partners'] as $partners)
                <a class="btn btn-link " href=" ">
                    {{$partners->title}}
                </a>
                @endforeach
            </div>

            <div class="col-lg-3 col-md-6 ">
                <h4 class="text-white mb-4 ">Quick Links</h4>
                @foreach($data['footerItems'] as $items)
                <a class="btn btn-link " href="{{$items->slug}}">{{$items->title}}</a>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-8 ">
                <h4 class="text-white mb-4 ">Map</h4>
                <div id="map " style="width: 100%;">
                    <div style="z-index: 10; padding: 0 5px;background-color: hsla(0,0%,100%,.5);margin: 0; position:absolute; bottom:0px; right: 0px ">
                        © <a href="https://www.openstreetmap.org/copyright " rel="noopener noreferrer no follow " target="_blank ">OpenStreetMap contributors</a></div>
                    <div style="height: 200px; ">
                        <a href="https://baato.io " rel="noopener noreferrer no follow " target="_blank "><img src="https://sgp1.digitaloceanspaces.com/baatocdn/images/BaatoLogo.svg " alt="Baato " width="80px "></img>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
