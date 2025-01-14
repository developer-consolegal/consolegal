@extends('layouts.master')

@section('title','Join App Wait List')
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
            <h2>App Waiting List</h2>
            <div class="row d-flex justify-content-between align-items-center">   
                <div class="col-10">
                </div>
                <div class="col-2 text-right">
                    <a href="{{route('join.export')}}" title="export to excel" class="btn btn-info"><i class="fas fa-file-excel"></i></a>
                </div>              
            </div>
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
            </div>
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th class="w-25 text-left">ID</th>
                        <th class="text-left">Phone</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php($nos = 0)
                    @foreach ($data as $list)
                    @php($nos++)
                    <tr>
                        <td class="text-left">{{$list->id}}</td>
                        <td class="text-left">{{$list->phone}}</td>
                        <td class="text-center">
                            {{$list->created_at}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->
@endsection