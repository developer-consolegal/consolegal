@extends('layouts.user')

@section("title","Dashboard User")

@section('content')
          <!--wallet start -->
          <div class="tab-pane active text-style" id="tab3">

            <div class="container">
              <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                  <div class="wallet">
                    <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                    <h5>Total Orders</h5>
                    <h6>{{$total}}</h6>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                  <div class="wallet">
                    <i class="fa fa-google-wallet" aria-hidden="true"></i>
                    <h5>Processing Orders</h5>
                    <h6>{{$pending}}</h6>
                  </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                  <div class="wallet">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <h5>Complete Orders</h5>
                    <h6>{{$complete}}</h6>
                  </div>
                </div>
              </div>
            </div>




<br />
 <h4 class="mb-0">Recent Transaction</h4>
            <table class="table table-striped custab mt-2">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Entry</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
             @foreach($history as $list)
                <tr>
                  <td>{{$list->id}}</td>
                  <td>{{$list->created_at}}</td>
                  <td style="text-transform: capitalize;">{{$list->amount_type}}</td>
                  <td style="text-transform: capitalize;">
                    @if($list->entry == "debit")
                    <span class="text-danger">debit</span>
                    @else
                    <span class="text-success">credit</span>
                    @endif
                  </td>
                  <td>
                    @if($list->entry == "debit")
                    <span class="text-danger">- {{$list->amount}}</span>
                    @else
                    <span class="text-success">+ {{$list->amount}}</span>
                    @endif
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <!--wallet end -->

@endsection