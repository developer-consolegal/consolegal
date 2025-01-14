@extends('layouts.master')


@section('title','welcome')

@section('content')
<!--  BEGIN NAVBAR  -->
@include('adminheader')
<!--  END NAVBAR  -->


<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    @include('adminsidebar')
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content wallet">

        <div class="allform-page allfr">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="wallet">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <h5>Total Users</h5>
                            <h6>{{$users}}</h6>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="wallet">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <h5>Total Orders</h5>
                            <h6>{{$orders}}</h6>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                        <div class="wallet">
                            <i class="fa fa-file-pdf" aria-hidden="true"></i>
                            <h5>Total Leads</h5>
                            <h6>{{ $leads }}</h6>
                        </div>
                    </div>
                </div>
            </div>


            <div class="ulist" id="navbarscroll">
                <h2 class="pt-3">Recent Orders</h2>
                <table class="table table-striped custab mt-2">
                    <thead>
                        <tr>
                            <th>ID</th>
                             <th>Date</th> 
                            <th>User Name</th>
                            <th>Service</th>
                             <th>Amount</th> 
                             <th>Mode</th> 
                            <!-- <th>Referal</th> -->
                        </tr>
                    </thead>
                   @foreach ( $recent as $item)
                    @if($item->user !== null)
                    <tr>
                        <td>{{$item->user->user_id}}</td>
                         <td>{{$item->created_at}}</td> 
                        <td><a href="/admin/users/profile?id={{$item->user_id}}">
                                
                                {{$item->user!==null?$item->user->name:''}}
                            </a></td>
                        <td>{{$item->service?->name}}</td>
                        <td>₹ {{$item->payment?$item->payment->amount:$item->service->price}}</td>
                        <td>{{$item->payment_mode}}</td>
                    </tr>
                    @else

                    @if($item->fran !== null)
                    <tr>
                        <td>{{$item->fran->user_id}}</td>
                         <td>{{$item->created_at}}</td> 
                        <td><a href="/admin/franchise/profile?id={{$item->fran->id}}">
                                
                                {{$item->fran!==null?$item->fran->name:''}}
                            </a></td>
                            <td>{{$item->service?->name}}</td>
                        <td>₹ {{$item->payment?$item->payment->amount:$item->service->f_price}}</td>
                        <td>{{$item->payment_mode}}</td>
                    @endif

                    @endif
                    @endforeach
                </table>
            </div>


        </div>


    </div>
    <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->


@endsection