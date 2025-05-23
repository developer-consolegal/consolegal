<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
   <header class="header navbar navbar-expand-sm">

      <ul class="navbar-item theme-brand flex-row  text-center">
         <li class="nav-item theme-logo">
            <a href="#">
               <img src="{{asset('web/image/logo.jpeg')}}" alt="admin logo">
            </a>
         </li>
         <!-- <li class="nav-item theme-text"> -->
         <!-- <a href="index.html" class="nav-link"> LOGO </a> -->
         <!-- </li> -->
      </ul>

      <!-- <ul class="navbar-item flex-row ml-md-0 ml-auto"> -->
      <!-- <li class="nav-item align-self-center search-animated"> -->
      <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> -->
      <!-- <form class="form-inline search-full form-inline search" role="search"> -->
      <!-- <div class="search-bar"> -->
      <!-- <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search..."> -->
      <!-- </div> -->
      <!-- </form> -->
      <!-- </li> -->
      <!-- </ul> -->

      <ul class="navbar-item flex-row ml-md-auto">

         <li class="nav-item dropdown language-dropdown">

            <!-- <div class="dropdown-menu position-absolute" aria-labelledby="language-dropdown">
               <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="assets/image/de.png" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;German</span></a>
               <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="assets/image/jp.png" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;Japanese</span></a>
               <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="assets/image/fr.png" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;French</span></a>
               <a class="dropdown-item d-flex" href="javascript:void(0);"><img src="assets/image/ca.png" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>
            </div> -->
         </li>

         <li class="nav-item message-dropdown">
            <a href="#" class="nav-link">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                  <polyline points="22,6 12,13 2,6"></polyline>
               </svg>
            </a>

         </li>



         <li class="nav-item dropdown user-profile-dropdown">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
               <img src="{{ asset('image/user.png')}}" alt="avatar">
            </a>
            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
               <div class="">
                  <div class="dropdown-item">
                     <a class="" href="/admin/signout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                           <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                           <polyline points="16 17 21 12 16 7"></polyline>
                           <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg> Sign Out</a>
                  </div>
               </div>
            </div>

         </li>

      </ul>
   </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
   <header class="header navbar navbar-expand-sm">
      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
         </svg></a>

      <ul class="navbar-nav flex-row">
         <li>
            <div class="page-header">

               <nav class="breadcrumb-one" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                     <!-- <li class="breadcrumb-item active" aria-current="page"><span>Sales</span></li> -->
                  </ol>
               </nav>

            </div>
         </li>
      </ul>
      <!-- <ul class="navbar-nav flex-row ml-auto "> -->
      <!-- <li class="nav-item more-dropdown"> -->
      <!-- <div class="dropdown  custom-dropdown-icon"> -->
      <!-- <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span>Settings</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></a> -->

      <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown"> -->
      <!-- <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a> -->
      <!-- <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a> -->
      <!-- <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a> -->
      <!-- <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a> -->
      <!-- <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a> -->
      <!-- </div> -->
      <!-- </div> -->
      <!-- </li> -->
      <!-- </ul> -->
   </header>
</div>
<!--  END NAVBAR  -->