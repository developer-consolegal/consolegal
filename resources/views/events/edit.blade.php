@extends('layouts.master')

@section("title","Events")



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
         <h2>Manage Events</h2>
         <form action="{{route('events.update', $event->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
               @if (isset($message))
                <h4 class="text-danger text-center">{{$message}}</h4>
               @endif
            </div>
            
            <div class="form-group">
                <label for="image">Image<span class="text-danger">*</span></label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <img src="{{asset('storage')}}/{{$event->image}}" width="100px">
            </div>

            <div class="form-group">
               <label for="link">Event Link</label>
               <input type="url" name="link" id="link" value="{{$event->link}}" class="form-control" required>
           </div>
   
           <div class="form-group">
               <label for="event_date">Event Date</label>
               <input type="date" name="event_date" id="event_date" value="{{date('Y-m-d', strtotime($event->event_date))}}" class="form-control" required>
           </div>
   
           <div class="form-group">
               <label for="label">Label</label>
               <input type="text" name="label" id="label" value="{{$event->label}}" class="form-control" required>
           </div>
   
           <div class="form-group">
               <label for="description">Description</label>
               <textarea name="description" id="description" class="form-control" rows="4">{{$event->description}}</textarea>
           </div>

            <div class="form-group"><input type="submit" value="Save"></div>
         </form>
      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection