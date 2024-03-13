@extends('user.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
<div class="body-wrapper">
    <div class="dashboard-area mt-20">
        <div class="dashboard-header-wrapper">
            <h4 class="title">{{ __("My Wallets") }}</h4>
        </div>
        <div class="dashboard-item-area">
            <div class="row mb-20-none">
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Tether</span>
                            <h4 class="title">270.00 <span class="text--base">USDT</span></h4>
                        </div>
                        <div class="dashboard-icon">
                            <img src="{{ asset('public/frontend') }}/images/flag/usdt.webp" alt="flag">
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Total Payments</span>
                            <h4 class="title">460.00 <span class="text--base">USDT</span></h4>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-money-check-alt"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Average Payments</span>
                            <h4 class="title">390.00 <span class="text--base">USDT</span></h4>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-suitcase"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-20">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <span class="sub-title">Total Saved Card</span>
                            <h4 class="title">24</h4>
                        </div>
                        <div class="dashboard-icon">
                            <i class="las la-credit-card"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-area mt-20">
        <div class="row">
            <div class="col-xl-12">
                <div class="chart-wrapper">
                    <div class="dashboard-header-wrapper">
                        <h5 class="title">Payments Chart</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart" class="chart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-list-area">
        <div class="dashboard-header-wrapper">
            <h5 class="title">Latest Payments</h5>
            <div class="dashboard-btn-wrapper">
                <div class="dashboard-btn">
                    <button type="button" class="btn--base" data-bs-toggle="modal" data-bs-target="#addModal"><i class="las la-plus me-1"></i> Add New Method</button>
                </div>
            </div>
        </div>
        <div class="dashboard-list-wrapper">
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="lab la-cc-visa"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Mostafijur Rahman <span class="status-badge">Default</span></h4>
                                <span>Card Number: 4242 555 888 0000</span>
                                <span class="date d-block text--danger">Expire Date: 06-23</span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <button type="button" class="btn--base active small" data-bs-toggle="modal" data-bs-target="#editModal"><i class="las la-pen"></i></button>
                        <button type="button" class="btn--base small bg--danger border--danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt"></i></button>
                    </div>
                </div>
            </div>
            <div class="dashboard-list-item-wrapper">
                <div class="dashboard-list-item sent">
                    <div class="dashboard-list-left">
                        <div class="dashboard-list-user-wrapper">
                            <div class="dashboard-list-user-icon">
                                <i class="lab la-cc-amazon-pay"></i>
                            </div>
                            <div class="dashboard-list-user-content">
                                <h4 class="title">Md. Ruddra Khan</h4>
                                <span>Card Number: 4242 555 888 0000</span>
                                <span class="date d-block text--danger">Expire Date: 06-23</span>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-list-right">
                        <button type="button" class="btn--base active small" data-bs-toggle="modal" data-bs-target="#editModal"><i class="las la-pen"></i></button>
                        <button type="button" class="btn--base small bg--danger border--danger text-white" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="las la-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="view-all-btn text-center mt-20">
            <a href="payments.html" class="btn--base"><i class="las la-plus me-1"></i> View All</a>
        </div>
    </div>
</div>
@endsection
@push('script')
    <!-- apexcharts js -->
<script src="{{ asset('public/frontend') }}/js/apexcharts.min.js"></script>
<script>
    var options = {
        series: [{
          data: [44, 55, 41, 64, 22, 43, 21],
          color: "#64A6F8"
        }, {
          data: [53, 32, 33, 52, 13, 44, 32],
          color: "#00B98E"
        }],
          chart: {
          type: 'bar',
          toolbar: {
              show: false
          },
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: true,
            dataLabels: {
              position: 'top',
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetX: -6,
          style: {
            fontSize: '12px',
            colors: ['#fff']
          }
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },
        tooltip: {
          shared: true,
          intersect: false
        },
        xaxis: {
          categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
@endpush