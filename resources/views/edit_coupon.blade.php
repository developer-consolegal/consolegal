@extends('layouts.master')

@section("title","edit coupon")



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
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

   <!--  BEGIN SIDEBAR  -->
   @include("adminsidebar")
   <!--  END SIDEBAR  -->

   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">
      <div class="addform-page addorder">
         <h2>Edit Coupon</h2>
         <form action="{{route('admin.coupon.update',['id' => $data->id])}}" method="post">
             
            <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Name<span class="text-danger">*</span></label>
                  <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Code<span class="text-danger">*</span></label>
                  <input type="text" name="code" value="{{$data->code}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Coupon Type<span class="text-danger">*</span></label>
                  <select name="type" id="" class="form-control" required>
                     <option value="discount" {{$data->type == "discount" ? "selected" : ""}}>Discount</option>
                     <option value="cashback" {{$data->type == "cashback" ? "selected" : ""}}>Cashback</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Method<span class="text-danger">*</span></label>
                  <select name="method" id="" class="form-control" required>
                     <option value="flat" {{$data->method == "flat" ? "selected" : ""}}>Flat</option>
                     <option value="percent" {{$data->method == "percent" ? "selected" : ""}}>Percent</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="exampleInputEmail1">Amount<span class="text-danger">*</span></label>
                  <input type="text" value="{{$data->amount}}" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
               </div>

               <div class="form-group">
                  <label for="service">Service<span class="text-danger">*</span>
                     <span class="text-danger"><small>(ctrl+select for multiple service)</small></span>
                  </label>
                  <select name="service_id[]" id="service" multiple required class="form-control">
                     @foreach ($services as $list)
                                <option value="{{$list->id}}" {{in_array($list->id, $selected) ? "selected" : ""}}>{{$list->name}}</option>
                     @endforeach
                  </select>


               </div>

               <div class="form-group">
                  <label for="exampleInputEmail1">Expire Date</label>
                  <input type="date" name="expired_at" value="{{ \Carbon\Carbon::parse($data->expired_at)->format('Y-m-d') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>


               <div class="form-group">
                  <label for="exampleFormControlSelect1">Status<span class="text-danger">*</span></label>
                  <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                     <option value="1" {{$data->status == "1" ? "selected" : ""}}>true</option>
                     <option value="0" {{$data->status == "0" ? "selected" : ""}}>false</option>
                  </select>
               </div>
               
               <div class="form-group">
                  <label for="exampleFormControlSelect2">Visible to frontend<span class="text-danger">*</span></label>
                  <select class="form-control" name="visible" id="exampleFormControlSelect2" required>
                     <option value="yes" {{$data->visible == "yes" ? "selected" : ""}}>Yes</option>
                     <option value="no" {{$data->visible == "no" ? "selected" : ""}}>No</option>
                  </select>
               </div>

            <div class="form-group"><input type="submit" value="Save"></div>
         </form>


      </div>
   </div>




</div>
<!--  END CONTENT AREA  -->

</div>

@endsection