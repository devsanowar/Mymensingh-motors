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
                            <li>Login</li>
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
                                <img src="{{ asset('frontend') }}/assets/img/customer/customer-user2.png" alt="User Avatar"
                                    class="img-fluid rounded-circle">
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
                                        href="#">recent orders</a>, manage your <a href="#">shipping and billing
                                        addresses</a> and <a href="#">Edit your password and account details.</a>
                                </p>
                            </div>
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
                                                        <a href="{{ route('orders.show', $order->id) }}"
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
                                            <tr>
                                                <td>Shopnovilla - Free Real Estate PSD Template</td>
                                                <td>May 10, 2018</td>
                                                <td><span class="danger">Expired</span></td>
                                                <td><a href="#" class="view">Click Here To Download Your File</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Organic - ecommerce html template</td>
                                                <td>Sep 11, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#" class="view">Click Here To Download Your File</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <h4 class="billing-address">Billing address</h4>
                                <a href="#" class="view">Edit</a>
                                <p><strong>Bobby Jackson</strong></p>
                                <address>
                                    House #15<br>
                                    Road #1<br>
                                    Block #C <br>
                                    Banasree <br>
                                    Dhaka <br>
                                    1212
                                </address>
                                <p>Bangladesh</p>
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
                    <h5 class="modal-title" id="orderDetailsModalLabel">অর্ডার বিস্তারিত: #<span
                            id="modalOrderId"></span></h5>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বন্ধ করুন</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Modal ট্রিগার করার জন্য
            $('.view-order-btn').on('click', function(e) {
                e.preventDefault();
                var orderId = $(this).data('order-id');
                var url = $(this).attr('href');

                // Modal টাইটেল আপডেট করুন
                $('#modalOrderId').text(orderId);

                // AJAX রিকুয়েস্ট পাঠান
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
                    },
                    error: function() {
                        $('#orderDetailsContent').html(`
                    <div class="alert alert-danger">
                        ডাটা লোড করতে সমস্যা হয়েছে
                    </div>
                `);
                    }
                });

                // Modal শো করুন
                $('#orderDetailsModal').modal('show');
            });
        });
    </script>
@endpush
