@extends("layouts.web")

{{-- @section('title','About Us | Consolegal')
@section('description','We Started as a one man show in the profession gradually scaled up 
            with the joining of passionate and experienced professionals from diverse backgrounds now launching our 
            online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity.') --}}
<x-seo page="{{ 'about' }}" />

@section('content')

@push('css')
<style>
   .rowFlex {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}

.column {
  flex: 50%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
}
</style>
@endpush

<section id="about-us-home">
   <div class="row container-md mx-auto">
      <div class="col-md-6 lt order-2 order-md-1">
         <div class="content">
            <h2 class="heading">How We Started <span class="brandFont">ConsoLegal</span></h2>
            <p class="sub-para">We Started as a one man show in the profession gradually scaled up 
            with the joining of passionate and experienced professionals from diverse backgrounds now launching our 
            online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity.</p>
            <a href="#more" class="btn an-btn">Know more</a>
         </div>f
      </div>
      <div class="col-md-6 rt order-1 order-md-2">
         <div class="img-container">
            <img src="{{asset('web/image/about-vector.webp')}}" alt="about-page-vector" class="img-fluid">
         </div>
      </div>

   </div>


</section>


<!-- content section  -->
<section class="content-section row mx-auto container-md px-0" id="more">
   <h1 class="title text-center py-4">About <span class="brandFont">ConsoLegal</span></h1>
   <div class="container-md col-md-9 mx-auto py-5 ">
      <p class="para">
         We Started as a one man show in the profession gradually scaled up with the joining of passionate and experienced professionals from diverse backgrounds now launching our online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity. We believe in simplifying Financial, taxation and business-related matters for our clients by providing one stop solution. Here not just services are provided but to provide a trusted presence for all your financial needs. Consolegal is a consulting firm with office based in Varanasi offering business incorporation, tax return preparation, tax audit compliances, GST registration & return preparation, TDS Return Filing, Trademark, Govt licenses and registrations, accounting, bookkeeping, payroll, ROC compliances and other related services
      </p>
      <p class="para">
         At ConsoLegal, Where passion meets profession & expectations meet excellence. We are a technology-driven platform trying to organize professional services industry in India. We are committed to helping start-ups, individuals, Companies and other businesses in solving legal compliance related to starting and running their business so that they can progress towards new level of success. We provide a range of client-oriented services to meet the emerging Accounting, Taxation, and Compliance challenges that you face by multiple fronts. We provide you with support services that can free up owners to concentrate on essential aspects of their business. We help companies to remain compliant and lawful. Our firm provides outstanding service to our clients because of our dedication to the three underlying principles- professionalism, responsiveness & quality
      </p>
      <p class="para">
         Our objective is to provide the best professional services across INDIA to reap the maximum benefits to maximum people. we assure that every client receives the close analysis and attention they deserve We pride ourselves on our knowledge and understanding of our clients and their organizations. it's our continuous goal to be a valued partner to each client whom we work with. We realize that timing is a crucial aspect of quality service and we carefully coordinate our work and delivery timelines with our clients to make sure it works with their schedules and that their expectations are met.
      </p>
      <p class="para">
         Whether it’s a simple tax return or more complex taxation advice, CONSOLEGAL is here to help you. Our ultimate goal is to be a value addition to your business for making you focus on your core business functions, let us provide the accounting, Tax compliances, legal and financial services.
      </p>
   </div>
   <div class="col-md-3 d-md-block d-none" style="overflow: hidden;">
      <br><br>
      <img src="{{asset('image')}}/about_side_jpg.jpg" alt="" height="600px">
   </div>
</section>

<section class="my-5" id="blogs">
   <h2 class="main-title text-center mb-5">Latest Events</h2>

   <div class="swiper-container-blog">
      <div class="swiper-wrapper">
         <!-- slide 1 -->

         @foreach($events as $data)
         <div class="swiper-slide">
            <div class="blog-card-container">
               <div class="img-container">
                  <span class="date">{{$data->event_date->format('Y-F-d')}}</span>
                  <img src="{{ asset('storage')}}/{{$data->image}}" loading="lazy">
               </div>
               <div class="title" style="height: fit-content;">
                  <h5>{{$data->label}}</h5>
               </div>
               <div class="tags">
                  <p>{{$data->description}}</p>
               </div>
               <div class="read-more"><a href="{{$data->link}}" class="btn an-btn">View Details</a></div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <div class="swiper-prev-btn"><i class="fas fa-chevron-left"></i></div>
   <div class="swiper-next-btn"><i class="fas fa-chevron-right"></i></div>
</section>

<section>
   <div class="head text-center">
      <h3 class="title">Our Gallery</h3>
      {{-- <p class="sub-title">We are also associated with various professionals across India.</p> --}}
   </div>
   <div class="rowFlex container-md py-4">
      <div class="column">
         @foreach ($gallery as $index => $item)
         @if ($index % 2 == 0 && $index != 0)
            </div><div class="column">
         @endif
        <img src="{{asset('storage')}}/{{$item->image}}" style="width:100%;">
        @endforeach
      </div>
   </div>
</section>

<!-- quick cards  -->
<section class="quick-cards">
   <div class="head">
      <h3 class="title">Our Core Team</h3>
      <p class="sub-title">We are also associated with various professionals across India.</p>
   </div>

   <div class="cards-container container-md mx-auto ">
     
      <div class="cards">
         <div class="img"><img src="{{ asset('web/image')}}/team2.jpeg" alt="" class="img-fluid"></div>
         <h3 class="title">Gaurav Goel</h3>
         <p class="sub-title">Director </p>
         <p class="desc">B-Tech from Galgotias College 12+ Years Experience in Education</p>
      </div>
      <div class="cards">
         <div class="img"><img src="{{ asset('web/image')}}/team1.jpeg" alt="" class="img-fluid"></div>
         <h3 class="title" style="padding-top: 10px">Shubham Agrawal </h3>
         <p class="sub-title" style="padding: 10px 0">Founder & Director </p>
         <p class="desc">Bachelor in Law from Mahatma Gandhi Kashi Vidyapeeth, Varanasi
            & 8+ Years Experience in Business Compliance & Taxation
         </p>
      </div>
      <div class="cards">
         <div class="img"><img src="{{ asset('web/image')}}/team3.jpeg" alt="" class="img-fluid"></div>
         <h3 class="title">Juhi Goyal </h3>
         <p class="sub-title">Executive Head </p>
         <p class="desc">Graduation in Commerce 
            <br>CA Final & CS Executive 4+ Experience in Projection & Analysis.
         </p>
      </div>
   </div>

</section>

<section class="quick-cards pt-2">
   <div class="head">
      <h3 class="title">Our Teams</h3>
      <p class="sub-title">We are also associated with various professionals across India.</p>
   </div>

   <div class="cards-container container-md mx-auto">
      <div class="row">
         @foreach ($teams as $index => $item)
            @if ($index % 3 == 0 && $index != 0)
               </div><div class="row">
            @endif
            <div class="col-md-4">
               <div class="cards">
                  <div class="img"><img src="{{ asset('storage')}}/{{$item->profile_photo}}" alt="{{$item->name}}" class="img-fluid"></div>
                  <h3 class="title">{{$item->name}}</h3>
                  <p class="sub-title">{{$item->designation}}</p>
                  <p class="desc">{{$item->description}}</p>
               </div>
            </div>
         @endforeach
      </div>
   </div>
</section>

<section class="quick-cards pt-2">
   <div class="head">
      <h3 class="title">Our Experts</h3>
      <p class="sub-title">We are also associated with various professionals across India.</p>
   </div>

      <div class="cards-container container-md mx-auto">
         <div class="row">
            @foreach ($experts as $index => $item)
               @if ($index % 3 == 0 && $index != 0)
                  </div><div class="row">
               @endif
               <div class="col-md-4">
                  <div class="cards">
                     <div class="img"><img src="{{ asset('storage')}}/{{$item->profile_photo}}" alt="{{$item->name}}" class="img-fluid"></div>
                     <h3 class="title">{{$item->name}}</h3>
                     <p class="sub-title">{{$item->designation}}</p>
                     <p class="desc">{{$item->description}}</p>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   
</section>



@endsection