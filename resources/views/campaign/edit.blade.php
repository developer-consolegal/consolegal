@extends('layouts.master')

@section("title","Edit Campaign")

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
    <h2>Edit Campaign</h2>

    <form action="{{ route('admin.campaigns.update', $campaign->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campaign Name -->
        <div class="mb-3">
            <label for="name">Campaign Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $campaign->name) }}" required>
        </div>

        <!-- Label -->
        <div class="mb-3">
            <label for="label">Label</label>
            <input type="text" name="label" class="form-control" value="{{ old('label', $campaign->label) }}">
        </div>

        <!-- Sub Paragraph -->
        <div class="mb-3">
            <label for="sub_paragraph">Sub Paragraph</label>
            <textarea name="sub_paragraph" class="form-control">{{ old('sub_paragraph', $campaign->sub_paragraph) }}</textarea>
        </div>

        <!-- Learn More Button Link -->
        <div class="mb-3">
            <label for="learn_more_link">Learn More Button Link</label>
            <input type="url" name="learn_more_link" class="form-control" value="{{ old('learn_more_link', $campaign->learn_more_link) }}">
        </div>

        <!-- Slug -->
        <div class="mb-3">
            <label for="slug">Campaign Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $campaign->slug) }}" required>
        </div>

        <div class="mb-3">
            <label for="state">State</label>
            <input type="text" id="state" name="state" value="{{ old('state', $campaign->state) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="city">City</label>
            <input type="text" id="city" name="city" value="{{ old('city', $campaign->city) }}" class="form-control" required>
        </div>

        <!-- Meta Title & Description -->
        <div class="mb-3">
            <label>Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $campaign->meta_title) }}">
        </div>

        <div class="mb-3">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control">{{ old('meta_description', $campaign->meta_description) }}</textarea>
        </div>

        <!-- FAQs -->
        <h4>FAQs</h4>
        <div id="faqFields">
            @foreach (json_decode($campaign->faqs, true) ?? [] as $index => $faq)
                <div class="faq-group input-group mb-2">
                    <input type="text" name="faqs[{{ $index }}][question]" class="form-control" placeholder="Question" value="{{ $faq['question'] }}">
                    <input type="text" name="faqs[{{ $index }}][answer]" class="form-control" placeholder="Answer" value="{{ $faq['answer'] }}">
                    <button type="button" class="btn btn-danger remove-faq">❌</button>
                </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-secondary" id="addFaq">➕ Add FAQ</button>

        <!-- Campaign Stats -->
        <h4>Campaign Stats</h4>
        <div class="mb-3">
            <label>Happy Customers</label>
            <input type="number" name="happy_customers" class="form-control" value="{{ old('happy_customers', $campaign->happy_customers) }}">
        </div>
        <div class="mb-3">
            <label>Projects Completed</label>
            <input type="number" name="projects_completed" class="form-control" value="{{ old('projects_completed', $campaign->projects_completed) }}">
        </div>
        <div class="mb-3">
            <label>Years of Experience</label>
            <input type="number" name="years_of_experience" class="form-control" value="{{ old('years_of_experience', $campaign->years_of_experience) }}">
        </div>
        <div class="mb-3">
            <label>Team Members Count</label>
            <input type="number" name="team_members_count" class="form-control" value="{{ old('team_members_count', $campaign->team_members_count) }}">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">💾 Update Campaign</button>
    </form>
</div>

    </div>
<!--  END CONTENT AREA  -->
</div>
@endsection

@push('scripts')
<script>
    let faqIndex = 1;
    document.getElementById('addFaq').addEventListener('click', function () {
        const faqFields = document.getElementById('faqFields');
        const field = document.createElement('div');
        field.classList.add('faq-group', 'input-group', 'mb-2');
        field.innerHTML = `
            <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Question">
            <input type="text" name="faqs[${faqIndex}][answer]" class="form-control" placeholder="Answer">
            <button type="button" class="btn btn-danger remove-faq">❌</button>
        `;
        faqFields.appendChild(field);
        faqIndex++;
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-faq')) {
            e.target.parentElement.remove();
        }
    });

    // Add/Remove Analytics Tiles
    document.getElementById('addAnalytics').addEventListener('click', function () {
        const analyticsFields = document.getElementById('analyticsFields');
        const field = document.createElement('div');
        field.classList.add('input-group', 'mb-2');
        field.innerHTML = `
            <input type="text" name="analytics[][title]" class="form-control" placeholder="Tile Title">
            <input type="text" name="analytics[][description]" class="form-control" placeholder="Tile Description">
            <button type="button" class="btn btn-danger remove-analytics">❌</button>
        `;
        analyticsFields.appendChild(field);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-analytics')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endpush