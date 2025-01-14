@extends('layouts.master')

@section("title","refer points")


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
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("adminsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
          <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
         <form action="{{route('refer.store')}}" method="post">
         <h2>Referee Points</h2>
            @csrf
            <input type="hidden" name="id" value="{{$refer->id??''}}">
            <div class="form-group mb-0">
               <label>Amount<span class="text-danger">*</span></label>
               <div class="d-flex justify-content-start align-items-center">
               
               <input type="text" class="form-control" value="{{$refer->amount??''}}" placeholder="Points" name="amount" required>
               
                 <input type="submit" class="mt-0 mx-4" value="Save">
               </div>
            </div>
         </form>
         
         
         <br/>
         
         <form action="{{route('refer.store')}}" method="post">
          <h2>Referred Points</h2>
            @csrf
            <input type="hidden" name="id" value="{{$referred->id??''}}">
            <div class="form-group  mb-0">
               <label>Amount<span class="text-danger">*</span></label>
               
               <div class="d-flex justify-content-start align-items-center">
               <input type="text" class="form-control" value="{{$referred->amount??''}}" placeholder="Points" name="amount" required>
                 <input type="submit" class="mt-0 mx-4" value="Save">
               </div>
            </div>

         </form>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection