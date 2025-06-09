@extends("layouts.web")

<x-seo page="{{ 'Delete Your Account – Consolegal' }}" />

@section('content')
<!-- content section  -->
<section class="content-section row mx-auto container-md px-0">
   <h1 class="title text-center py-4">Delete Your Account</h1>
   <div class="container-md col-md-12 mx-auto ">
<p>We're sorry to see you go. If you'd like to delete your account, you can follow the instructions below.</p>

    <h2>📱 From the App:</h2>
    <p>1. Open the Consolegal app on your device.</p>
    <p>2. Go to <strong>Settings</strong> &gt; <strong>Delete Account</strong>.</p>
    <p>3. Confirm your request. Your account will be deactivated immediately.</p>

    <h2>🗓️ Retention Period:</h2>
    <p>Your account and associated data will be permanently deleted after <strong>30 days</strong>. You can contact us within this period to cancel the request.</p>

    <h2>💾 Data That Will Be Deleted:</h2>
    <ul>
      <li>Personal Information (name, email, etc.)</li>
      <li>User-generated content</li>
      <li>Activity logs associated with your account</li>
    </ul>

    <h2>📧 Can't access the app?</h2>
    <p>You can request account deletion manually by emailing us at:</p>
    <div class="email">support@consolegal.com</div>    
</div>
</section>




@endsection