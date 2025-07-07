@extends('website.layouts.app')
@section('title', 'website_content')
@section('website_content')
    <!--Breadcrumb section-->
    <div class="breadcrumb_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_inner">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><i class="zmdi zmdi-chevron-right"></i></li>
                            <li>Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb section end-->

    <!-- Start Maincontent  -->
    <section class="main_content_area my_account ptb-100">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="user-profile-card text-center">
                            <div class="user-avatar">
                                @if (Auth::check() && Auth::user()->system_admin == 'Customer' && Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="User Avatar"
                                        class="img-fluid rounded-circle">
                                @else
                                    <img src="{{ asset('frontend/assets/img/customer/customer-user2.png') }}"
                                        alt="User Avatar" class="img-fluid rounded-circle">
                                @endif

                            </div>
                            <div class="user-info">
                                <h4 class="user-name">{{ Auth::user()->name }}</h4>
                                <p class="user-phone"><i class="fas fa-phone-alt"></i> {{ Auth::user()->phone }}</p>
                            </div>
                        </div>

                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active">Dashboard</a>
                                </li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link">Orders</a></li>
                                <li><a href="#invoices" data-toggle="tab" class="nav-link">Invoices</a></li>
                                <li><a href="#downloads" data-toggle="tab" class="nav-link">Downloads</a></li>
                                <li><a href="#address" data-toggle="tab" class="nav-link">Addresses</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link">Account
                                        details</a></li>

                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-danger customer-logout-button"> logout </button>
                                </form>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade show active" id="dashboard">
                                <h3>Dashboard </h3>
                                <p>From your account dashboard. you can easily check &amp; view your <a
                                        href="#orders">recent orders</a>, manage your <a href="#">shipping and billing
                                        addresses</a> and <a href="#" data-toggle="modal"
                                        data-target="#accountEditModal">
                                        Edit your password and account details.
                                    </a>
                                </p>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert"
                                    id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="tab-pane fade" id="orders">
                                <h3>আমার অর্ডারসমূহ</h3>
                                <div class="lion_table_area table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>অর্ডার নং</th>
                                                <th>তারিখ</th>
                                                <th>স্ট্যাটাস</th>
                                                <th>মোট Amount</th>
                                                <th>অ্যাকশন</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($orders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                    <td>
                                                        <span
                                                            class="
                                                                @if ($order->status == 'completed') text-success
                                                                @elseif($order->status == 'processing') text-primary
                                                                @elseif($order->status == 'cancelled') text-danger
                                                                @else text-warning @endif">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ number_format($order->total_price, 2) }} টাকা
                                                        ({{ $order->orderItems->sum('quantity') }} টি আইটেম)
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('customer.orders.show', $order->id) }}"
                                                            class="btn btn-sm btn-danger view-order-btn text-white"
                                                            data-order-id="{{ $order->id }}">
                                                            বিস্তারিত
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">আপনার কোনো অর্ডার নেই</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    <!-- পেজিনেশন -->
                                    <div class="mt-3">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="downloads">
                                <h3>Downloads</h3>
                                <div class="lion_table_area table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Downloads</th>
                                                <th>Expires</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($downloads as $download)
                                                <tr>
                                                    <td>{{ $download['product_name'] }}</td>
                                                    <td>{{ $download['order_date'] }}</td>
                                                    <td>{{ $download['expires'] }}</td>
                                                    <td><a href="{{ $download['download_link'] }}" class="view">Click
                                                            Here To Download Your File</a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">No downloadable products found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="invoices">
                                <h3>Invoices</h3>
                                <div class="lion_table_area table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>অর্ডার নং</th>
                                                <th>তারিখ</th>
                                                <th>স্ট্যাটাস</th>
                                                <th>মোট Amount</th>
                                                <th>অ্যাকশন</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($orders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                    <td>
                                                        <span
                                                            class="
                                                                @if ($order->status == 'completed') text-success
                                                                @elseif($order->status == 'processing') text-primary
                                                                @elseif($order->status == 'cancelled') text-danger
                                                                @else text-warning @endif">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ number_format($order->total_price, 2) }} টাকা
                                                        ({{ $order->orderItems->sum('quantity') }} টি আইটেম)
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('orders.invoice', $order->id) }}"
                                                            class="btn btn-sm btn-danger view-order-btn text-white"
                                                            data-order-id="{{ $order->id }}">
                                                            Download
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">আপনার কোনো অর্ডার নেই</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane p-4" id="address">
                                <p class="mb-4 text-muted">
                                    The following addresses will be used on the checkout page by default.
                                </p>

                                <div class="card shadow-sm border-0">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="mb-0">Billing Address</h5>
                                            <a href="#" class="btn btn-sm btn-outline-primary">Edit</a>
                                        </div>

                                        <h6 class="fw-bold mb-1">Bobby Jackson</h6>
                                        <address class="mb-0">
                                            House #15<br>
                                            Road #1<br>
                                            Block #C<br>
                                            Banasree<br>
                                            Dhaka - 1212<br>
                                            Bangladesh
                                        </address>
                                    </div>
                                </div>
                            </div>





                            <div class="tab-pane fade" id="account-details">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                                        <div class="account_login_form">
                                            <form action="#">
                                                <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                <div class="input-radio">
                                                    <span class="custom-radio"><input type="radio" value="1"
                                                            name="id_gender"> Mr.</span>
                                                    <span class="custom-radio"><input type="radio" value="1"
                                                            name="id_gender"> Mrs.</span>
                                                </div> <br>
                                                <label>First Name</label>
                                                <input type="text" name="first-name">
                                                <label>Last Name</label>
                                                <input type="text" name="last-name">
                                                <label>Email</label>
                                                <input type="text" name="email-name">
                                                <label>Password</label>
                                                <input type="password" name="user-password">
                                                <label>Birthdate</label>
                                                <input type="text" placeholder="MM/DD/YYYY" value=""
                                                    name="birthday">
                                                <span class="example">
                                                    (E.g.: 05/31/1970)
                                                </span>
                                                <br>
                                                <span class="custom_checkbox">
                                                    <input id="c_check" type="checkbox" value="1" name="optin">
                                                    <label for="c_check">Receive offers from our partners</label>
                                                </span>
                                                <br>
                                                <span class="custom_checkbox">
                                                    <input id="c_sign" type="checkbox" value="1"
                                                        name="newsletter">
                                                    <label for="c_sign">Sign up for our newsletter<br><em>You may
                                                            unsubscribe at any moment. For that purpose, please find
                                                            our contact info in the legal notice.</em></label>
                                                </span>
                                                <div class="save_button primary_btn default_button">
                                                    <a href="#">Save</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Maincontent  -->




    <!-- Order Details Modal -->
    <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderDetailsModalLabel">Order details: #<span id="modalOrderId"></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="orderDetailsContent">
                    <!-- ডাটা এখানে লোড হবে -->
                    <div class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close It</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Customer info edit modal -->
    @include('auth.customer.partials.edit-customer-info')




