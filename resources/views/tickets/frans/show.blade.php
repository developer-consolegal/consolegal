@extends('layouts.frans')

@section("title","Tickets Detail")

@section('content')
          <!-- ACCOUNT DETAILS START -->
          <div class="tab-pane active text-style" id="tab1">
            <div class="container py-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                        <h5>🎫 {{ $ticket->subject }}</h5>
                        <span class="badge text-white p-2 bg-{{ $ticket->status == 'closed' ? 'danger' : ($ticket->status == 'pending' ? 'warning' : 'success') }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </div>
            
                    <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                        <!-- Messages -->
                        @foreach ($ticket->messages as $message)
                            <div class="d-flex {{ $message->sender_type == 'App\\Models\\User' ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                                <div class="p-3 rounded shadow-sm 
                                    {{ $message->sender_type == 'App\\Models\\User' ? 'bg-light text-white text-end' : 'bg-light' }}" 
                                    style="max-width: 70%;">
                                    <p class="mb-1 text-dark">{{ $message->message }}</p>
            
                                    @if ($message->attachment)
                                        <a href="{{ asset('storage/'.$message->attachment) }}" target="_blank">
                                            <img src="{{ asset('storage/'.$message->attachment) }}" class="img-thumbnail mt-2" style="max-width: 150px;">
                                        </a>
                                    @endif
            
                                    <small class="text-muted d-block mt-1">{{ $message->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
            
                    @if ($ticket->status != 'closed')
                        <div class="card-footer bg-light">
                            <!-- Reply Form -->
                            <form action="{{ route('franchise.messages.store', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <textarea name="message" class="form-control" placeholder="Type your reply..." rows="3" required></textarea>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="file" name="attachment" class="form-control form-control-sm" accept="image/*">
                                        <small class="text-muted">Max size: 2MB | JPEG, PNG, GIF</small>
                                    </div>
                                    <button type="submit" class="btn text-white bg-warning">📤 Send Reply</button>
                                </div>
                            </form>
            
                            <!-- Close Ticket Button -->
                            <form action="{{ route('franchise.tickets.close', $ticket->id) }}" method="POST" class="mt-2 text-end">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm text-white bg-danger">❌ Close Ticket</button>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-info text-center m-3">✅ This ticket has been closed.</div>
                    @endif
                </div>
            </div>
          </div>
@endsection