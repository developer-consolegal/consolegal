@extends('layouts.master')

@section("title","Team Members")



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
         <h2>Manage Team</h2>
         <form action="{{route('team.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
               @if (isset($message))
                <h4 class="text-danger text-center">{{$message}}</h4>
               @endif
            </div>
            
            <div class="form-group">
                <label for="profile_photo">Profile Photo<span class="text-danger">*</span></label>
                <input type="file" name="profile_photo" id="profile_photo" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>
    
            <div class="form-group">
                <label for="designation">Designation<span class="text-danger">*</span></label>
                <input type="text" name="designation" id="designation" class="form-control" value="{{ old('designation') }}" required>
            </div>
    
            <div class="form-group">
                <label for="is_expert">Is Expert</label>
                <input type="checkbox" name="is_expert" id="is_expert" value="1" {{ old('is_expert') ? 'checked' : '' }}>
            </div>
    
            <div class="form-group">
                <label for="description">Description<span class="text-danger">*</span></label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>

            <div class="form-group"><input type="submit" value="Save"></div>
         </form>

         <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Description</th>
                    <th>Timestamp</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($nos = 0)
                @foreach ($teamMembers as $member)
                @php($nos++)
                <tr>
                    <td><img src="{{ asset('storage/' . $member->profile_photo) }}" alt="{{ $member->name }}" width="100"></td>
                    <td><a href="{{route('team.edit', $member->id)}}" class="d-flex align-items-center">{{$member->name}} 
                            @if($member->is_expert)
                                <i class="fas fa-check text-white bg-success p-1 rounded-circle" title="expert"></i>
                            @endif
                    </a></td>
                    <td>{{$member->designation}}</td>
                    <td>{{$member->description}}</td>
                    <td>{{$member->created_at}}</td>
                    <td class="text-center d-flex align-items-center">
                        <a href="{{route('team.edit', $member->id)}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i> 
                        </a>
                        <form action="{{ route('team.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$teamMembers->links()}}

      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection