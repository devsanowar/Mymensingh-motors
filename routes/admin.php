<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\BlocklistController;
use App\Http\Controllers\Admin\SmsReportController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\NewslatterController;
use App\Http\Controllers\Admin\SmsSettingController;
use App\Http\Controllers\Admin\SocialIconController;
use App\Http\Controllers\Admin\WhyChoseUsController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\CostCategoryController;
use App\Http\Controllers\Admin\CostController;
use App\Http\Controllers\Admin\FieldofCostController;
use App\Http\Controllers\Admin\FieldOfIncomeController;
use App\Http\Controllers\Admin\IncomeCategoryController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\MessageSendController;
use App\Http\Controllers\Admin\ProductUnitController;
use App\Http\Controllers\Admin\PromobannerController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\ReturnrefundController;
use App\Http\Controllers\Admin\WebsiteColorController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\PrivacypolicyController;
use App\Http\Controllers\Admin\PrivilegeController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StockLogController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\TermsAdnCondiotnController;
use App\Http\Controllers\Admin\VisitLogController;

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function () {
        // Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/dashboard/data', [AdminController::class, 'filterDashboardData'])->name('admin.dashboard.filter');

        // User Management
        Route::prefix('user')->group(function () {
            Route::get('create', [UserController::class, 'userCreate'])->name('user.create');
            Route::post('store', [UserController::class, 'storeUser'])->name('user.store');
            Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit.user');
            Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
            Route::post('profile/{id}/image', [UserController::class, 'profileImageUpdate'])->name('update.profile.image');
            Route::post('password/{id}/change', [UserController::class, 'passwordUpdate'])->name('update.password');
            Route::delete('delete/{id}', [UserController::class, 'destroyUser'])->name('user.destroy');

            Route::get('customer-list/', [UserController::class, 'customerList'])->name('customerList');
        });

        // Website Settings
        Route::prefix('website')->group(function () {
            Route::get('setting', [WebsiteSettingController::class, 'websiteSetting'])->name('website_setting');

            Route::post('setting/update', [WebsiteSettingController::class, 'websiteSettingUpdate'])->name('website_setting.update');

            Route::post('bredcrumb/update', [WebsiteSettingController::class, 'bredcrumbUpdate'])->name('bredcrumb.update');

            Route::post('google-map/update', [WebsiteSettingController::class, 'googleMapUpdate'])->name('googlemap.update');

            Route::post('footer-info/update', [WebsiteSettingController::class, 'footerInfoSettingUpdate'])->name('website_footer_info.update');

            Route::get('social-icon', [SocialIconController::class, 'socialIcon'])->name('website_social_icon.index');
            Route::post('social-icon/update', [SocialIconController::class, 'socialIconUpdate'])->name('website_social_icon.update');
        });

        // Admin Panel Settings
        Route::prefix('admin-panel')->group(function () {
            Route::get('setting', [AdminPanelController::class, 'adminPanelSetting'])->name('admin_panel_setting');
            Route::post('setting/update', [AdminPanelController::class, 'adminPanelSettingUpdate'])->name('admin_panel_setting.update');
        });

        // Home Page Sections
        Route::prefix('home-page')->group(function () {
            // Sliders
            Route::prefix('slider')->group(function () {
                Route::get('/', [SliderController::class, 'index'])->name('slider.index')->middleware('permission:home.slider.index');
                Route::get('create', [SliderController::class, 'create'])->name('slider.create')->middleware('permission:home.slider.create');
                Route::post('store', [SliderController::class, 'store'])->name('slider.store');
                Route::get('edit/{id}', [SliderController::class, 'edit'])->name('slider.edit')->middleware('permission:home.slider.edit');
                Route::put('update/{id}', [SliderController::class, 'update'])->name('slider.update');
                Route::delete('destroy/{id}', [SliderController::class, 'destroy'])->name('slider.destroy')->middleware('permission:home.slider.delete');
            });


            // About
            Route::get('about', [AboutController::class, 'index'])->name('about.index')->middleware('permission:home.about.page');
            Route::post('about/update', [AboutController::class, 'update'])->name('about.update');

            // Why chose us
            Route::resource('why-choose-us', WhyChoseUsController::class);

            // Achievement
            Route::resource('achievement', AchievementController::class);

            // Reviews
            Route::resource('review', ReviewController::class);

            // FAQs
            Route::resource('faq', FaqController::class);

            //Banner
            Route::get('banner', [BannerController::class, 'index'])->name('banner.index');
            Route::post('banner/update', [BannerController::class, 'update'])->name('banner.update');

            //Promo banner
            Route::get('/promobanner', [PromobannerController::class, 'index'])->name('promobanner.index');
            Route::post('/promobanner/store', [PromobannerController::class, 'store'])->name('promobanner.store');
            Route::put('/promobanner/update', [PromobannerController::class, 'update'])->name('promobanner.update');
            Route::delete('/promobanner/delete/{id}', [PromobannerController::class, 'destroy'])->name('promobanner.destroy');
            Route::post('/promobanner/status-change', [PromobannerController::class, 'PromoBannerChangeStatus'])->name('promobanner.status');

            // Cta routes here
            Route::resource('cta', CtaController::class);
            Route::post('/cta/status-change', [CtaController::class, 'ctaChangeStatus'])->name('cta.status');
        });

        // About Page
        Route::prefix('about-page')->group(function () {
            Route::get('/', [AboutPageController::class, 'index'])->name('about_page.page')->middleware('permission:about.page');
            Route::post('/chairman/update/{id}', [AboutPageController::class, 'update'])->name('chairman.update');

            Route::get('/mission/vision', [AboutPageController::class, 'missionVision'])->name('mission_vision.page')->middleware('permission:mission.mission.vision');

            Route::post('/chairman/mission/update', [AboutPageController::class, 'missionUpdate'])->name('mission.update')->middleware('permission:mission.page.edit');
            Route::post('/chairman/vision/update', [AboutPageController::class, 'visionUpdate'])->name('vision.update')->middleware('permission:vission.page.edit');
        });

        // Categories
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index')->middleware('permission:product.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('category.create')->middleware('permission:product.category.create');
            Route::post('store', [CategoryController::class, 'store'])->name('category.store')->middleware('permission:product.category.create');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('permission:product.category.edit');
            Route::put('{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('permission:product.category.edit');
            Route::delete('{id}', [CategoryController::class, 'destroy'])->name('category.destroy')->middleware('permission:product.category.delete');
            Route::post('/category/status-change', [CategoryController::class, 'categoryChangeStatus'])->name('category.status');
            Route::post('bulk-delete', [CategoryController::class, 'bulkDelete'])->name('category.bulkDelete');
            Route::post('update-order', [CategoryController::class, 'updateOrder'])->name('category.updateOrder');
        });

        // Sub Category
        Route::resource('subcategory', SubcategoryController::class);

        // Brand route here
        Route::resource('brand', BrandController::class)->middleware([
            'index'   => 'permission:product.brand.index',
            'create'  => 'permission:product.brand.create',
            'store'   => 'permission:product.brand.create',
            'edit'    => 'permission:product.brand.edit',
            'update'  => 'permission:product.brand.edit',
            'destroy' => 'permission:product.brand.delete',
        ]);

        Route::post('/brand/status-change', [BrandController::class, 'brandChangeStatus'])->name('brand.status');

        // Product unit
        Route::prefix('unit')->group(function () {
            Route::get('/', [ProductUnitController::class, 'index'])->name('product_unit.index')->middleware('permission:product.unit.index');
            Route::post('/store', [ProductUnitController::class, 'store'])->name('product_unit.store')->middleware('permission:product.unit.create');
            Route::put('/update', [ProductUnitController::class, 'update'])->name('product_unit.update')->middleware('permission:product.unit.edit');
            Route::delete('/delete/{id}', [ProductUnitController::class, 'destroy'])->name('product_unit.destroy')->middleware('permission:product.unit.delete');
            Route::post('/status-change', [ProductUnitController::class, 'unitStatusChange'])->name('product_unit.status');
        });

        // Product
        Route::resource('product', ProductController::class)->middleware([
            'index'   => 'permission:product.index',
            'create'  => 'permission:product.create',
            'store'   => 'permission:product.create',
            'edit'    => 'permission:product.edit',
            'update'  => 'permission:product.edit',
            'destroy' => 'permission:product.delete',
        ]);

        Route::post('/product/status-change', [ProductController::class, 'productChangeStatus'])->name('product.status');
        Route::get('/All-trashed/product', [ProductController::class, 'trashedData'])->name('product.trash');
        Route::get('/restore/{id}/productData', [ProductController::class, 'restoreData'])->name('product.restore');
        Route::delete('/permanant/{id}/productdata', [ProductController::class, 'forceDeleteData'])->name('product.forceDelete');
        Route::get('changeStatus/{id}', [ProductController::class, 'changeStatus'])->name('changeStatus');

        
        // Supplier Route here
        Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/supplier/delete/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
        Route::post('/supplier/status-change', [SupplierController::class, 'supplierChangeStatus'])->name('supplier.status');



        // Purchase Route here
        Route::get('purchase', [PurchaseController::class, 'index'])->name('purchase.index');
        Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
        Route::post('purchase/store', [PurchaseController::class, 'store'])->name('purchase.store');
        Route::get('/get-supplier-balance/{id}', [PurchaseController::class, 'getSupplierBalance']);





        // Stock route here
        Route::get('/stocks', [StockController::class, 'index'])->name('admin.stock.index')->middleware('permission:stock.management');
        Route::get('/stocks/{id}/edit', [StockController::class, 'edit'])->name('admin.stock.edit')->middleware('permission:stock.edit');
        Route::post('/stocks/{id}/update', [StockController::class, 'update'])->name('admin.stock.update')->middleware('permission:stock.edit');
        
        // Stock log route here
        Route::get('stocklog', [StockLogController::class, 'index'])->name('stocklog')->middleware('permission:stock.logs');

        // District route
        Route::get('district', [DistrictController::class, 'index'])->name('district.index')->middleware('permission:district.index');
        Route::post('/district/store/', [DistrictController::class, 'store'])->name('district.store')->middleware('permission:district.create');
        Route::get('district/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit')->middleware('permission:district.edit');
        Route::post('district/update', [DistrictController::class, 'update'])->name('district.update')->middleware('permission:district.edit');
        Route::delete('district/destroy/{id}', [DistrictController::class, 'destroy'])->name('district.destroy')->middleware('permission:district.delete');
        Route::post('/district/status-change', [DistrictController::class, 'districtChangeStatus'])->name('district.status');

        // Upazila Route Here
        Route::get('upazila', [UpazilaController::class, 'index'])->name('upazila.index')->middleware('permission:upazila.index');
        Route::post('/upazila/store/', [UpazilaController::class, 'storeUpazila'])->name('upazila.store')->middleware('permission:upazila.create');
        Route::put('/upazilas/{id}', [UpazilaController::class, 'update'])->name('upazilas.update')->middleware('permission:upazila.edit');
        Route::delete('upazila/destroy/{id}', [UpazilaController::class, 'destroyUpazila'])->name('upazila.destroy')->middleware('permission:upazila.delete');
        Route::post('/upazila/status-change', [UpazilaController::class, 'upazilaChangeStatus'])->name('upazila.status');

        // Order routes Here
        Route::get('order', [OrderController::class, 'index'])->name('order.index')->middleware('permission:order.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show')->middleware('permission:order.show');
        Route::delete('orders-destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('permission:order.delete');
        Route::post('/order/change-status/{id}', [OrderController::class, 'orderChangeStatus'])->name('orderChangeStatus')->middleware('permission:order.status');
        Route::get('/admin/filter-order', [OrderController::class, 'orderFilter'])->name('filter.orders');

        // shipping routes
        Route::get('shipping', [ShippingController::class, 'index'])->name('shipping.index')->middleware('permission:shipping.index');
        Route::post('shipping/store', [ShippingController::class, 'store'])->name('shipping.store')->middleware('permission:shipping.create');
        Route::put('/shipping/{id}', [ShippingController::class, 'update'])->name('shipping.update')->middleware('permission:shipping.edit');
        Route::delete('shipping/{id}/destroy', [ShippingController::class, 'destroy'])->name('shipping.destroy')->middleware('permission:shipping.delete');
        Route::get('shipping-status/{id}', [ShippingController::class, 'shippingChangeStatus'])->name('shipping.status');

        // payment method routes here
        Route::get('payment_method', [PaymentMethodController::class, 'index'])->name('payment_method.index')->middleware('permission:payment_method.index');
        Route::get('payment-method/create', [PaymentMethodController::class, 'create'])->name('payment_method.create')->middleware('permission:payment_method.create');
        Route::post('payment-method/store', [PaymentMethodController::class, 'store'])->name('payment_method.store')->middleware('permission:payment_method.create');
        Route::get('payment-method/edit/{id}', [PaymentMethodController::class, 'edit'])->name('payment_method.edit')->middleware('permission:payment_method.edit');
        Route::put('payment-method/update/{id}', [PaymentMethodController::class, 'update'])->name('payment_method.update')->middleware('permission:payment_method.edit');
        Route::delete('payment-method/delete/{id}', [PaymentMethodController::class, 'destroy'])->name('payment_method.destroy')->middleware('permission:payment_method.delete');
        Route::post('/payment-method/status-change', [PaymentMethodController::class, 'paymentMethodChangeStatus'])->name('payment_method.status');


        // Cost module route here
        Route::resource('cost-category', CostCategoryController::class)->middleware([
            'index'   => 'permission:cost.cost_category.index',
            'create'  => 'permission:cost.cost_category.create',
            'store'   => 'permission:cost.cost_category.create',
            'edit'    => 'permission:cost.cost_category.edit',
            'update'  => 'permission:cost.cost_category.edit',
            'destroy' => 'permission:cost.cost_category.delete',
        ]);
        Route::post('cost-category/status/', [CostCategoryController::class, 'costCategoryStatusChange'])->name('cost-category.status');

        
        // Field of cost route here
        Route::resource('field-of-cost', FieldofCostController::class)->middleware([
            'index'   => 'permission:cost.field_of_cost.index',
            'create'  => 'permission:cost.field_of_cost.create',
            'store'   => 'permission:cost.field_of_cost.create',
            'edit'    => 'permission:cost.field_of_cost.edit',
            'update'  => 'permission:cost.field_of_cost.edit',
            'destroy' => 'permission:cost.field_of_cost.delete',
        ]);
        Route::post('field-of-cost/status/', [FieldofCostController::class, 'FieldOfCostStatusChange'])->name('field-of-cost.status');


        // Cost route here
        route::resource('cost', CostController::class)->middleware([
            'index'   => 'permission:cost.index',
            'create'  => 'permission:cost.create',
            'store'   => 'permission:cost.create',
            'edit'    => 'permission:cost.edit',
            'update'  => 'permission:cost.edit',
            'destroy' => 'permission:cost.delete',
        ]);

        Route::get('/costs/filter', [CostController::class, 'filter'])->name('cost.filter');
        Route::get('/All-trashed/cost', [CostController::class, 'trashedData'])->name('cost.trash');
        Route::get('/restore/{id}/costData', [CostController::class, 'restoreData'])->name('cost.restore');
        Route::delete('/permanant/{id}/costData', [CostController::class, 'forceDeleteData'])->name('cost.forceDelete');


        // Income Category route here
        Route::get('income-category', [IncomeCategoryController::class, 'index'])->name('income_category.index');
        Route::post('income-category/store', [IncomeCategoryController::class, 'store'])->name('income_category.store');
        Route::put('income-category/update/{id}', [IncomeCategoryController::class, 'update'])->name('income_category.update');
        Route::delete('income-category/delete/{id}', [IncomeCategoryController::class, 'destroy'])->name('income_category.destroy');
        Route::post('income-category/status-update', [IncomeCategoryController::class, 'changeIncomeCategoryStatus'])->name('income_category_status.update');


        // Field Of income
        Route::get('field-of-income', [FieldOfIncomeController::class, 'index'])->name('field_of_income.index');
        Route::post('field-of-income/store', [FieldOfIncomeController::class, 'store'])->name('field_of_income.store');
        Route::put('field-of-income/update/{id}', [FieldOfIncomeController::class, 'update'])->name('field_of_income.update');
        Route::delete('field-of-income/delete/{id}', [FieldOfIncomeController::class, 'destroy'])->name('field_of_income.destroy');
        Route::post('field-of-income/status-update', [FieldOfIncomeController::class, 'changeFieldOfIncomeStatus'])->name('field_of_income_status.update');


        // Income route here
        Route::get('income', [IncomeController::class, 'index'])->name('income.index');
        Route::get('income/create', [IncomeController::class, 'create'])->name('income.create');
        Route::post('income/store', [IncomeController::class, 'store'])->name('income.store');
        Route::get('income/show/{id}', [IncomeController::class, 'show'])->name('income.show');
        Route::get('income/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');
        Route::put('income/edit/{id}', [IncomeController::class, 'update'])->name('income.update');
        Route::delete('income/delete/{id}', [IncomeController::class, 'destroy'])->name('income.destroy');
        Route::get('/incomes/filter', [IncomeController::class, 'filter'])->name('income.filter');
        Route::get('/All-trashed/income', [IncomeController::class, 'trashedData'])->name('income.trash');
        Route::get('/restore/{id}/incomeData', [IncomeController::class, 'restoreData'])->name('income.restore');
        Route::delete('/permanant/{id}/incomeData', [IncomeController::class, 'forceDeleteData'])->name('income.forceDelete');

        
        // Post Category
        Route::get('post-category/', [PostCategoryController::class, 'index'])->name('post_category.index')->middleware('permission:post_category.index');
        Route::post('/post-category/store', [PostCategoryController::class, 'store'])->name('post_category.store')->middleware('permission:post_category.create');
        Route::put('/post-category/update/{id}', [PostCategoryController::class, 'update'])->name('post_category.update')->middleware('permission:post_category.edit');
        Route::delete('/post-category/delete/{id}', [PostCategoryController::class, 'destroy'])->name('post_category.destroy')->middleware('permission:post_category.delete');
        Route::post('/post-category/status-change', [PostCategoryController::class, 'changeStatus'])->name('post_category.status');

        // Posts
        Route::resource('post', PostController::class)->middleware([
            'index'   => 'permission:post.index',
            'create'  => 'permission:post.create',
            'store'   => 'permission:post.create',
            'edit'    => 'permission:post.edit',
            'update'  => 'permission:post.edit',
            'destroy' => 'permission:post.delete',
        ]);
        Route::post('/post/status-change', [PostController::class, 'postChangeStatus'])->name('post.status');

        

        // Contact form message route
        Route::get('contact-form', [InboxController::class, 'index'])->name('contact_form.message');
        Route::get('contact-form-msg-show/{id}', [InboxController::class, 'show'])->name('message.show');
        Route::delete('contact-form-msg/delete/{id}', [InboxController::class, 'destroy'])->name('contact_form_message.destroy');

        // Newsletter
        Route::get('Newslatter', [NewslatterController::class, 'index'])->name('newslatter')->middleware('permission:newslatter.index');
        Route::delete('newsletter/destroy/{id}', [NewslatterController::class, 'destroy'])->name('newslatter.destroy')->middleware('permission:newslatter.delete');

        
        
        // SMS api / custom message Settings
        Route::get('sms-settings', [SmsSettingController::class, 'edit'])->name('sms-settings.edit')->middleware('permission:sms-settings.edit');
        Route::put('sms-settings', [SmsSettingController::class, 'update'])->name('sms-settings.update')->middleware('permission:sms-settings.edit');


        // block list routes
        Route::get('block-list', [BlocklistController::class, 'index'])->name('block.list')->middleware('permission:block.list');
        Route::post('store-blocklist', [BlocklistController::class, 'store'])->name('block.number')->middleware('permission:blocked_number');
        Route::delete('/unblock/{id}', [BlocklistController::class, 'unblock'])->name('unblock.number')->middleware('permission:block.unblock');

        
        // Website Color routes
        Route::get('website-color', [WebsiteColorController::class, 'edit'])->name('website_color.edit')->middleware('permission:color_theme_settings.index');
        Route::put('/website-color/update/{id}', [WebsiteColorController::class, 'update'])->name('website_color.update')->middleware('permission:color_theme_settings.edit');

        // Message

        Route::get('/message', [MessageSendController::class, 'index'])->name('message.index')->middleware('permission:sms');
        Route::post('/send-message', [MessageSendController::class, 'send'])->name('send.message')->middleware('permission:sms.send');
        Route::get('/custom-sms', [MessageSendController::class, 'customSms'])->name('custom.sms')->middleware('permission:sms.custom');

        // Sms Report
        Route::prefix('sms-report')->group(function () {
            Route::get('sms-report', [SmsReportController::class, 'index'])->name('sms-report.index')->middleware('permission:sms.report');
            Route::delete('destroy/{id}', [SmsReportController::class, 'destroy'])->name('sms-report.destroy')->middleware('permission:sms.report.delete');
        });


        // Privacy policy route
        Route::get('privacy-policy', [PrivacypolicyController::class, 'privacyPolicy'])->name('privacy_policy')->middleware('permission:privacy_policy');
        Route::put('/privacy-policy/{id}', [PrivacypolicyController::class, 'update'])->name('privacy_policy.update')->middleware('permission:privacy_policy');

        //Return and refund
        Route::get('return-refund', [ReturnrefundController::class, 'returnRefund'])->name('return_refund')->middleware('permission:return_refund');
        Route::put('/return-refund/update/{id}', [ReturnrefundController::class, 'update'])->name('return_refund.update')->middleware('permission:return_refund');

        // Terms And Condition
        Route::get('/terms-and-condition', [TermsAdnCondiotnController::class, 'termsAndCondition'])->name('terms_and_condtion')->middleware('permission:terms_and_condtion');
        Route::put('/terms-and-condition/update/{id}', [TermsAdnCondiotnController::class, 'update'])->name('terms_and_conditon.update')->middleware('permission:terms_and_condtion');


        //Visit log route
        Route::get('visit-log', [VisitLogController::class, 'index'])->name('visit.log.index')->middleware('permission:visit.log.index');
        Route::get('visit-track', [VisitLogController::class, 'trackVisitor'])->name('visit.log.track');


        // Previlege route here 
        Route::get('privilege', [PrivilegeController::class, 'index'])->name('privilege.index')->middleware('permission:privilege.index');
        Route::get('/get-users-by-role/{role}', [PrivilegeController::class, 'getUsersByRole']);
        Route::post('/save-user-permissions', [PrivilegeController::class, 'savePermissions'])->name('admin.save.permissions');
        Route::get('/get-user-permissions/{user_id}', [PrivilegeController::class, 'getUserPermissions']);


    });
