@extends('layouts.master')

@section("title","add career category")


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
         <h2>Add Career Category</h2>
         <form action="{{route('career.category.store')}}" method="post">
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            <div class="form-group">
               <label>Name<span class="text-danger">*</span></label>
               <input type="text" class="form-control" placeholder="Client Name" name="category_name" required>
            </div>

            <div class="form-group">
               <label for="job_type">Job Type<span class="text-danger">*</span></label>
               <select name="job_type" class="form-control" id="job_type" required>
                  <option value="full time">Full Time</option>
                  <option value="part time">Part Time</option>
                  <option value="internship">Internship</option>
               </select>
            </div>
            <div class="form-group">
               <label>Location <span class="text-danger">*</span></label>
               <input type="text" class="form-control" placeholder="Available Location" name="location" required>
            </div>

            <div class="form-group">
               <label>Content <span class="text-danger">*</span></label>
               <textarea id="summernote" name="content" rows="6" cols="70" placeholder="Description..."></textarea>
            </div>

            <div class="form-group"><input type="submit" value="Create"></div>
         </form>


      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

<script>
   $('#summernote').summernote({
      placeholder: 'Type here',
      tabsize: 2,
      height: 120,
      toolbar: [
         ['style', ['style']],
         ['font', ['bold', 'underline', 'clear']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['table', ['table']],
         ['insert', ['link', 'picture', 'video']],
         ['view', ['fullscreen', 'codeview', 'help']]
      ]
   });
</script>
@endsection