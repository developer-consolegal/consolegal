@extends('layouts.master')

@section("title","Profile")


@section("content")

<!--  BEGIN NAVBAR  -->
@include("adminheader")
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
   </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   <div class="sidebar-wrapper sidebar-theme">

      <nav id="sidebar">
         <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">
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
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                         <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                         <circle cx="9" cy="7" r="4"></circle>
                         <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                         <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                      </svg>
                     <span>Account</span>
                  </div>
                  <div>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="user">
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

         </ul>
      </nav>

   </div>
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <h2 class="text-danger text-center">{{Session::get('error')}}</h2>
         <h2 class="text-success text-center">{{Session::get('success')}}</h2>
         <form class="login-form" id="profile-form" action="/agents/updateAccount" method="post">
                     @csrf
                     <div class="row rightcol">
                        <!-- name -->
                        <div class="col-md-12">
                           <h3 class="rtext">Personal Information</h3>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group position-relative">
                              <label>Name<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" placeholder="FullName" name="name" required="" value="{{ $data?->name}}">
                           </div>
                        </div>
                        <!-- email -->
                        <div class="col-md-12">
                           <div class="form-group position-relative">
                              <label>Email Address<span class="text-danger">*</span></label>
                              <input type="email" class="form-control" placeholder="EmailAddress" value="{{ $data?->email}}" name="email" required="">
                           </div>
                        </div>




                        <!-- mobile -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Mobile Number<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" placeholder="Phone" value="{{ $data?->phone}}" name="phone" required="">
                           </div>
                        </div>
                        <!-- company -->
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Company Name<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" placeholder="Company Name" value="{{ $data?->company}}" name="company_name" required="">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>GSTIN<span class="text-secondary">(optional)</span></label>
                              <input type="text" class="form-control" placeholder="GSTIN" value="{{ $data?->gst}}" name="gst" >
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <label>Change Password <span class="text-danger">*</span></label>
                              <input type="password" name="password" class="form-control" placeholder="Change Password">
                           </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                              <a type="submit" class="btn btn-info btn-xs" id="update-btn">
                                 <button type="submit" class="btn btn-sm text-white">Update</button>
                              </a>
                              <!-- <button onclick="document.getElementById('id01').style.display='block'" class="" style="width:auto;">Forgot Password</button> -->
                           </div>

                        </div>
                     </div>
                  </form>

      </div>
   </div>




</div>
<!--  END CONTENT AREA  -->

</div>


@endsection