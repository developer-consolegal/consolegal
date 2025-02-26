   
    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

       <nav id="sidebar">
          <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">

             <li class="menu">
                <a href="/admin/welcome" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                      <span>Dashboard</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
             </li>

             {{-- Lead Manager  --}}
             @if(auth('admin')->user()->can('lead'))
             <li class="menu">
                <a href="#leads" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                         <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                         <polyline points="9 22 9 12 15 12 15 22"></polyline>
                      </svg>
                      <span>Lead Manager</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="leads" data-parent="#accordionExample">
                  @if(auth('admin')->user()->can('view_lead')) 
                  <li>
                      <a href="/admin/dashboard">All Leads</a>
                   </li>                   
                   <li>
                      <a href="{{route('admin.pendingLeads.index')}}">Pending Leads</a>
                   </li>
                   <li>
                      <a href="{{route('admin.completeLeads.index')}}">Completed Leads</a>
                   </li>
                   @endif

                   @if(auth('admin')->user()->can('add_lead'))
                   <li>
                      <a href="/leads">Add Leads </a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif


             {{-- Forms Manager  --}}
             @if(auth('admin')->user()->can('forms'))
             <li class="menu">
                <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                      <span>Forms Creation</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                   
                  @if(auth('admin')->user()->can('view_forms'))
                  <li>
                      <a href="/admin/services/forms/all"> View All Forms </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('add_forms'))
                   <li>
                      <a href="/admin/services/forms/add">Add Forms </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('assigned_forms') && auth('admin')->user()->can('view_assigned_forms'))
                   <li>
                      <a href="/admin/assigned">Assigned Forms </a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif


             {{-- Orders Manager  --}}
             @if(auth('admin')->user()->can('order'))
             <li class="menu">
                <a href="#elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart">
                         <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                         <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                      </svg>
                      <span>Orders</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="elements" data-parent="#accordionExample">
                  @if(auth('admin')->user()->can('view_order'))
                   <li>
                      <a href="/admin/orders">All Orders </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('add_order'))
                   <li>
                      <a href="/admin/orders/add">Add order </a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif
            
             {{-- Coupons  --}}
             @if(auth('admin')->user()->can('coupon'))
             <li class="menu">
                <a href="#coupon" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart">
                         <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                         <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                      </svg>
                      <span>Coupons</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="coupon" data-parent="#accordionExample">
                  @if(auth('admin')->user()->can('view_coupon')) 
                  <li>
                      <a href="/admin/coupons">Manage Coupons</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif


             {{-- Services  --}}
             @if(auth('admin')->user()->can('services'))
             <li class="menu">
                <a href="#services" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                      <span>Services</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="services" data-parent="#accordionExample">
                  @if(auth('admin')->user()->can('add_services')) 
                  <li>
                      <a href="/admin/services">Add Service/list </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_services')) 
                   <li>
                      <a href="/admin/service/manage">Manage service</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif
             
             {{-- Career  --}}
             @if(auth('admin')->user()->can('career'))
             <li class="menu">
                <a href="#career" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                      <span>Careers</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="career" data-parent="#accordionExample">
                  @if(auth('admin')->user()->can('category_career'))  
                  <li>
                      <a href="{{route('career.category')}}">Career Categories</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('add_career'))  
                   <li>
                      <a href="{{route('career.category.create')}}">Add Career Category</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_career'))  
                   <li>
                      <a href="{{route('career.index')}}">Careers</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif

             {{-- cashback --}}
             @if(auth('admin')->user()->can('cashback'))
             <li class="menu">
                <a href="#refer" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                      <span>Manage Cashbacks</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="refer" data-parent="#accordionExample">
                   <li>
                      <a href="{{route('refer')}}">Refer points</a>
                   </li>
                </ul>
             </li>
             @endif

             {{-- User --}}
             @if(auth('admin')->user()->can('user'))
             <li class="menu">
                <a href="#authentication" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                      <span>User</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="authentication" data-parent="#accordionExample">
                  @if(auth('admin')->user()->can('view_users'))   
                  <li>
                      <a href="/admin/users/all"> All User </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('add_users'))  
                   <li>
                      <a href="/admin/user/create"> Add User </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_franchise'))  
                   <li>
                      <a href="/admin/franchise/all"> All Franchise </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('add_franchise'))  
                   <li>
                      <a href="/admin/franchise/create"> Add Franchise </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_agent'))  
                   <li>
                      <a href="/admin/agents/all"> All Agent </a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('add_agent'))  
                   <li>
                      <a href="/admin/agents/create"> Add Agent </a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif

             {{-- Wallet --}}
             @if(auth('admin')->user()->can('wallet'))
             <li class="menu">
                <a href="#starter-kit" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard">
                         <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                         <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                      </svg>
                      <span>Wallet</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="starter-kit" data-parent="#accordionExample" style="">
                   <li>
                      <a href="/admin/wallet"> Wallet </a>
                   </li>
                </ul>
             </li>
             @endif

             {{-- Blog --}}
             @if(auth('admin')->user()->can('blog'))
             <li class="menu">
                <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Blog</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="pages" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('add_blog')) 
                  <li>
                      <a href="/blogs/add">Add Blog</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_blog'))
                   <li>
                      <a href="/blogs">View Blog</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif
            
             {{-- Team --}}
             @if(auth('admin')->user()->can('team'))
             <li class="menu">
                <a href="#team" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Team & Experts</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="team" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_team')) 
                  <li>
                      <a href="{{route('team.index')}}">Manage Team</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif
             
             {{-- Gallery --}}
             @if(auth('admin')->user()->can('gallery'))
             <li class="menu">
                <a href="#gallery" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Gallery & Events</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="gallery" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_gallery')) 
                  <li>
                      <a href="{{route('gallery.index')}}">Gallery</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_event'))
                   <li>
                      <a href="{{route('events.index')}}">Events</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif

             {{-- News --}}
             @if(auth('admin')->user()->can('news'))
             <li class="menu">
                <a href="#news-updates" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>News & Updates</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="news-updates" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_news')) 
                  <li>
                      <a href="{{route('news.index')}}">News</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_updates'))
                   <li>
                      <a href="{{route('updates.index')}}">Updates</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif
            
             {{-- Support --}}
             @if(auth('admin')->user()->can('support'))
             <li class="menu">
                <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Support</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="support" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_tickets')) 
                  <li>
                      <a href="{{route('admin.tickets.index')}}">Tickets</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('contact')) 
                   <li>
                      <a href="{{route('admin.contacts.index')}}">Contact Forms</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_campaign_inquiry')) 
                   <li>
                      <a href="{{route('admin.campaign_inquiry.index')}}">Campaign Inquiry</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_partner_inquiry')) 
                   <li>
                      <a href="{{route('admin.partner_inquiry.index')}}">Partner Inquiry</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_app_joinlist')) 
                   <li>
                      <a href="{{route('join')}}">App Waiting List</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_emails_subscribed')) 
                   <li>
                      <a href="{{route('admin.emails.index')}}">Subscribed Emails</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif
             {{-- Support --}}
             @if(auth('admin')->user()->can('campaign'))
             <li class="menu">
                <a href="#Campaigns" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Campaigns</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="Campaigns" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_campaign'))  
                  <li>
                      <a href="{{route('admin.campaigns.index')}}">Manage Campaigns</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif

             {{-- Staff --}}
             @if(auth('admin')->user()->can('staff'))
             <li class="menu">
                <a href="#permission" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Staff & Permission</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="permission" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_staff'))  
                  <li>
                      <a href="{{route('admin.staffs.index')}}">Staff</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_roles'))
                   <li>
                      <a href="{{route('admin.roles-permissions.index')}}">Roles & Permissions</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('assign_roles'))
                   <li>
                      <a href="{{route('admin.assign-role.index')}}">Assign Roles</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif

             {{-- Setting --}}
             @if(auth('admin')->user()->can('setting'))
             <li class="menu">
                <a href="#setting" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Setting</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="setting" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('setting_mail')) 
                  <li>
                      <a href="{{route('admin.setting.index')}}">Mail</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('setting_seo'))
                   <li>
                      <a href="{{route('seo.index')}}">Seo</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('setting_marquee'))
                   <li>
                      <a href="{{route('admin.marquee.index')}}">Marquee</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('setting_welcome_banner'))
                   <li>
                      <a href="{{route('welcome_banner.index')}}">Welcome Banner</a>
                   </li>
                   @endif

                   @if(auth('admin')->user()->can('setting_password'))
                   <li>
                     <a href="{{route('admin.staffs.index')}}">Change Password</a>
                  </li>
                   @endif
                </ul>
             </li>
             @endif

             @if(auth('admin')->user()->can('reports'))
             <li class="menu">
                <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>Reports</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="reports" data-parent="#accordionExample" style="">
                   <li>
                      <a href="{{route('admin.reports.index')}}">Overview</a>
                   </li>
                </ul>
             </li>
             @endif
             
             {{-- App Control --}}
             @if(auth('admin')->user()->can('app'))
             <li class="menu">
                <a href="#appcontrol" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                   <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                         <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                         <polyline points="13 2 13 9 20 9"></polyline>
                      </svg>
                      <span>App Control</span>
                   </div>
                   <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                         <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                   </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="appcontrol" data-parent="#accordionExample" style="">
                  @if(auth('admin')->user()->can('view_app_slider')) 
                  <li>
                      <a href="{{route('admin.sliders.index')}}">Slider</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_app_banner'))
                   <li>
                      <a href="{{route('admin.banners.index')}}">Banners</a>
                   </li>
                   @endif
                   @if(auth('admin')->user()->can('view_app_services'))
                   <li>
                      <a href="{{route('services.manage')}}">App Services</a>
                   </li>
                   @endif
                </ul>
             </li>
             @endif

          </ul>

       </nav>

    </div>
    <!--  END SIDEBAR  -->