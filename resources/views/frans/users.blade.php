@extends('layouts.frans')

@section("title","Dashboard Franchise")


@section('content')
<!--wallet start -->
<div class="tab-pane active text-style" id="tab3">

   <div class="d-flex justify-content-end align-items-center mb-3">
      <a href="{{route('franchise.dashboard.leads.create')}}" class="btn btn-primary">Add Lead <i class="fas fa-plus text-white"></i></a>
   </div>

   <div class="d-flex justify-content-between align-items-center">
      <h2>Users</h2>
   </div>
   
   <div class="mx-auto">
        <form action="{{route('franchise.dashboard.users')}}" method="get" class="w-100">
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
            <a href="/franchise/leads/create/{{$data->isUser?->id}}"><i class="fa fa-add"></i></a>
         </td>
      </tr>
      @endforeach
      @endif
   </table>
   {{$users->links()}}
</div>
<!--wallet end -->

@endsection