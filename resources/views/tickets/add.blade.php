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
         <h2>Create Ticket</h2>
         <div class="form-group">
            <h4 class="text-success text-center">{{Session::get("success")}}</h4>
            <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            @if (isset($message))
             <h4 class="text-danger text-center">{{$message}}</h4>
            @endif
         </div>
         <form action="{{ route('admin.tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">User ID <small class="text-secondary">(UM-CL-***)</small></label>
                <input type="text" name="user_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment (optional)</label>
                <input type="file" name="attachment" class="form-control" accept="image/*">
                <small class="text-muted">Max size: 2MB | JPEG, PNG, GIF</small>
            </div>

            <button type="submit" class="btn btn-warning ms-auto">📤 Submit Ticket</button>
        </form>
      </div>
   </div>
</div>
<!--  END CONTENT AREA  -->

</div>

@endsection