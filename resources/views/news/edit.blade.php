@extends('layouts.master')

@section("title","News")



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
         <h2>News Update</h2>
         <form action="{{ route('news.update', $news->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
               @if(isset($message))
                <h4 class="text-danger text-center">{{$message}}</h4>
               @endif
            </div>
            
            <div class="form-group">
               <label>Label<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="title" value="{{$news->title}}" required="">
            </div>
            
            <div class="form-group">
               <label>Description<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="description" value="{{$news->description}}" required="">
            </div>

            <div class="form-group"><input type="submit" value="Update"></div>
         </form>

      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection