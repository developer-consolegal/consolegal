@extends('layouts.master')

@section("title","Roles")



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
         <h2 class="mb-4">Roles Management</h2>

         <div class="row">
            <div class="col-md-6">
                <h4>Roles</h4>
                <form action="{{ route('admin.roles.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="New Role" required>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('admin.roles.delete', $role->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="col-md-6">
                <h4>Permissions</h4>
                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="New Permission" required>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <form action="{{ route('admin.permissions.delete', $permission->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
        <hr>
    
        <h4>Assign Permissions to Roles</h4>
        <form action="{{ route('admin.roles.assign-permissions', $roles->first()->id ?? '') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <label>Select Role:</label>
                    <select name="role" class="form-control" id="role-select">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Select Permissions:</label>
                    <select name="permissions[]" class="form-control select2" multiple="multiple">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mt-4">
                    <button type="submit" class="btn btn-success">Assign</button>
                </div>
            </div>
        </form>
    </div>    

</div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
        // $('#role-select').select2();
        $('#role-select').change(function() {
            let roleId = $(this).val();
            $('form[action*="roles/"]').attr('action', "{{ url('admin/roles/') }}/" + roleId + "/assign-permissions");
        });
    });
</script>
@endpush