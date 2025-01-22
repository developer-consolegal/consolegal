@extends('layouts.master')

@section("title","Seo")



@section('content')
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

<div class="main-container" id="container">

   @include("adminsidebar")
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <h2>Seo Settings</h2>
         <form action="{{route('admin.setting.set')}}" method="post">
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            
            <div class="form-group">
               <label>Meta Title<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="transport" value="" required="">
            </div>
            
            <div class="form-group">
               <label>Meta Description<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="host" value="" required="">
            </div>
            <div class="form-group">
               <label>Page<span class="text-danger">*</span></label>
               <select class="form-control" value="" required>
                   <option value="ssl">Home</option>
                   <option value="tls">About</option>
                   <option value="tls">Term & Condition</option>
                   <option value="tls">Privacy Policy</option>
                   <option value="tls">Blog</option>
                   <option value="tls">Personal Loan</option>
                   <option value="tls">Motor Loan</option>
                   <option value="tls">Home Loan</option>
                   <option value="tls">Business Loan</option>
                   <option value="tls">Life Insurance</option>
                   <option value="tls">Travel Insurance</option>
                   <option value="tls">Health Insurance</option>
                   <option value="tls">Car Insurance</option>
               </select>
            </div>

            <div class="form-group"><input type="submit" value="Save"></div>
         </form>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection