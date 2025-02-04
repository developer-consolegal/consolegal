@extends('layouts.master')

@section("title","Permissions")

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
         <h2>Permission Management</h2>
         

         <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <form action="{{ route('admin.permissions.update', $admin->id) }}" method="POST">
                                @csrf
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <select name="roles[]" multiple class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->name }}" 
                                                @if($admin->hasRole($role->name)) selected @endif>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select name="permissions[]" multiple class="form-control">
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission->name }}" 
                                                @if($admin->hasPermissionTo($permission->name)) selected @endif>
                                                {{ $permission->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

      </div>
   </div>

</div>
<!--  END CONTENT AREA  -->

</div>

@endsection