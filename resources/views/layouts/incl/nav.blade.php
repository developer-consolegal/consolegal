

<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-nav sticky-top flex-column" id="navbarWeb">
   <div class="container-fluid px-3 border-bottom-md">
      <a class="navbar-brand" href="/"><img src="{{ asset('web/image/logo.jpeg')}}" alt="" width="auto"
            height="65px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-start align-items-md-center">
            <ul class="navbar-nav d-md-none">
               <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Incorporation
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     @foreach($service_menu as $data)
                     @if($data->category == "incorporation")
                     <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a>
                     </li>
                     @endif
                     @endforeach

                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Registration
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     @foreach($service_menu as $data)
                     @if($data->category == "registration")
                     <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a>
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Tax/GST
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     @foreach($service_menu as $data)
                     @if($data->category == "tax-gst")
                     <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a>
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Compliance
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     @foreach($service_menu as $data)
                     @if($data->category == "compliance")
                     <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a>
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     Others
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     @foreach($service_menu as $data)
                     @if($data->category == "others")
                     <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a>
                     </li>
                     @endif
                     @endforeach
                  </ul>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                     aria-expanded="false">
                     Programs
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="https://www.startupassist.consolegal.com/" target="_blank">Startup Assist</a></li>
                     <li><a class="dropdown-item" href="https://www.msmeignite.consolegal.com/images/home/logo.png" target="_blank">MSME Ignite</a></li>
                  </ul>
               </li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                     data-bs-toggle="dropdown" aria-expanded="false">
                     More
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <li><a class="dropdown-item" href="/about">About</a></li>
                     <li><a class="dropdown-item" href="{{route('galleryEvents')}}">Gallery & Events</a></li>
                     <li><a class="dropdown-item" href="/blogpage">Blogs</a></li>
                     <li><a class="dropdown-item" href="/contact">Contact Us</a></li>
                     <li><a class="dropdown-item" href="{{route('career')}}">Career</a></li>
                     <li><a class="dropdown-item" href="{{route('partnerWithUs')}}">Partner With Us</a></li>

                     <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Insurance <i class="fas fa-chevron-down text-small"></i></a>
                        <ul class="dropdown-menu toggle">
                           <li><a class="dropdown-item" href="/insurance/life">Life Insurance</a></li>
                           <li><a class="dropdown-item" href="/insurance/health">Health Insurance</a></li>
                           <li><a class="dropdown-item" href="/insurance/travel">Travel Insurance</a></li>
                           <li><a class="dropdown-item" href="/insurance/motor">Motor Insurance</a></li>
                        </ul>
                     </li>
                     <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="#">Loan <i class="fas fa-chevron-down text-small"></i></a>
                        <ul class="dropdown-menu toggle">
                           <li><a class="dropdown-item" href="/loan/personal">Personal Loan</a></li>
                           <li><a class="dropdown-item" href="/loan/business">Business Loan</a></li>
                           <li><a class="dropdown-item" href="/loan/home">Home Loan</a></li>
                           <li><a class="dropdown-item" href="/loan/car">Car Loan</a></li>
                        </ul>
                     </li>
                  </ul>
               </li>
            </ul>
            <ul class="navbar-nav ">
               <li class="nav-item">
                  <a class="nav-link" href="{{config('app.whatsapp')}}" target="_blank"> <i
                        class="fab text-success fw-bold fa-whatsapp"></i> {{config('app.phone')}}</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="tel:{{config('app.phone')}}" target="_blank"> <i
                        class="fas theme-blue fa-phone-alt"></i> {{config('app.phone')}}</a>
               </li>
               <li class="nav-item d-flex">
                  @if(Session::has('user'))
                  <a class="nav-link " id="login-btn" href="/users/signout"><i class="fas fa-sign-in-alt"></i>
                     Logout</a>
                  <a class="nav-link text-warning border ms-1 rounded-3 border-2 border-warning" id=""
                     href="/users/dashboard"><i class="fas fa-user"></i> Profile</a>
                  @elseif(Session::has('frans'))
                  <a class="nav-link " id="login-btn" href="/franchise/signout"><i class="fas fa-sign-in-alt"></i>
                     Logout</a>
                  <a class="nav-link text-warning border ms-1 rounded-3 border-2 border-warning" id=""
                     href="/franchise/dashboard"><i class="fas fa-user"></i> Profile</a>
                  @else
                  <!-- <a class="nav-link" id="login-btn" href="/users/login"><i class="fas fa-sign-in-alt"></i> Login</a> -->

                  <div class="dropdown">
                     <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="login-btn"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-sign-in-alt"></i> Login
                     </a>

                     <ul class="dropdown-menu" aria-labelledby="login-btn">
                        <li><a class="dropdown-item" href="/users/login">User</a></li>
                        <li><a class="dropdown-item" href="/franchise">Franchise</a></li>
                        <li><a class="dropdown-item" href="/agents">Agent</a></li>
                     </ul>
                  </div>
                  @endif
               </li>
            </ul>

         </ul>
      </div>
   </div>

   <!-- phone hide menu  -->
   <div class="collapse navbar-collapse d-none d-lg-flex container" id="navbarSupportedContent">
      <ul
         class="navbar-nav mx-auto d-none p-0 d-lg-flex container-fluid justify-content-center mb-2 mb-lg-0 align-items-start align-items-md-center">
         <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               Incorporation
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               @foreach($service_menu as $data)
               @if($data->category == "incorporation")
               <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a></li>
               @endif
               @endforeach
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               Registration
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               @foreach($service_menu as $data)
               @if($data->category == "registration")
               <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a></li>
               @endif
               @endforeach
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               Tax/GST
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               @foreach($service_menu as $data)
               @if($data->category == "tax-gst")
               <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a></li>
               @endif
               @endforeach
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               Compliance
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               @foreach($service_menu as $data)
               @if($data->category == "compliance")
               <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a></li>
               @endif
               @endforeach
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               Others
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               @foreach($service_menu as $data)
               @if($data->category == "others")
               <li><a class="dropdown-item" href="/services/{{$data->slug}}">{{$data->name}}</a></li>
               @endif
               @endforeach
            </ul>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               Programs
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="https://www.startupassist.consolegal.com/" target="_blank">Startup Assist</a></li>
               <li><a class="dropdown-item" href="https://www.msmeignite.consolegal.com/images/home/logo.png" target="_blank">MSME Ignite</a></li>
            </ul>
         </li>

         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
               More
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="/about">About</a></li>
               <li><a class="dropdown-item" href="{{route('galleryEvents')}}">Gallery & Events</a></li>
               <li><a class="dropdown-item" href="/blogpage">Blogs</a></li>
               <li><a class="dropdown-item" href="/contact">Contact</a></li>
               <li><a class="dropdown-item" href="{{route('career')}}">Career</a></li>
               <li><a class="dropdown-item" href="{{route('partnerWithUs')}}">Partner With Us</a></li>
               <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#">Insurance <i class="fas fa-chevron-down text-small"></i></a>
                  <ul class="dropdown-menu toggle">
                     <li><a class="dropdown-item" href="/insurance/life">Life Insurance</a></li>
                     <li><a class="dropdown-item" href="/insurance/health">Health Insurance</a></li>
                     <li><a class="dropdown-item" href="/insurance/travel">Travel Insurance</a></li>
                     <li><a class="dropdown-item" href="/insurance/motor">Motor Insurance</a></li>
                  </ul>
               </li>
               <li class="dropdown-submenu">
                  <a class="dropdown-item dropdown-toggle" href="#">Loan <i class="fas fa-chevron-down text-small"></i></a>
                  <ul class="dropdown-menu toggle">
                     <li><a class="dropdown-item" href="/loan/personal">Personal Loan</a></li>
                     <li><a class="dropdown-item" href="/loan/business">Business Loan</a></li>
                     <li><a class="dropdown-item" href="/loan/home">Home Loan</a></li>
                     <li><a class="dropdown-item" href="/loan/car">Car Loan</a></li>
                  </ul>
               </li>
            </ul>
         </li>
      </ul>
   </div>
</nav>




<div class="side-strip-action">
   <a href="tel:{{config('app.phone')}}" target="_blank" class="sticky-phone-alt"><i class="fas fa-phone-alt"></i>
      <span>Call</span></a>
   <a href="{{config('app.whatsapp')}}" target="_blank" class="sticky-wp"><i
         class="fab fa-whatsapp"></i><span>Whatsapp</span></a>
</div>

<div class="side-strip-action left">
   <a href="https://www.startupassist.consolegal.com/" target="_blank" class="sticky-phone-alt"><i class="fas fa-star"></i>
      <span>Startup Assist</span></a>
   <a href="https://www.msmeignite.consolegal.com/" target="_blank" class="sticky-wp"><i
         class="fas fa-ribbon"></i><span>MSME Ignite</span></a>
</div>