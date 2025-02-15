@extends('layouts.master')

@section("title","Tickets")

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
@endpush

@push('css')
    <style>
      .collapse {
    transition: height 0.4s ease;
}
    </style>
@endpush
@section("content")

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
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("agentsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>🎫 My Support Tickets</h3>
            <button class="btn btn-primary" aria-expanded="false" aria-controls="collapseExample" type="button" data-bs-toggle="collapse" data-bs-target="#createTicketForm">
                ➕ New Ticket
            </button>
        </div>
    
        <!-- Create Ticket Form -->
        <div id="createTicketForm" class="collapse mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('agent.tickets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea name="message" class="form-control" rows="4" required></textarea>
                        </div>
    
                        <div class="mb-3">
                            <label for="attachment" class="form-label">Attachment (optional)</label>
                            <input type="file" name="attachment" class="form-control" accept="image/*">
                            <small class="text-muted">Max size: 2MB | JPEG, PNG, GIF</small>
                        </div>
    
                        <button type="submit" class="btn btn-warning ms-auto">📤 Submit Ticket</button>
                    </form>
                </div>
            </div>
        </div>
    
        <!-- Ticket List -->
        <div class="card shadow-sm border-0">
            <div class="card-body">
                @if ($tickets->isEmpty())
                    <div class="alert alert-warning">You have no tickets yet. Create one above!</div>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ ucfirst($ticket->subject) }}</td>
                                    <td>
                                        <span class="badge text-white p-2 bg-{{ $ticket->status == 'closed' ? 'danger' : ($ticket->status == 'pending' ? 'warning' : 'success') }}">
                                            {{ ucfirst($ticket->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $ticket->created_at->format('d M, Y') }}</td>
                                    <td>
                                        <a href="{{ route('agent.tickets.show', $ticket->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
   </div>
</div>
<!--  END CONTENT AREA  -->
</div>
@endsection