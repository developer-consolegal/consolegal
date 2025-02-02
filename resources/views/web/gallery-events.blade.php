@extends("layouts.web")

{{-- @section('title','About Us | Consolegal')
@section('description','We Started as a one man show in the profession gradually scaled up 
            with the joining of passionate and experienced professionals from diverse backgrounds now launching our 
            online platform ConsoLegal- Keep it Simple. We value accountability, transparency and simplicity.') --}}
<x-seo page="{{ 'gallery' }}" />

@section('content')

@push('css')
<style>
   .rowFlex {
  height: 70vh;
  overflow-y: scroll
}
.rowFlex .column{
   position: relative;
}
.rowFlex .column img {
  width:100%; 
  max-height:200px;
  object-fit: cover;
  aspect-ratio: 3/2;
  transition: transform .3s linear;
}

.rowFlex .column::after{
   content: var(--var-content);
   position: absolute;
   transform: translate(-50%, 0%);
   bottom: 5px;
   left: 50%;
   height: fit-content;
   width: 94%;
   background-color: rgba(0, 0, 0, 0.372);
   color: #fff;
   font-size: 14px;
   padding: 5px;
   opacity: 0;
   transition: opacity .3s linear;
}

.rowFlex .column:hover::after{
   opacity: 1;
}

.rowFlex .column:hover img {
  transform: scale(1.05);
}

</style>
@endpush


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
   <div class="row rowFlex container-md py-4 mx-auto">
      @foreach ($gallery as $index => $item)
      <div class="column col-4 col-md-3 p-2" style="--var-content: '{{$item->description}}';">
        <img src="{{asset('storage')}}/{{$item->image}}" alt="{{$item->meta}}">
      </div>
        @endforeach
   </div>
</section>


@endsection