@extends('layouts.user')

@section("title","Tickets")

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
@endpush

@push('css')
    <style>
      .collapse {
    transition: height 0.4s ease;
}
    </style>
@endpush
@section('content')
          <!-- ACCOUNT DETAILS START -->
          <div class="tab-pane active text-style" id="tab1">
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
                           <form action="{{ route('user.tickets.store') }}" method="POST" enctype="multipart/form-data">
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
                                               <a href="{{ route('user.tickets.show', $ticket->id) }}" class="btn btn-sm btn-outline-primary">View</a>
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
@endsection
