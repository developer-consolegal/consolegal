@extends('layouts.master')

@section("title","Manage Campaign")

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
        <h2>Manage Campaigns</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    
        <div class="text-right">
            <a href="{{ route('admin.campaigns.create') }}" class="btn btn-info mb-3">Add New Campaign</a>
        </div>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Page</th>
                    <th>Label</th>
                    <th>Meta Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($campaigns as $campaign)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="/campaign/{{$campaign->slug}}" target="_blank">{{ $campaign->name }}</a></td>
                        <td>{{ $campaign->slug }}</td>
                        <td>{{ $campaign->name }}</td>
                        <td>{{ $campaign->label }}</td>
                        <td>{{ $campaign->meta_title }}</td>
                        <td class="d-flex align-items-center">
                            <a href="{{ route('admin.campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
    
                            <form action="{{ route('admin.campaigns.destroy', $campaign->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this campaign?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No campaigns found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    
        <!-- Pagination -->
        {{ $campaigns->links() }}
      </div>

   </div>
</div>
<!--  END CONTENT AREA  -->

</div>

@endsection