@endsection



@push('scripts')
    <script>
        $(document).ready(function() {
            $('.view-order-btn').on('click', function(e) {
                e.preventDefault();
                var orderId = $(this).data('order-id');
                var url = $(this).attr('href');

                $('#modalOrderId').text(orderId);

                $.ajax({
                    url: url,
                    type: 'GET',
                    beforeSend: function() {
                        $('#orderDetailsContent').html(`
                    <div class="text-center">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                `);
                    },
                    success: function(response) {
                        $('#orderDetailsContent').html(response);

                        $('#downloadPdfBtn').on('click', function() {
                            var element = document.getElementById('invoice-content');
                            html2pdf().from(element).save('invoice.pdf');
                        });
                    },
                    error: function() {
                        $('#orderDetailsContent').html(`
                    <div class="alert alert-danger">
                        ডাটা লোড করতে সমস্যা হয়েছে
                    </div>
                `);
                    }
                });

                $('#orderDetailsModal').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Cancel Order Button Click Event
            $(document).on('click', '.cancel-order-btn', function(e) {
                e.preventDefault();
                let orderId = $(this).data('order-id');
                let cancelUrl = "{{ route('orders.cancel', ':id') }}".replace(':id', orderId);

                // Show confirmation dialog
                if (confirm('আপনি কি নিশ্চিতভাবে এই অর্ডারটি ক্যান্সেল করতে চান?')) {
                    // AJAX Request
                    $.ajax({
                        url: cancelUrl,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'PATCH',
                            cancel_reason: prompt('অর্ডার ক্যান্সেল করার কারণ লিখুন:', '')
                        },
                        beforeSend: function() {
                            // Show loading indicator
                            $(`.cancel-order-btn[data-order-id="${orderId}"]`)
                                .html('<i class="fas fa-spinner fa-spin"></i> প্রসেসিং...')
                                .prop('disabled', true);
                        },
                        success: function(response) {
                            // Reload the page to see changes
                            window.location.reload();
                        },
                        error: function(xhr) {
                            alert('কিছু সমস্যা হয়েছে: ' + xhr.responseJSON.message);
                            $(`.cancel-order-btn[data-order-id="${orderId}"]`)
                                .html('অর্ডার ক্যান্সেল করুন')
                                .prop('disabled', false);
                        }
                    });
                }
            });
        });
    </script>


    <!-- Your script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('downloadPdfBtn').addEventListener('click', function() {
                var element = document.getElementById('invoice-content');
                html2pdf().from(element).save('invoice.pdf');
            });
        });
    </script>

    <script>
        setTimeout(function() {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }
        }, 3000);
    </script>
@endpush
