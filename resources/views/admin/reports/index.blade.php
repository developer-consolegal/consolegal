
@extends('layouts.master')

@section("title","Reports")

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
      <div class="addform-page addorder">
         <h2>Reports</h2>
         @push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .stat-card {
        position: relative;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px);
    }

    .stat-card .vector-bg {
        position: absolute;
        bottom: -20px;
        right: -20px;
        opacity: 0.2;
        font-size: 5rem;
    }

    .stat-card .card-body {
        position: relative;
        z-index: 2;
    }
</style>
@endpush
         <!-- Stats Tiles -->
         <div class="row g-4 mt-3 mb-4">
            <div class="col-md-3">
                <div class="card stat-card text-white bg-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text fs-4">{{ $totalOrders }}</p>
                        <div class="vector-bg">&#128230;</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card text-white bg-success h-100">
                    <div class="card-body">
                        <h5 class="card-title">Completed Orders</h5>
                        <p class="card-text fs-4">{{ $completedOrders }}</p>
                        <div class="vector-bg">&#9989;</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card text-white bg-info h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Leads</h5>
                        <p class="card-text fs-4">{{ $totalLeads }}</p>
                        <div class="vector-bg">&#128101;</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card text-white bg-warning h-100">
                    <div class="card-body">
                        <h5 class="card-title">Converted Leads</h5>
                        <p class="card-text fs-4">{{ $convertedLeads }}</p>
                        <div class="vector-bg">&#128200;</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card text-white bg-danger h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <p class="card-text fs-4">₹ {{ $totalSales }}</p>
                        <div class="vector-bg">&#128176;</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card text-white bg-secondary h-100">
                    <div class="card-body">
                        <h5 class="card-title">Wallet Balance</h5>
                        <p class="card-text fs-4">₹ {{ $walletBalance }}</p>
                        <div class="vector-bg">&#128179;</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphs Section -->
        <div class="row g-4">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Orders Over Time</h5>
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Sales Over Time</h5>
                        <canvas id="salesChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Top Selling Services</h5>
                        <canvas id="topServicesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Recent Transactions</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentTransactions as $transaction)
                        <tr>
                            <td>{{ $transaction->user_id }}</td>
                            <td>₹ {{ $transaction->amount }}</td>
                            <td>{{ ucfirst($transaction->amount_type) }}</td>
                            <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
   </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ordersData = @json($ordersOverTime);
    const salesData = @json($salesOverTime);
    const topSellingServices = @json($topSellingServices);

    const serviceNames = topSellingServices.map(service => service.service_name);
    const serviceTotals = topSellingServices.map(service => service.total);

    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const topServicesCtx = document.getElementById('topServicesChart').getContext('2d');

    new Chart(ordersCtx, {
        type: 'line',
        data: {
            labels: ordersData.map(item => item.date),
            datasets: [{
                label: 'Orders',
                data: ordersData.map(item => item.count),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Date' } },
                y: { title: { display: true, text: 'Orders Count' } }
            }
        }
    });

    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: salesData.map(item => item.date),
            datasets: [{
                label: 'Sales (₹)',
                data: salesData.map(item => item.total),
                borderColor: 'rgba(153, 102, 255, 1)',
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: { title: { display: true, text: 'Date' } },
                y: { title: { display: true, text: 'Sales (₹)' } }
            }
        }
    });

    new Chart(topServicesCtx, {
    type: 'bar',
    data: {
        labels: serviceNames,
        datasets: [{
            label: 'Total Orders',
            data: serviceTotals,
            backgroundColor: [
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 99, 132, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',
                'rgba(153, 102, 255, 0.6)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Orders'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Service Name'
                }
            }
        }
    }
});
</script>
@endpush

@endsection
