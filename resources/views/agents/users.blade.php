@extends('layouts.master')

@section("title","Users")


@section("content")

<!--  BEGIN NAVBAR  -->
@include("adminheader")
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
   <header class="header navbar navbar-expand-sm">
      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg
            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-menu">
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
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("agentsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <div class="d-flex justify-content-between align-items-center">
            <h2>Users</h2>
         </div>


         <div class="tab-pane active text-style" id="tab3">

            <div class="mx-auto">
               <form action="{{route('agent.users')}}" method="get" class="w-100">
                  <div class="d-flex">
                     <input type="text" name="query" class="form-control mr-2" placeholder="Search by name, email" />
                     <button class="btn-sm btn-warning">Go</button>
                  </div>
               </form>
            </div>

            <table class="table table-striped custab">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th>Date & Time</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @if(isset($users) && count($users) > 0)
               @foreach($users as $data)
               <tr>
                  <td>
                     {{$data->id}}
                  </td>
                  <td>
                     {{$data->name}}
                  </td>
                  <td>
                     {{$data->email}}
                  </td>
                  <td>
                     {{$data->phone}}
                  </td>
                  <td>
                     {{$data->created_at}}
                  </td>

                  <td>
                     <a href="/agents/dashboard/{{$data->isUser?->id}}"><i class="fa fa-plus"></i></a>
                  </td>
               </tr>
               @endforeach
               @endif
            </table>
            {{$users->links()}}
         </div>
      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>


@endsection