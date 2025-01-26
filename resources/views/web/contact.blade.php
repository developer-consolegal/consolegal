@extends("layouts.web")

{{-- @section('title','Contact | Consolegal')
@section('description','Contact Us | mail@consolegal.com') --}}
<x-seo page="{{ 'contact' }}" />


@section('content')

<!----- contact us home  ------->
<section class="mx-auto" id="contact-us">
   <h3 class="main-title text-center">Contact US</h3>
   <h5 class="sub-title text-center">Any Question and Remarks? Just write us a message</h5>


   <div class="main-row row container-md mx-auto">
      <div class="col-md-5 lt">
         <div class="info-card">
            <div class="top">
               <h3 class="title">Contact Information</h3>
               <p class="caption-info">Fill up the form and our Team will get back to you within 24 hours</p>
            </div>

            <div class="contact-info">
               <div class="box">
                  <span class="icon"><i class="fas fa-phone-alt"></i></span>
                  <span class="text">+91 {{config('app.phone')}}</span>
               </div>
               <div class="box">
                  <span class="icon"><i class="fas fa-envelope"></i></span>
                  <span class="text">{{config('app.email')}}</span>
               </div>
               <div class="box">
                  <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                  <span class="text">Varanasi, 221002</span>
               </div>
            </div>

            <div class="social-icons">
               <span class="icons"><a href="{{config('app.facebook')}}"><i class="fab fa-facebook-f"></a></i></span>
               <span class="icons"><a href="{{config('app.whatsapp')}}"><i class="fab fa-whatsapp"></a></i></span>
               <span class="icons"><a href="{{config('app.twitter')}}"><i class="fab fa-twitter"></a></i></span>
               <span class="icons"><a href="{{config('app.instagram')}}"><i class="fab fa-instagram"></a></i></span>
               <span class="icons"><a href="{{config('app.linkedin')}}"><i class="fab fa-linkedin"></a></i></span>
            </div>
         </div>
      </div>
      <div class="col-md-7 rt">
         <form class="row g-3" id="contact-form">
            @csrf
            <div class="col-md-12">
               <label for="inputEmail4" class="form-label">Full Name</label>
               <input type="text" name="name" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col-6">
               <label for="inputAddress" class="form-label">E-mail</label>
               <input type="email" name="email" class="form-control" id="inputAddress" placeholder="xxxx@mail.com" required>
            </div>
            <div class="col-6">
               <label for="inputAddress2" class="form-label">Phone</label>
               <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="Phone: 123xxxx" required>
            </div>
            <div class="col-12">
               <label class="form-check-label" for="gridCheck">
                  Message (optional)
               </label>
               <input class="form-control" name="message" type="text" id="gridCheck">
            </div>

            <div class="col-12 row align-items-center mt-2">
               <!-- <div class="col-4 captcha-ct" onclick="genCaptcha()" id="captcha">
                  Captcha
               </div> -->
               <div class="g-recaptcha" data-sitekey="6LfQ4B8qAAAAAEbOCn71lwSwarsWil2_6kQlDEAj"></div>
               <!-- <div class="col-8 captcha-inp">
                  <input class="form-control" name="captcha" id="cpatchaTextBox" type="text" required>
               </div> -->

            </div>
            <div class="col-12 p-4 ps-0">
               <button type="submit" class="btn an-btn">Send Message</button>
               <p id="notify" class="mt-2"></p>
            </div>

            <div class="col-12 text-center">
               <img src="{{asset('image/razorpay.png')}}" alt="razorpay" width="auto" height="70px">
            </div>
         </form>
      </div>
   </div>

</section>

<script>

   $(document).on("submit", "#contact-form", function(e) {
      e.preventDefault();
      let formData = $(this).serialize();

      $.ajax({
         url: "{{route('contact.post')}}",
         type: "post",
         data: formData,
         success: function(data) {
            const parse = JSON.parse(data)

            if (parse.msg === 'contact form submitted.') {
               $("#notify").html("Thank you for contacting us.").css("color", "green");
               $("#contact-form")[0].reset()
               return
            }

            $("#notify").html(parse.msg).css("color", "red");
         },
         error: function() {
            $("#notify").html("Failed to send, try again!!").css("color", "red");
         }
      });
   });

</script>

@endsection