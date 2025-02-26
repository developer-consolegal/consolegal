@extends('layouts.master')

@section("title","Manage Services")



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
         <h2>Manage Trending Services</h2>

         @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

         <form method="POST" action="{{ route('services.updateStatus') }}" class="px-2 py-3 border mt-5">
            @csrf
            <div class="row">
                <div class="col-md-5">
                    <select name="service_id" class="form-control" required>
                        <option value="">Select Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="trending">Trending</option>
                        <option value="featured">Featured</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="action" value="add" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>

         
         <div class="row mt-5">
            <!-- Trending Services -->
            <div class="col-md-6">
                <h4>Trending Services</h4>
                <ul class="list-group">
                    @foreach($trendingServices as $service)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $service->name }}
                            <form method="POST" action="{{ route('services.updateStatus') }}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <input type="hidden" name="type" value="trending">
                                <input type="hidden" name="action" value="remove">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
    
            <!-- Featured Services -->
            <div class="col-md-6">
                <h4>Featured Services</h4>
                <ul class="list-group">
                    @foreach($featuredServices as $service)
                        <li class="list-group-item d-flex justify-content-between">
                            {{ $service->name }}
                            <form method="POST" action="{{ route('services.updateStatus') }}">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <input type="hidden" name="type" value="featured">
                                <input type="hidden" name="action" value="remove">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    
    
        <!-- Dropdown to Add Services -->
        {{-- <h4>Add Service to Trending or Featured</h4> --}}
        
      </div>
   </div>
</div>
<!--  END CONTENT AREA  -->

</div>

@endsection