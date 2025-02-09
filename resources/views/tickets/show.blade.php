@extends('layouts.master')

@section("title","Ticket")



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
         <a href="{{route('admin.tickets.index')}}" class="btn btn-light mb-2">◀ Back</a>
         <h2>Ticket: {{ucfirst ($ticket->subject)}}</h2>

         <div class="container py-4">
            <div class="card shadow-sm border-0">
                <div class="card-header text-dark d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-dark">🎫 Ticket ID: #{{$ticket->id}}</h5>
                    <span class="badge p-2 bg-{{ $ticket->status == 'closed' ? 'danger text-white' : ($ticket->status == 'pending' ? 'warning' : 'success') }}">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </div>
        
                <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                    <!-- Messages Section -->
                    @foreach ($ticket->messages as $message)
                        <div class="d-flex {{ $message->sender_type == 'App\\Models\\admins' ? 'justify-content-end' : 'justify-content-start' }} mb-3">
                            <div class="p-3 rounded shadow-sm 
                                {{ $message->sender_type == 'App\\Models\\admins' ? 'bg-light text-end' : 'bg-white text-light' }}" 
                                style="max-width: 70%;">
                                <p class="mb-1">{{ $message->message }}</p>
        
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
                        <form action="{{ route('admin.tickets.reply', $ticket->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <textarea name="message" class="form-control" placeholder="Type your reply..." rows="3" required></textarea>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input type="file" name="attachment" class="form-control form-control-sm" accept="image/*">
                                    <small class="text-muted">Max size: 2MB | JPEG, PNG, GIF</small>
                                </div>
                                <button type="submit" class="btn btn-warning text-white">📤 Send Reply</button>
                            </div>
                        </form>
        
                        <!-- Close Ticket Button -->
                        <form action="{{ route('admin.tickets.close', $ticket->id) }}" method="POST" class="mt-2 text-end">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">❌ Close Ticket</button>
                        </form>
                    </div>
                @else
                    <div class="alert alert-info text-center m-3">✅ This ticket has been closed.</div>
                @endif
            </div>
        </div>
      </div>
   </div>
</div>
<!--  END CONTENT AREA  -->
</div>

@endsection