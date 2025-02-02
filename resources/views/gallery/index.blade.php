@extends('layouts.master')

@section("title","Gallery")



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
         <h2>Manage Gallery</h2>
         <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
               @if (isset($message))
                <h4 class="text-danger text-center">{{$message}}</h4>
               @endif
            </div>
            
            <div class="form-group">
                <label for="image">Gallery Image<span class="text-danger">* (302 × 200 px)</span></label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="meta">Alt Text</label>
                <input type="text" name="meta" id="meta" class="form-control" placeholder="Enter image alt text">
            </div>

            <div class="form-group"><input type="submit" value="Save"></div>
         </form>

         <div class="row">
            @php($nos = 0)
                @foreach ($images as $item)
                @php($nos++)
            <div class="col-md-4 col-12 border">
                <div>
                    <img src="{{asset('storage')}}/{{$item->image}}" style="width: 100%; height:250px; object-fit:cover;">
                </div>
                <p class="text-dark"><strong>Description:</strong> {{ $item->description ?? 'N/A' }}</p>
                <p class="text-dark"><strong>Alt Text:</strong> {{ $item->meta ?? 'N/A' }}</p>
                <div class="d-flex justify-content-end">
                    <a href="{{route('gallery.edit', $item->id)}}" class="btn text-primary"><img src="{{asset('web/image/icons-pencil.png')}}" style="width: 15px;"></a>
                    <form action="{{ route('gallery.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn text-danger"><img src="{{asset('web/image/icons-delete.png')}}" style="width: 15px;"></button>
                    </form>
                </div>
            </div>
            @endforeach 
         </div>
      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection