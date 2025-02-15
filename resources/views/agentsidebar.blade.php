   
    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">
      <nav id="sidebar">
         <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
            <li class="menu">
               <a href="#leads" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <div class="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                     </svg>
                     <span>Lead Managers</span>
                  </div>
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-right">
                        <polyline points="9 18 15 12 9 6"></polyline>
                     </svg>
                  </div>
               </a>
               <ul class="collapse submenu list-unstyled" id="leads" data-parent="#accordionExample">
                  <li>
                     <a href="{{route('agent.users')}}">All Users</a>
                  </li>
                  <li>
                     <a href="{{route('agent.leads')}}">All Leads</a>
                  </li>
                  <li>
                     <a href="{{route('agent.dashboard')}}">Add Leads </a>
                  </li>
               </ul>
            </li>
            <li class="menu">
               <a href="#account" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <div class="">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-users">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                     </svg>
                     <span>Account</span>
                  </div>
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="user">
                        <polyline points="9 18 15 12 9 6"></polyline>
                     </svg>
                  </div>
               </a>
               <ul class="collapse submenu list-unstyled" id="account" data-parent="#accordionExample">
                  <li>
                     <a href="{{route('agent.account')}}">Profile</a>
                  </li>
               </ul>
            </li>
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
                     <a href="{{route('agent.tickets.index')}}">Tickets</a>
                  </li>
               </ul>
            </li>
         </ul>

      </nav>
   </div>
    <!--  END SIDEBAR  -->