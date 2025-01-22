@extends('layouts.master')

@section("title","Welcome Banner")



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
         <h2>Welcome Banner</h2>
         @if(isset($data))
         <form action="{{route('admin.welcome_banner.set', ['id' => $data->id])}}" method="post">
            @else
         <form action="{{route('admin.welcome_banner.set')}}" method="post">
         @endif
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            
            <div class="form-group">
               <label>Banner<span class="text-danger">*</span></label>
               <input type="file" class="form-control" name="url" value="{{$data ? $data?->url : ''}}" required="">
               <img src="{{$data?->url ?? ''}}" style="width: 100px; height:100px; object-fit:contain;" />
            </div>
            
            <div class="form-group">
               <label>Active<span class="text-danger">*</span></label>
               <select class="form-control" name="active" required>
                   <option value="1" selected="{{$data?->active == 1 ? "selected" : ''}}">Active</option>
                   <option value="0" {{$data?->active == 0 ? "selected" : ''}}>Inactive</option>
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