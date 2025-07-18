<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FaqController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\LikeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\AboutPageController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\ContactPageController;
use App\Http\Controllers\Frontend\CheckoutpageController;
use App\Http\Controllers\Frontend\SocialworkPageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::middleware(['web', 'logVisitorInfo'])->group(function () {
Route::get('/', [FrontendController::class, 'index'])->name('home');
});

Route::get('/category-product/{id}', [FrontendController::class, 'getProductsByCategory'])->name('category_product.page');
Route::get('/brand-product/{id}', [FrontendController::class, 'getProductsByBrand'])->name('brand_product.page');

Route::get('/search', action: [FrontendController::class, 'search'])->name('search');
Route::get('/shop-page', [FrontendController::class, 'shopPage'])->name('shop_page');
Route::get('/product-single-page/{id}', [FrontendController::class, 'productSinglePage'])->name('product_single.page');

// Product filtering
// Route::get('/price-filter', [FrontendController::class, 'priceFilter'])->name('website.price.filter');



Route::get('/shoping-cart', [CartController::class, 'cartPage'])->name('cart.page');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
Route::delete('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removefrom.cart');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
// Remove cart from mini cart box
Route::post('/remove-from-cart-item', [CartController::class, 'removeFromMiniCart'])->name('removeFromCart');



Route::get('/checkout-page', [CheckoutpageController::class, 'checkoutPage'])->name('checkout.page');
Route::get('/get-upazilas/{district_id}', [CheckoutpageController::class, 'getUpazilas'])->name('get.upazilas');
Route::post('/place-an-order', [CheckoutpageController::class, 'placeOrder'])->name('place_an_order');
Route::get('order/confirmation/{id}', [CheckoutpageController::class, 'showOrderConfirmation'])->name('order.confirmation');



Route::get('/about-page', [AboutPageController::class, 'aboutPage'])->name('about.page');

Route::get('/contact', [ContactController::class, 'contactPage'])->name('contact.page');
Route::post('/contact/submit', [ContactController::class, 'contactForm']);

Route::get('/blog', [BlogController::class, 'index'])->name('blog.page');
Route::get('/blog/{post_slug}/', [BlogController::class, 'blogSinglePage'])->name('blog_single.page');
Route::post('/post/{post}/like', [LikeController::class, 'toggle'])->name('post.like');


Route::post('/subscribe-newsletter', [SubscriberController::class, 'subscribe'])->name('newsletter.subscribe');


Route::get('/faq', [FaqController::class, 'index'])->name('faq.page');


Route::get('privacy/policy/page', [FrontendController::class, 'privacyPolicyPage'])->name('privacy_policy.page');
Route::get('terms/and/condition', [FrontendController::class, 'termsAndCondtion'])->name('terms_and_condition.page');
Route::get('return/refund', [FrontendController::class, 'returnRefund'])->name('return_refund.page');


// Route::get('/project', [ProjectController::class, 'projectPage'])->name('project.page');
// Route::get('/project/{project_slug}/', [ProjectController::class, 'projectSinglePage'])->name('projectSingle.page');


// Route::get('/service', [ServiceController::class, 'servicePage'])->name('service.page');



// Route::post('/send-message', [ContactPageController::class, 'contactForm'])->name('form.submit');


// Route::get('/social-work-page', [SocialworkPageController::class, 'socialWorkPage'])->name('social_work_page.page');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // লগইন পেজ বা যেখানেই পাঠাতে চান
})->name('logout');


require __DIR__.'/auth.php';
