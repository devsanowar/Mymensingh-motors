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
                    // ['icon' => 'zmdi-email', 'value' => $message_count, 'label' => 'Inbox'],
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
                        {{-- <div id="donut_chart" class="dashboard-donut-chart"></div> --}}
                        <canvas id="donut_chart" class="dashboard-donut-chart"></canvas>
                        <table class="table m-t-15 m-b-0">
                            <tbody>
                                @foreach ($browsers as $index => $browser)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $browser->browser ?? 'Unknown' }}</td>
                                        <td>{{ $browser->total }}</td>
                                        <td>
                                            @if ($loop->index % 2 === 0)
                                                <i class="zmdi zmdi-caret-up text-success"></i>
                                            @else
                                                <i class="zmdi zmdi-caret-down text-danger"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
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
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                        class="zmdi zmdi-more-vert"></i> </a>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const browserData = @json($browsers);

        const labels = browserData.map(item => item.browser ?? 'Unknown');
        const data = browserData.map(item => item.total);
        const total = data.reduce((sum, val) => sum + val, 0);

        const maxIndex = data.indexOf(Math.max(...data));
        const maxBrowser = labels[maxIndex];
        const maxPercent = ((data[maxIndex] / total) * 100).toFixed(1);

        const ctx = document.getElementById("donut_chart").getContext("2d");

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: [
                        '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 13
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const value = context.raw;
                                const percent = ((value / total) * 100).toFixed(1);
                                return `${context.label}: ${value} (${percent}%)`;
                            }
                        }
                    }
                }
            },
            plugins: [{
                // ✅ Custom plugin to show center text
                id: 'centerText',
                beforeDraw: function (chart) {
                    const width = chart.width;
                    const height = chart.height;
                    const ctx = chart.ctx;
                    ctx.restore();

                    const fontSize = (height / 140).toFixed(2);
                    ctx.font = `bold ${fontSize}em sans-serif`;
                    ctx.textBaseline = "middle";

                    const text1 = maxBrowser;
                    const text2 = maxPercent + "%";

                    const text1Width = ctx.measureText(text1).width;
                    const text2Width = ctx.measureText(text2).width;

                    ctx.fillStyle = "#000";
                    ctx.fillText(text1, (width - text1Width) / 2, height / 2 - 10);
                    ctx.fillText(text2, (width - text2Width) / 2, height / 2 + 10);

                    ctx.save();
                }
            }]
        });
    });
</script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
                            'rgba(255, 99, 132, 0.7)' // Red
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
                        // {
                        //     icon: 'zmdi-email',
                        //     value: response.message_count,
                        //     label: 'Inbox'
                        // },
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
            loadDashboardStats(1);

            $('.filter-btn').on('click', function() {
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');

                let days = $(this).data('days');
                loadDashboardStats(days);
            });
        });
    </script>
@endpush
