<!DOCTYPE html>
<html lang="en">

<!-- title should be on top  -->

<head>

   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-WWX6PM2171"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());

      gtag('config', 'G-WWX6PM2171');
   </script>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 ">


   <meta name="title" content="{{app()->view->getSections()['title']}}" />
   <meta name="description"
      content="{{isset(app()->view->getSections()['description']) ? app()->view->getSections()['description'] : '' }}" />

   <!-------------------------------- favicon ------------------------->

   <link rel="icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
   <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png')}}">
   <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png')}}">
   <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon-192x192.png')}}">
   <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon-512x512.png')}}">

   <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon')}}">
   <!-------------------------------- title ------------------------->
   <title> @yield('title')</title>

   <!-------------------------------- stylesheets ------------------------->

   <!-------- bootstrap -------->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" />

   <!-------- swiper css -------->
   <link rel="stylesheet" href="{{ asset('web/css/swiper-bundle.min.css')}}" />

   <!-------- aos css -------->
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

   <!--------- font-awsome ----------->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

   <!--------- custom  ----------->
   <link rel="stylesheet" href="{{ asset('web/css/main.css')}}">


   <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>

   <style>
      .w-85 {
         width: 85% !important;
      }
   </style>
   <style>
      /* Floating Button Styles */
      .whatsapp-bot {
          position: fixed;
          bottom: 20px;
          right: 20px;
          width: 60px;
          height: 60px;
          background-color: #25D366;
          color: white;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 30px;
          cursor: pointer;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
          z-index: 999;
          animation: pulse 1.5s infinite;
          transition: transform 0.3s ease;
      }

      .whatsapp-bot:hover {
          transform: scale(1.1);
      }

      /* Pulse Animation */
      @keyframes pulse {
          0% {
              box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
          }
          70% {
              box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
          }
          100% {
              box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
          }
      }

      /* Tooltip for Bot */
      .whatsapp-bot::after {
          content: 'Chat with Us!';
          position: absolute;
          bottom: 70px;
          right: 0;
          background: #25D366;
          color: white;
          padding: 5px 10px;
          border-radius: 6px;
          opacity: 0;
          transform: translateY(10px);
          transition: all 0.3s ease-in-out;
          white-space: nowrap;
          font-size: 14px;
      }

      .whatsapp-bot:hover::after {
          opacity: 1;
          transform: translateY(0);
      }
  </style>

   @stack('css')
</head>


<body>


   <!---------- navbar  ---------->
   @include('layouts.incl.nav')



   @yield('content')


   <!--------- footer  ----------->
   @include('layouts.incl.footer')

   <div class="whatsapp-bot" id="whatsappBot">
      <i class="fas fa-headset"></i>
  </div>

   {{--
   <script>
      // typed animation
      var options = {
         strings: ["Company Registration", "Company Registration", "GST Registration", "Income Tax", "GST Return", "Trademark Registration"],
         typeSpeed: 60,
         loop: true,
         attr: "placeholder",
         loopCount: Infinity,
         showCursor: true,
         cursorChar: "|",
      };
      var typed = new Typed("#search input", options);
   </script> --}}

   <script>


      $("body").click(function () {
         $('.navbar-collapse').collapse('hide');
      });

      $("nav").click(function (e) {
         e.stopPropagation();
      });

      document.getElementById('whatsappBot').addEventListener('click', function() {
        const phoneNumber = '+918874700440'; // Replace with your WhatsApp Bot number
        const message = encodeURIComponent("Hello, I'm interested in your services!");
        window.open(`https://wa.me/${phoneNumber}?text=${message}`, '_blank');
    });
   </script>



   @stack('script')
</body>

</html>