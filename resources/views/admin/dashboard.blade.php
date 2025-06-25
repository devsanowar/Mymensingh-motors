@extends('admin.layouts.app')

@push('styles')
    
@endpush

@section('admin_content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <h2>Dashboard
                    <small class="text-muted">Welcome to {{ $website_setting->website_title }} web application</small>
                </h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="breadcrumb" id="dashboard-tabs" style="gap: 10px;">
                    <li><button class="btn btn-primary filter-btn active" data-days="1">1 Day</button></li>
                    <li><button class="btn btn-primary filter-btn" data-days="7">7 Days</button></li>
                    <li><button class="btn btn-primary filter-btn" data-days="15">15 Days</button></li>
                    <li><button class="btn btn-primary filter-btn" data-days="{{ now()->daysInMonth }}">30/31 Days</button>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" target="_blank">
                            <i class="zmdi zmdi-home"></i> {{ $website_setting->website_title }}</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix" id="dashboard-stats">
            @php
                $cards = [
                    ['icon' => 'zmdi-money-box', 'value' => $total_order_amount, 'label' => 'Total Sale'],
                    ['icon' => 'zmdi-shopping-cart', 'value' => $order_count, 'label' => 'Total Orders'],
                    ['icon' => 'zmdi-shopping-cart', 'value' => $pending_order_count, 'label' => 'Pending Orders'],
                    ['icon' => 'zmdi-shopping-cart', 'value' => $cancelled_order_count, 'label' => 'Cancelled Orders'],
                    [
                        'icon' => 'zmdi-confirmation-number',
                        'value' => $confirmed_order_count,
                        'label' => 'Confirmed Order',
                    ],
                    ['icon' => 'zmdi-shopping-cart', 'value' => $shipped_order_count, 'label' => 'Shipped Order'],
                    ['icon' => 'zmdi-check-all', 'value' => $delivered_order_count, 'label' => 'Delivered Orders'],
                    ['icon' => 'zmdi-accounts', 'value' => $user_count, 'label' => 'Users'],
                    ['icon' => 'zmdi-email', 'value' => $message_count, 'label' => 'Inbox'],
                ];
            @endphp

            @foreach ($cards as $card)
                <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                    <div class="card tasks_report">
                        <div class="body">
                            <span class="dashboard-icons"><i class="zmdi {{ $card['icon'] }}"></i></span>
                            <h2 class="mt-3">{{ $card['value'] }}</h2>
                            <p>{{ $card['label'] }}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row clearfix" id="dashboard-stats">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Browser Usage</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                        class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu slideUp ">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="dashboard-donut-chart"></div>
                        <table class="table m-t-15 m-b-0">
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Chrome</td>
                                    <td>6985</td>
                                    <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Other</td>
                                    <td>2697</td>
                                    <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Safari</td>
                                    <td>3597</td>
                                    <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Firefox</td>
                                    <td>2145</td>
                                    <td><i class="zmdi zmdi-caret-up text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Opera</td>
                                    <td>1854</td>
                                    <td><i class="zmdi zmdi-caret-down text-danger"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


             <!-- Pie Chart -->
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>PIE CHART</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <canvas id="pie_chart" height="450"></canvas>
                    </div>
                </div>
            </div>
            <!-- #END# Pie Chart --> 



        </div>

    </div>
@endsection

@push('scripts')

<script src="{{ asset('backend') }}/assets/plugins/chartjs/Chart.bundle.js"></script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById("pie_chart").getContext('2d');

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['In Stock', 'Out Stock'],
                datasets: [{
                    label: 'Stock',
                    data: [120, 80], // ➤ তুমি এখানে ডায়নামিক সংখ্যা দিতে পারো
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Blue
                        'rgba(255, 99, 132, 0.7)'  // Red
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script> --}}


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById("pie_chart").getContext('2d');

        var inStock = {{ $inStockCount }};
        var outStock = {{ $outStockCount }};

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['In Stock', 'Out of Stock'],
                datasets: [{
                    label: 'Stock Status',
                    data: [inStock, outStock],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)', // Blue
                        'rgba(255, 99, 132, 0.7)'  // Red
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    });
</script>



    <script>
        function loadDashboardStats(days = 1) {
            $.ajax({
                url: "{{ route('admin.dashboard.filter') }}",
                method: "GET",
                data: {
                    days: days
                },
                success: function(response) {
                    let statsHtml = '';
                    const cards = [{
                            icon: 'zmdi-money-box',
                            value: response.total_order_amount,
                            label: 'Total Sale'
                        },
                        {
                            icon: 'zmdi-shopping-cart',
                            value: response.order_count,
                            label: 'Total Orders'
                        },
                        {
                            icon: 'zmdi-shopping-cart',
                            value: response.pending_order_count,
                            label: 'Pending Orders'
                        },
                        {
                            icon: 'zmdi-shopping-cart',
                            value: response.cancelled_order_count,
                            label: 'Cancelled Orders'
                        },
                        {
                            icon: 'zmdi-confirmation-number',
                            value: response.confirmed_order_count,
                            label: 'Confirmed Order'
                        },
                        {
                            icon: 'zmdi-shopping-cart',
                            value: response.shipped_order_count,
                            label: 'Shipped Order'
                        },
                        {
                            icon: 'zmdi-check-all',
                            value: response.delivered_order_count,
                            label: 'Delivered Orders'
                        },
                        {
                            icon: 'zmdi-accounts',
                            value: response.user_count,
                            label: 'Users'
                        },
                        {
                            icon: 'zmdi-email',
                            value: response.message_count,
                            label: 'Inbox'
                        },
                    ];

                    cards.forEach(card => {
                        statsHtml += `
                        <div class="col-lg-3 col-md-6 col-sm-12 text-center">
                            <div class="card tasks_report">
                                <div class="body">
                                    <span class="dashboard-icons"><i class="zmdi ${card.icon}"></i></span>
                                    <h2 class="mt-3">${card.value}</h2>
                                    <p>${card.label}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    });

                    $('#dashboard-stats').html(statsHtml);
                },
                error: function() {
                    alert("Something went wrong while fetching dashboard data.");
                }
            });
        }

        $(document).ready(function() {
            // প্রথমে ডিফল্ট ডাটা লোড করুন
            loadDashboardStats(1);

            // বাটনে ক্লিক ইভেন্ট হ্যান্ডল করুন
            $('.filter-btn').on('click', function() {
                // active ক্লাস পরিবর্তন
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');

                let days = $(this).data('days');
                loadDashboardStats(days);
            });
        });
    </script>
@endpush
