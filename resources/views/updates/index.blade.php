@extends('layouts.master')

@section("title","Updates")



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
         <h2>Updates Control</h2>
         <form action="{{route('updates.store')}}" method="post">
            @csrf
            <div class="form-group">
               <h4 class="text-success text-center">{{Session::get("success")}}</h4>
               <h4 class="text-danger text-center">{{Session::get("error")}}</h4>
               @if(isset($message))
                <h4 class="text-danger text-center">{{$message}}</h4>
               @endif
            </div>
            
            <div class="form-group">
               <label>Label<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="title" required="">
            </div>
            
            <div class="form-group">
               <label>Link<span class="text-danger">*</span></label>
               <input type="text" class="form-control" name="link" required="">
            </div>

            <div class="form-group"><input type="submit" value="Save"></div>
         </form>

         <table class="table table-striped custab">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Label</th>
                    <th>Link</th>
                    <th>Timestamp</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php($nos = 0)
                @foreach ($updates as $list)
                @php($nos++)
                <tr>
                    <td>{{$list->id}}</td>
                    <td><a href="{{route('updates.edit', $list->id)}}">{{$list->title}}</a></td>
                    <td>{{$list->link}}</td>
                    <td>{{$list->created_at}}</td>
                    <td class="text-center d-flex align-items-center">
                        <a href="{{route('updates.edit', $list->id)}}">
                            <i class="fa fa-pencil" aria-hidden="true"></i> 
                        </a>
                        <form action="{{ route('updates.destroy', $list->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$updates->links()}}

      </div>




   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection