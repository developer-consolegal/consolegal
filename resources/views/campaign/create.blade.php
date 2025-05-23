@extends('layouts.master')

@section("title","Create Campaign")

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
    <h2>Create Campaign</h2>

    <form action="{{ route('admin.campaigns.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name">Campaign Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="label">Label</label>
            <input type="text" name="label" class="form-control">
        </div>

        <div class="mb-3">
            <label for="sub_paragraph">Sub Paragraph</label>
            <textarea name="sub_paragraph" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="learn_more_link">Learn More Link</label>
            <input type="url" name="learn_more_link" class="form-control">
        </div>

        <div class="mb-3">
            <label for="slug">Campaign Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="state">State</label>
            <input type="text" id="state" name="state" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="city">City</label>
            <input type="text" id="city" name="city" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="meta_title">Meta Title</label>
            <input type="text" name="meta_title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="meta_description">Meta Description</label>
            <textarea name="meta_description" class="form-control"></textarea>
        </div>

        <!-- FAQs Section -->
        <h4>FAQs</h4>
        <div id="faqFields">
            <div class="faq-group input-group mb-2">
                <input type="text" name="faqs[0][question]" class="form-control" placeholder="Question">
                <input type="text" name="faqs[0][answer]" class="form-control" placeholder="Answer">
                <button type="button" class="btn btn-danger remove-faq">❌</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" id="addFaq">➕ Add FAQ</button>

        <!-- Result & Analytics -->
        <br>
        <br>

        <h4>Campaign Stats</h4>
<div class="mb-3">
    <label>Happy Customers</label>
    <input type="number" name="happy_customers" class="form-control" value="{{ old('happy_customers', $campaign->happy_customers ?? '') }}">
</div>
<div class="mb-3">
    <label>Projects Completed</label>
    <input type="number" name="projects_completed" class="form-control" value="{{ old('projects_completed', $campaign->projects_completed ?? '') }}">
</div>
<div class="mb-3">
    <label>Years of Experience</label>
    <input type="number" name="years_of_experience" class="form-control" value="{{ old('years_of_experience', $campaign->years_of_experience ?? '') }}">
</div>
<div class="mb-3">
    <label>Team Members Count</label>
    <input type="number" name="team_members_count" class="form-control" value="{{ old('team_members_count', $campaign->team_members_count ?? '') }}">
</div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary mt-3">Save Campaign</button>
        </div>
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