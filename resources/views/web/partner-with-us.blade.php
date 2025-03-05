@extends("layouts.web")


@section('title',"Partner With Us - Consolegal")
@section('description',"Partner With Us - Consolegal")

@section('content')


@push('css')

<style>
   .social-icons {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
   }

   .social-icons .icons {
      font-size: 20px;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
   }
</style>

@endpush

<!---------- header  ---------->
<section class="mb-5" id="header1">
   <div class="div row container main-row mx-auto">
      <div class="col-12 col-md-6 lt justify-content-start pt-5">
         <h3 class="title mt-5">Partner with us Empower Your Business with ConsoLegal</h3>
         <p class="para">
            ConsoLegal's Partner Program is designed to collaborate with like-minded organizations, experts, and service providers to deliver exceptional value to our clients. By joining forces, we aim to create a robust ecosystem that supports businesses, entrepreneurs, and MSMEs in achieving their goals.
         </p>
         <div class="d-flex justify-content-start align-items-center gap-3">
               <a href="{{route('about')}}" class="btn an-btn secondary">Learn More</a>
               <a href="https://calendly.com/consolegal-desk/schedule" target="_blank" class="btn an-btn">Book a call</a>
         </div>
      </div>

      <div class="col-12 col-md-6 rt mt-3 mt-md-0">
         <form id="partner-inquiry-form">
            @csrf
            <h3 class="title mb-1">Secure your spot now</h3>
            <p class="mb-4">Fill out the form below and our team will reach  out within 24 hours.</p>
            <div class="row g-3">
               <div class="col-12 col-md-6">
                  <input type="text" name="name" placeholder="Name" class="form-control" required value="{{ old('name') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="email" name="email" placeholder="Email" class="form-control" required value="{{ old('email') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="phone" placeholder="Phone" class="form-control" required value="{{ old('phone') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="state" placeholder="State" class="form-control" required value="{{ old('state') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="city" placeholder="City" class="form-control" required value="{{ old('city') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="occupation" placeholder="Occupation" class="form-control" required value="{{ old('occupation') }}">
               </div>
               <div class="col-12 col-md-12">
                  <textarea name="message" placeholder="Message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
               </div>
               <div class="col-12 row align-items-center mt-2">
                  <div class="g-recaptcha" data-sitekey="6LfQ4B8qAAAAAEbOCn71lwSwarsWil2_6kQlDEAj"></div>
               </div>
               <div class="col-12">
                  <button type="submits" id="sendBtn" class="btn an-btn px-4">Schedule a call</button>
               </div>
               <p id="notify"></p>
            </div>
         </form>
      </div>
   </div>
   <!---------- side social bar  ------------>
   @include('layouts.incl.social')
</section>





{{-- <a class="inquiry-btn btn btn-warning" title="Fill Enquiry Form" href="#">INQUIRY</a> --}}


<!---------- how to start  ---------->
<section class="mt-5 w-75 mx-auto">
   <h3 class="fw-bold">Why Partner with Us?</h3>
   <p>Unlock New Opportunities with ConsoLegal</p>
   <div class="main-img-container text-center">
      <img src="{{ asset('web/image')}}/partner-with-us-dummy-1.png" class="img-fluid">
   </div>
</section>

<section class="mt-5 w-75 mx-auto">
   <h3 class="fw-bold">Our Partnership Models</h3>
   <p>Choose a Partnership That Suits Your Business</p>
   <div class="main-img-container text-center">
      <img src="{{ asset('web/image')}}/partner-with-us-dummy-2.png" class="img-fluid">
   </div>
</section>

<section class="mt-5 w-75 mx-auto">
   <h3 class="fw-bold">What Our Partners Say</h3>
   <p>Choose a Partnership That Suits Your Business</p>
   <div class="main-img-container text-center">
      <img src="{{ asset('web/image')}}/partner-with-us-dummy-3.png" class="img-fluid">
   </div>
</section>

<section class="mt-5 w-75 mx-auto">

   <div class="row">
      <div class="col-12 col-md-6">
         <img src="{{ asset('web/image')}}/partner-with-us-dummy-4.png" class="img-fluid">
         <h5 class="fw-bold">Ready to Partner with Us?</h5>
         <p>Let’s work together to create success stories.</p>
      </div>
      <div class="col-12 col-md-6">
         <form id="partner-inquiry-form-bottom" class="rounded-3 p-3 shadow">
            <h3 class="title mb-1">Secure your spot now</h3>
            <p class="mb-4">Fill out the form below and our team will reach  out within 24 hours.</p>
            <div class="row g-3">
               <div class="col-12 col-md-6">
                  <input type="text" name="name" placeholder="Name" class="form-control" required value="{{ old('name') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="email" name="email" placeholder="Email" class="form-control" required value="{{ old('email') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="phone" placeholder="Phone" class="form-control" required value="{{ old('phone') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="state" placeholder="State" class="form-control" required value="{{ old('state') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="city" placeholder="City" class="form-control" required value="{{ old('city') }}">
               </div>
               <div class="col-12 col-md-6">
                  <input type="text" name="occupation" placeholder="Occupation" class="form-control" required value="{{ old('occupation') }}">
               </div>
               <div class="col-12 col-md-12">
                  <textarea name="message" placeholder="Message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
               </div>
               <div class="col-12 row align-items-center mt-2">
                  <div class="g-recaptcha" data-sitekey="6LfQ4B8qAAAAAEbOCn71lwSwarsWil2_6kQlDEAj"></div>
               </div>
               <div class="col-12">
                  <button type="submits" id="sendBtn" class="btn an-btn px-4">Schedule a call</button>
               </div>
               <p id="notify-bottom"></p>
            </div>
         </form>
      </div>
   </div>
</section>

<script>
   $(document).on("submit", "#partner-inquiry-form", function(e) {
      e.preventDefault();
      // validateCaptcha();
      let formData = $(this).serialize();

      let formDataArray = new URLSearchParams(formData);
      let recaptchaResponse = formDataArray.get('g-recaptcha-response');

      if (!recaptchaResponse) {
         $("#notify").html('reCAPTCHA verification is required').css("color", "red");
         return
      }

      $.ajax({
         url: "{{ route('partner.inquiry.store') }}",
         type: "POST",
         data: formData,
         success: function(data) {
            // $('#success-message').removeClass('d-none').text(data.success);
            $('#notify').html(data.success).css("color", "green");
            $('#partner-inquiry-form')[0].reset();  // Clear the form
         },
         error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorList = '<ul>';
                $.each(errors, function(key, value) {
                    errorList += '<li>' + value[0] + '</li>';
                });
                errorList += '</ul>';

                $('#notify').html(errorList).css("color", "red");
            }
      })
   })
   
   $(document).on("submit", "#partner-inquiry-form-bottom", function(e) {
      e.preventDefault();
      // validateCaptcha();
      let formData = $(this).serialize();

      let formDataArray = new URLSearchParams(formData);
      let recaptchaResponse = formDataArray.get('g-recaptcha-response');

      if (!recaptchaResponse) {
         $("#notify-bottom").html('reCAPTCHA verification is required').css("color", "red");
         return
      }

      $.ajax({
         url: "{{ route('partner.inquiry.store') }}",
         type: "POST",
         data: formData,
         success: function(data) {
            // $('#success-message').removeClass('d-none').text(data.success);
            $('#notify-bottom').html(data.success).css("color", "green");
            $('#partner-inquiry-form-bottom')[0].reset();  // Clear the form
         },
         error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorList = '<ul>';
                $.each(errors, function(key, value) {
                    errorList += '<li>' + value[0] + '</li>';
                });
                errorList += '</ul>';

                $('#notify-bottom').html(errorList).css("color", "red");
            }
      })
   })
</script>


@endsection