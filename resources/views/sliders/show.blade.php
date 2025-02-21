@extends('layouts.master')

@section("title","Edit Slider")



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
         <h2>Edit Slider</h2>
         <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
    
            <div class="form-group">
                <label>Current Image</label>
                <div>
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->alt_text }}" width="200">
                </div>
            </div>
    
            <div class="form-group">
                <label for="image">New Image (optional)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
    
            <div class="form-group">
               <label for="image">Label</label>
               <select name="label" id="label" class="form-control">
                 <option value="top" {{ $slider->label == 'top' ? 'selected' : '' }}>Top</option>
                 <option value="mid" {{ $slider->label == 'mid' ? 'selected' : '' }}>Mid</option>
             </select>
           </div>
    
            <div class="form-group">
                <label for="active">Active</label>
                <select name="active" id="active" class="form-control">
                    <option value="1" {{ $slider->active ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$slider->active ? 'selected' : '' }}>No</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-warning text-white">Update Slider</button>
        </form>

      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection