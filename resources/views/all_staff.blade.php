@extends('layouts.master')

@section('title','All Staff')
@section('content')
<!--  BEGIN NAVBAR  -->
@include('adminheader')
<!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('adminsidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content wallet">

        <div class="user" id="navbarscroll">
            <h2>All Staff's</h2>

            
            <div class="row d-flex justify-content-between align-items-center mt-3">
                <div class="col-10">
                    <form class="d-flex justify-content-between align-items-center py-2" action="{{route("admin.staffs.index")}}">
                        <input class="form-control" value="{{request()->key??''}}" name="key" placeholder="search by id, name, email, phone"/>

                        <button type="submit" class="btn-sm btn-warning mx-4">Go</button>
                    </form>
                </div>
                <div class="col-2 text-right">
                    <a href="/admin/create" title="export to excel" class="btn btn-dark">Add Staff</a>
                </div>
            </div>
            <div class="form-group">
                <h4 class="text-success text-center">{{Session::get("success")}}</h4>
                <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Email Address</th>
                        <th>Phone No.</th>
                        <th>Created Date</th>
                        {{-- <th>Disabled</th> --}}
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($nos = 0)
                    @foreach ($users as $list)
                    @php($nos++)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td><a href="/admin/staff/profile/{{$list->id}}">{{$list->name}}</a></td>
                        <td>{{count($list->roles) && count($list->roles) > 0 ? $list->roles[0]->name : 'null' }}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->created_at}}</td>
                        <td class="text-center">
                            <a href="/admin/staff/profile/{{$list->id}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i> </a>

                            <form action="/admin/delete?id={{$list->id}}" method="post">
                                <button class="btn text-center" type="submit">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                        </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


<script>
    function deleteUser(id) {
        let sure = confirm('Are your sure, want to delete.');

        if (sure) {
            location.href = `/admin/delete/${id}`;
        }
    }
</script>








@endsection