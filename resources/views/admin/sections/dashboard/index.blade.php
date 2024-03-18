@extends('admin.layouts.master')

@push('css')

@endpush

@section('page-title')
    @include('admin.components.page-title',['title' => __($page_title)])
@endsection

@section('breadcrumb')
    @include('admin.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("admin.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
    <div class="dashboard-area">
        <div class="dashboard-item-area">
            <div class="row">
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Total Visitors</h6>
                                <div class="user-info">
                                    <h2 class="user-count">6258</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--success">Active 40</span>
                                    <span class="badge badge--info">New 22</span>
                                    <span class="badge badge--warning">Today 12</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart6" data-percent="65"><span>65%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Add Money Balance</h6>
                                <div class="user-info">
                                    <h2 class="user-count">$865k</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">Total 40k</span>
                                    <span class="badge badge--warning">Pending 20K</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart7" data-percent="80"><span>80%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Money Out Balance</h6>
                                <div class="user-info">
                                    <h2 class="user-count">$273</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">Total 40k</span>
                                    <span class="badge badge--warning">Pending 20K</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart8" data-percent="90"><span>90%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Total Profit</h6>
                                <div class="user-info">
                                    <h2 class="user-count">$650</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">This Day 40k</span>
                                    <span class="badge badge--warning">This Month 20K</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart9" data-percent="70"><span>70%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">User Active Tickets</h6>
                                <div class="user-info">
                                    <h2 class="user-count">630</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--warning">Pending 45</span>
                                    <span class="badge badge--success">Solved 25</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart10" data-percent="50"><span>50%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Total Users</h6>
                                <div class="user-info">
                                    <h2 class="user-count">1190</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">Active 45</span>
                                    <span class="badge badge--warning">Unverified 25</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart11" data-percent="85"><span>85%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Pending Add Money</h6>
                                <div class="user-info">
                                    <h2 class="user-count">$865k</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">This Day 40k</span>
                                    <span class="badge badge--warning">This Month 20K</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart12" data-percent="60"><span>60%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxxl-4 col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-15">
                    <div class="dashbord-item">
                        <div class="dashboard-content">
                            <div class="left">
                                <h6 class="title">Pending Money Out</h6>
                                <div class="user-info">
                                    <h2 class="user-count">$273</h2>
                                </div>
                                <div class="user-badge">
                                    <span class="badge badge--info">This Day 40k</span>
                                    <span class="badge badge--warning">This Month 20K</span>
                                </div>
                            </div>
                            <div class="right">
                                <div class="chart" id="chart13" data-percent="75"><span>75%</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chart-area mt-15">
        <div class="row mb-15-none">
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">Monthly Add Money Chart</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart1" class="sales-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">Revenue Chart</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart2" class="revenue-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">Add Money Analytics</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart3" class="order-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-6 col-xxl-3 col-xl-6 col-lg-6 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">User Analytics</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart4" class="balance-chart"></div>
                    </div>
                    <div class="chart-area-footer">
                        <div class="chart-btn">
                            <a href="javascript:void(0)" class="btn--base w-100">Send Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-12 col-xxl-3 col-xl-12 col-lg-12 mb-15">
                <div class="chart-wrapper">
                    <div class="chart-area-header">
                        <h5 class="title">Growth</h5>
                    </div>
                    <div class="chart-container">
                        <div id="chart5" class="growth-chart"></div>
                    </div>
                    <div class="chart-area-footer">
                        <div class="chart-btn">
                            <a href="javascript:void(0)" class="btn--base w-100">Send Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="table-area mt-15">
        <div class="table-wrapper">
            <div class="table-header">
                <h5 class="title">Latest Transactions</h5>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Time</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="assets/images/user/user-1.jpg" alt="user"></li>
                                </ul>
                            </td>
                            <td><span>Sean Black</span></td>
                            <td>sean@gmail.com</td>
                            <td>sean</td>
                            <td>123-456(008)90</td>
                            <td>5.00</td>
                            <td><span class="text--info">Stripe</span></td>
                            <td><span class="badge badge--warning">Pending</span></td>
                            <td>2022-05-30 03:46 PM</td>
                            <td>
                                <button type="button" class="btn btn--base bg--success"><i class="las la-check-circle"></i></button>
                                <button type="button" class="btn btn--base bg--danger"><i class="las la-times-circle"></i></button>
                                <a href="add-logs-edit.html" class="btn btn--base"><i class="las la-expand"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="assets/images/user/user-2.jpg" alt="user"></li>
                                </ul>
                            </td>
                            <td><span>Merri Diamond</span></td>
                            <td>merri@gmail.com</td>
                            <td>merri</td>
                            <td>123-456(008)90</td>
                            <td>5.00</td>
                            <td><span class="text--info">Paypal</span></td>
                            <td><span class="badge badge--success">Completed</span></td>
                            <td>2022-05-30 03:46 PM</td>
                            <td>
                                <button type="button" class="btn btn--base bg--success"><i class="las la-check-circle"></i></button>
                                <button type="button" class="btn btn--base bg--danger"><i class="las la-times-circle"></i></button>
                                <a href="add-logs-edit.html" class="btn btn--base"><i class="las la-expand"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <ul class="user-list">
                                    <li><img src="assets/images/user/user-3.jpg" alt="user"></li>
                                </ul>
                            </td>
                            <td><span>Sean Black</span></td>
                            <td>sean@gmail.com</td>
                            <td>sean</td>
                            <td>123-456(008)90</td>
                            <td>5.00</td>
                            <td><span class="text--info">Razorpay</span></td>
                            <td><span class="badge badge--danger">Canceled</span></td>
                            <td>2022-05-30 03:46 PM</td>
                            <td>
                                <button type="button" class="btn btn--base bg--success"><i class="las la-check-circle"></i></button>
                                <button type="button" class="btn btn--base bg--danger"><i class="las la-times-circle"></i></button>
                                <a href="add-logs-edit.html" class="btn btn--base"><i class="las la-expand"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
<!-- apexcharts js -->
<script src="{{ asset('public/backend/js/apexcharts.js') }}"></script>
<!-- chart js -->
<script src="{{ asset('public/backend/js/chart.js') }}"></script> 
<script>

    // apex-chart
    var options = {
    series: [{
    name: 'Pending',
    color: "#5A5278",
    data: [44, 55, 41, 67, 22, 43]
    }, {
    name: 'Completed',
    color: "#6F6593",
    data: [13, 23, 20, 8, 13, 27]
    }, {
    name: 'Canceled',
    color: "#8075AA",
    data: [11, 17, 15, 15, 21, 14]
    }, {
    name: 'All',
    color: "#A192D9",
    data: [21, 7, 25, 13, 22, 8]
    }],
    chart: {
    type: 'bar',
    height: 350,
    stacked: true,
    toolbar: {
        show: false
    },
    zoom: {
        enabled: true
    }
    },
    responsive: [{
    breakpoint: 480,
    options: {
        legend: {
        position: 'bottom',
        offsetX: -10,
        offsetY: 0
        }
    }
    }],
    plotOptions: {
    bar: {
        horizontal: false,
        borderRadius: 10
    },
    },
    xaxis: {
    type: 'datetime',
    categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
        '01/05/2011 GMT', '01/06/2011 GMT'
    ],
    },
    legend: {
    position: 'bottom',
    offsetX: 40
    },
    fill: {
    opacity: 1
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();

    var options = {
    series: [{
    name: 'Pending',
    color: "#5A5278",
    data: [44, 55, 41, 67, 22, 43]
    }, {
    name: 'Completed',
    color: "#6F6593",
    data: [13, 23, 20, 8, 13, 27]
    }, {
    name: 'Canceled',
    color: "#8075AA",
    data: [11, 17, 15, 15, 21, 14]
    }, {
    name: 'All',
    color: "#A192D9",
    data: [21, 7, 25, 13, 22, 8]
    }],
    chart: {
    type: 'bar',
    height: 350,
    stacked: true,
    toolbar: {
        show: false
    },
    zoom: {
        enabled: true
    }
    },
    responsive: [{
    breakpoint: 480,
    options: {
        legend: {
        position: 'bottom',
        offsetX: -10,
        offsetY: 0
        }
    }
    }],
    plotOptions: {
    bar: {
        horizontal: true,
        borderRadius: 10
    },
    },
    xaxis: {
    type: 'datetime',
    categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT',
        '01/05/2011 GMT', '01/06/2011 GMT'
    ],
    },
    legend: {
    position: 'bottom',
    offsetX: 40
    },
    fill: {
    opacity: 1
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();

    var options = {
    series: [{
    name: 'Add Money',
    color: "#5A5278",
    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }, {
    name: 'Money Out',
    color: "#6F6593",
    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
    }, {
    name: 'Total Balance',
    color: "#8075AA",
    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
    }],
    chart: {
    type: 'bar',
    toolbar: {
        show: false
    },
    height: 325
    },
    plotOptions: {
    bar: {
        horizontal: false,
        columnWidth: '55%',
        borderRadius: 5,
        endingShape: 'rounded'
    },
    },
    dataLabels: {
    enabled: false
    },
    stroke: {
    show: true,
    width: 2,
    colors: ['transparent']
    },
    xaxis: {
    categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
    },
    yaxis: {
    title: {
        text: '$ (thousands)'
    }
    },
    fill: {
    opacity: 1
    },
    tooltip: {
    y: {
        formatter: function (val) {
        return "$ " + val + " thousands"
        }
    }
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart3"), options);
    chart.render();

    var options = {
    series: [44, 55, 23, 43],
    chart: {
    width: 350,
    type: 'pie'
    },
    colors: ['#5A5278', '#6F6593', '#8075AA', '#A192D9'],
    labels: ['Active', 'Unverified', 'Banned', 'All'],
    responsive: [{
    breakpoint: 1480,
    options: {
        chart: {
        width: 280
        },
        legend: {
        position: 'bottom'
        }
    },
    breakpoint: 1199,
    options: {
        chart: {
        width: 380
        },
        legend: {
        position: 'bottom'
        }
    },
    breakpoint: 575,
    options: {
        chart: {
        width: 280
        },
        legend: {
        position: 'bottom'
        }
    }
    }],
    legend: {
    position: 'bottom'
    },
    };

    var chart = new ApexCharts(document.querySelector("#chart4"), options);
    chart.render();

    var options = {
    series: [44, 55, 41, 17],
    chart: {
    width: 350,
    type: 'donut',
    },
    colors: ['#5A5278', '#6F6593', '#8075AA', '#A192D9'],
    labels: ['Today', '1 week', '1 month', '1 year'],
    legend: {
        position: 'bottom'
    },
    responsive: [{
    breakpoint: 1600,
    options: {
        chart: {
        width: 100,
        },
        legend: {
        position: 'bottom'
        }
    },
    breakpoint: 1199,
    options: {
        chart: {
        width: 380
        },
        legend: {
        position: 'bottom'
        }
    },
    breakpoint: 575,
    options: {
        chart: {
        width: 280
        },
        legend: {
        position: 'bottom'
        }
    }
    }]
    };

    var chart = new ApexCharts(document.querySelector("#chart5"), options);
    chart.render();

    // pie-chart
    $(function() {
    $('#chart6').easyPieChart({
        size: 80,
        barColor: '#f05050',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#f050505a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart7').easyPieChart({
        size: 80,
        barColor: '#10c469',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#10c4695a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart8').easyPieChart({
        size: 80,
        barColor: '#ffbd4a',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#ffbd4a5a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart9').easyPieChart({
        size: 80,
        barColor: '#ff8acc',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#ff8acc5a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart10').easyPieChart({
        size: 80,
        barColor: '#7367f0',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#7367f05a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart11').easyPieChart({
        size: 80,
        barColor: '#1e9ff2',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#1e9ff25a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart12').easyPieChart({
        size: 80,
        barColor: '#5a5278',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#5a52785a',
        lineCap: 'circle',
        animate: 3000
    });
    });

    $(function() {
    $('#chart13').easyPieChart({
        size: 80,
        barColor: '#ADDDD0',
        scaleColor: false,
        lineWidth: 5,
        trackColor: '#ADDDD05a',
        lineCap: 'circle',
        animate: 3000
    });
    });
</script>
@endpush