   
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
                   <li>
                      <a href="/admin/dashboard">All Leads</a>
                   </li>
                   <li>
                      <a href="{{route('admin.pendingLeads.index')}}">Pending Leads</a>
                   </li>
                   <li>
                      <a href="{{route('admin.completeLeads.index')}}">Completed Leads</a>
                   </li>
                   <li>
                      <a href="/leads">Add Leads </a>
                   </li>
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
                   <li>
                      <a href="/admin/services/forms/all"> View All Forms </a>
                   </li>
                   <li>
                      <a href="/admin/services/forms/add">Add Forms </a>
                   </li>
                   <li>
                      <a href="/admin/assigned">Assigned Forms </a>
                   </li>
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

                   <li>
                      <a href="/admin/orders">All Orders </a>
                   </li>

                   <li>
                      <a href="/admin/orders/add">Add order </a>
                   </li>
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
                   <li>
                      <a href="/admin/coupons">Manage Coupons</a>
                   </li>
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
                   <li>
                      <a href="/admin/services">Add Service/list </a>
                   </li>
                   <li>
                      <a href="/admin/service/manage">Manage service</a>
                   </li>
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
                   <li>
                      <a href="{{route('career.category')}}">Career Categories</a>
                   </li>
                   <li>
                      <a href="{{route('career.category.create')}}">Add Career Category</a>
                   </li>
                   <li>
                      <a href="{{route('career.index')}}">Careers</a>
                   </li>
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
                   <li>
                      <a href="/admin/users/all"> All User </a>
                   </li>
                   <li>
                      <a href="/admin/user/create"> Add User </a>
                   </li>
                   <li>
                      <a href="/admin/franchise/all"> All Franchise </a>
                   </li>
                   <li>
                      <a href="/admin/franchise/create"> Add Franchise </a>
                   </li>
                   <li>
                      <a href="/admin/agents/all"> All Agent </a>
                   </li>
                   <li>
                      <a href="/admin/agents/create"> Add Agent </a>
                   </li>
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
                   <li>
                      <a href="/blogs/add">Add Blog</a>
                   </li>
                   <li>
                      <a href="/blogs">View Blog</a>
                   </li>
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
                   <li>
                      <a href="{{route('team.index')}}">Manage Team</a>
                   </li>
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
                   <li>
                      <a href="{{route('gallery.index')}}">Gallery</a>
                   </li>
                   <li>
                      <a href="{{route('events.index')}}">Events</a>
                   </li>
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
                   <li>
                      <a href="{{route('news.index')}}">News</a>
                   </li>
                   <li>
                      <a href="{{route('updates.index')}}">Updates</a>
                   </li>
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
                   <li>
                      <a href="{{route('admin.tickets.index')}}">Tickets</a>
                   </li>
                   <li>
                      <a href="{{route('admin.contacts.index')}}">Contact Forms</a>
                   </li>
                   <li>
                      <a href="{{route('admin.campaign_inquiry.index')}}">Campaign Enquiry</a>
                   </li>
                   <li>
                      <a href="{{route('join')}}">App Waiting List</a>
                   </li>
                   <li>
                      <a href="{{route('admin.emails.index')}}">Subscribed Emails</a>
                   </li>
                </ul>
             </li>
             @endif
             {{-- Support --}}
             {{-- @if(auth('admin')->user()->can('support')) --}}
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
                   <li>
                      <a href="{{route('admin.campaigns.index')}}">Manage Campaigns</a>
                   </li>
                </ul>
             </li>
             {{-- @endif --}}

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
                   <li>
                      <a href="{{route('admin.staffs.index')}}">Staff</a>
                   </li>
                   <li>
                      <a href="{{route('admin.roles-permissions.index')}}">Roles & Permissions</a>
                   </li>
                   <li>
                      <a href="{{route('admin.assign-role.index')}}">Assign Roles</a>
                   </li>
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
                   <li>
                      <a href="{{route('admin.setting.index')}}">Mail</a>
                   </li>
                   <li>
                      <a href="{{route('seo.index')}}">Seo</a>
                   </li>
                   <li>
                      <a href="{{route('admin.marquee.index')}}">Marquee</a>
                   </li>
                   <li>
                      <a href="{{route('welcome_banner.index')}}">Welcome Banner</a>
                   </li>

                   @if(auth('admin')->user()->can('setting'))
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
                   <li>
                      <a href="{{route('admin.setting.index')}}">Slider</a>
                   </li>
                   <li>
                      <a href="{{route('seo.index')}}">Banners</a>
                   </li>
                </ul>
             </li>
             @endif

          </ul>

       </nav>

    </div>
    <!--  END SIDEBAR  -->