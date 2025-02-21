@extends('layouts.master')
@section("title","App Banners")

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
         <h2>App Banners</h2>
         <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
    
            <div class="form-group">
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="screen">Select Label</label>
                <select name="label" id="screen" class="form-control" required>
                    <option value="home">Home</option>
                    <option value="services">Service</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="active">Active</label>
                <select name="active" id="active" class="form-control">
                    <option value="1" selected>Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-warning text-white">Add Banner</button>
        </form>
    

         <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Status</th>
                    <th>Timestamp</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($banners as $banner)
                <tr>
                   <td><img src="{{ asset('storage') }}/{{$banner->image}}" width="100"></td>
                   <td>{{ $banner->label}}</td>
                    <td>{{ $banner->active ? 'Active' : 'Inactive' }}</td>
                    <td>{{$banner->created_at}}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.banners.edit', $banner->id) }}">
                            <i class="fa fa-pencil" aria-hidden="true"></i> 
                        </a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                           @csrf
                           @method('DELETE')
                           <button type="submit" class="btn text-danger"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                       </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{$banners->links()}}

      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection