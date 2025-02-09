@extends('layouts.master')

@section("title","Support Tickets")



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
         <h2>Support Tickets</h2>

   <form method="GET" class="row g-3 mt-4">
      <div class="col-8">
         <input type="text" class="form-control" placeholder="Search By Ticket ID" name="ticketId">
      </div>
      <div class="col-2">
         <select name="status" class="form-control">
            <option value="">All Statuses</option>
            <option value="open">Open</option>
            <option value="pending">Pending</option>
            <option value="closed">Closed</option> 
         </select>
      </div>
      <div class="col-auto">
         <button class="btn btn-warning" type="submit">Filter</button>
      </div>
   </form>


   <table class="table table-striped custab">
      <thead>
          <tr>
              <th>ID</th>
              <th>User</th>
              <th>Subject</th>
              <th>Status</th>
              <th>Timestamp</th>
              <th class="text-center">Action</th>
          </tr>
      </thead>
   @foreach ($tickets as $ticket)
   <tr>
      <td>{{$ticket->id}}</td>
      <td>{{$ticket->user->user_id }} <br> ({{ucfirst($ticket->user->name)}})</td>
      <td><a href="{{ route('admin.tickets.show', $ticket->id) }}">{{ ucfirst($ticket->subject) }}</a></td>
      <td>
      <span class="badge p-2 text-white bg-{{ $ticket->status == 'closed' ? 'danger' : ($ticket->status == 'pending' ? 'warning' : 'success') }}">
                        {{ ucfirst($ticket->status) }}
                    </span>
      </td>
      <td>{{$ticket->created_at}}</td>
      <td class="d-flex align-items-center justify-content-center">
         <a href="{{route('admin.tickets.show', $ticket->id)}}"><i class="fas fa-eye text-white border border-2 border-secondary bg-secondary rounded-circle p-1"></i></a>
     </td>
  </tr>
   @endforeach
</tbody>
</table>

   {{ $tickets->links() }}

   </div>
   </div>
</div>
<!--  END CONTENT AREA  -->
</div>
@endsection