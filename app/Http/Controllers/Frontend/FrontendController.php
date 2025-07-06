<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cta;
use App\Models\Faq;
use App\Models\Post;
use App\Models\About;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Models\WhyChoseUs;
use App\Models\Achievement;
use App\Models\Promobanner;
use App\Models\ProjectVideo;
use App\Models\Returnrefund;
use Illuminate\Http\Request;
use App\Models\Privacypolicy;
use App\Models\Termscondition;
use App\Models\WebsiteSetting;
use App\Models\WebsiteSocialIcon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()
            ->select(['id', 'slider_title', 'sub_title', 'slider_content', 'slider_button_name', 'button_url', 'image'])
            ->get();
        $categories = Category::where('category_slug', '!=', 'default')->where('is_active', 1)->select('id', 'category_name', 'image', 'category_slug', 'position')->orderBy('position', 'asc')->get();

        $promobanners = Promobanner::where('is_active', 1)
            ->latest()
            ->get(['id', 'image', 'url']);

        $bestSellings = Product::where('is_active', 1)
            ->withCount([
                'orderItems as total_sales' => function ($query) {
                    $query->select(DB::raw('SUM(quantity)'));
                },
            ])
            ->orderByDesc('total_sales')
            ->take(3)
            ->get();

        $brands = Brand::where('is_active', 1)->latest()->select('id', 'image')->get();

        $about = About::first();
        $social_icon = WebsiteSocialIcon::select(['id', 'messanger_url'])->first();
        $website_setting = WebsiteSetting::select(['id', 'phone'])->first();

        $featured_products = Product::with(['category:id,category_name', 'brand:id,brand_name'])
            ->where('is_active', 1)
            ->where('is_featured', 1)
            ->latest()
            ->limit(8)
            ->get(['id', 'category_id', 'brand_id', 'product_name', 'product_slug', 'regular_price', 'discount_price', 'discount_type', 'thumbnail']);

        $categoriesWiseProducts = Category::where('category_slug', '!=', 'default')
            ->with([
                'products' => function ($q) {
                    $q->latest()->take(10);
                },
            ])
            ->get();

        $allProducts = Product::latest()->take(6)->get();

        $achievements = Achievement::where('is_active', 1)
            ->latest()
            ->get(['id', 'title', 'count_number', 'image']);

        $reviews = Review::latest()->get(['id', 'name', 'profession', 'review', 'image']);

        $cta = Cta::where('is_active', 1)->first();

        $blogs = Post::with('likes')->latest()->take(3)->get();

        return view('website.home', compact(['sliders', 'categories', 'brands', 'achievements', 'reviews', 'about', 'featured_products', 'blogs', 'promobanners', 'social_icon', 'website_setting', 'cta', 'bestSellings', 'categoriesWiseProducts', 'allProducts']));
    }

    // public function shopPage(Request $request)
    // {
    //     $pageTitle = 'Shop';
    //     $products = Product::where('is_active', 1)
    //         ->latest()
    //         ->select(['id', 'category_id', 'product_name', 'product_slug', 'regular_price', 'discount_price', 'discount_type', 'thumbnail'])
    //         ->paginate(9);

    //     if ($request->ajax()) {
    //         return view('website.layouts.pages.product.partials.products', compact('products'))->render();
    //     }

    //     $categories = Category::select('id', 'category_name', 'category_slug')
    //         ->withCount('products')
    //         ->where('category_name', '!=', 'default')
    //         ->where('is_active', true)
    //         ->orderBy('position')
    //         ->get();

    //     $brands = Brand::select(['id', 'brand_name'])
    //         ->withCount('products')
    //         ->where('is_active', 1)
    //         ->get();

    //     return view('website.shop', compact('products', 'categories', 'brands', 'pageTitle'));
    // }

    public function shopPage(Request $request)
    {
        $pageTitle = 'Shop';
        $perPage = $request->get('per_page', 3);

        $productsQuery = Product::query()->where('is_active', 1);


        if ($request->filled('brand')) {
            $productsQuery->where('brand_id', $request->brand);
        }


        if ($request->filled('category')) {
            $productsQuery->where('category_id', $request->category);
        }


        if ($request->filled('min_price') && $request->filled('max_price')) {
            $min = (float) $request->min_price;
            $max = (float) $request->max_price;

            $productsQuery
                ->selectRaw(
                    'products.*,
            CASE
                WHEN discount_price > 0 AND discount_type = "percent"
                    THEN regular_price - (regular_price * discount_price / 100)
                WHEN discount_price > 0 AND discount_type = "flat"
                    THEN regular_price - discount_price
                ELSE regular_price
            END AS final_price
        ',
                )
                ->havingRaw('final_price BETWEEN ? AND ?', [$min, $max]);
        } else {
            $productsQuery->select(['id', 'category_id', 'brand_id', 'product_name', 'product_slug', 'regular_price', 'discount_price', 'discount_type', 'thumbnail']);
        }


        $products = $productsQuery->paginate($perPage)->withQueryString();

        $categories = Category::withCount('products')->where('is_active', true)->get();
        $brands = Brand::withCount('products')->where('is_active', true)->get();

        if ($request->ajax()) {
            return view('website.layouts.pages.shop.partials.product_filter_by_price', compact('products'))->render();
        }

        return view('website.shop', compact('products', 'categories', 'brands', 'pageTitle'));
    }

    public function productSinglePage($id)
    {
        $product = Product::with(['category:id,category_name'])->findOrFail($id);
        $relatedProducts = Product::where('id', '!=', $product->id)->latest()->take(4)->get();
        return view('website.layouts.pages.product.product-single-page', compact('product', 'relatedProducts'));
    }

    // Product search

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $suggestions = Product::where('product_name', 'LIKE', '%' . $query . '%')
                ->orWhere('regular_price', 'LIKE', '%' . $query . '%')
                ->limit(5)
                ->get(['id', 'product_name', 'regular_price', 'discount_price', 'discount_type', 'thumbnail']);

            $formattedSuggestions = $suggestions->map(function ($product) {
                $final_price = $product->regular_price;
                $has_discount = false;

                if ($product->discount_price > 0) {
                    if ($product->discount_type === 'percent') {
                        $final_price = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                    } elseif ($product->discount_type === 'flat') {
                        $final_price = $product->regular_price - $product->discount_price;
                    }

                    $has_discount = $final_price < $product->regular_price;
                }

                return [
                    'id' => $product->id,
                    'product_name' => $product->product_name,
                    'regular_price' => $product->regular_price,
                    'discount_price' => $has_discount ? $final_price : null,
                    'final_price' => $has_discount ? $final_price : $product->regular_price,
                    'thumbnail' => $product->thumbnail ? asset($product->thumbnail) : asset('default.jpg'),
                    'url' => route('product_single.page', $product->id),
                ];
            });

            return response()->json(['suggestions' => $formattedSuggestions]);
        }

        return response()->json(['suggestions' => []]);
    }

    // public function priceFilter(Request $request)
    // {
    //     $min = (float) $request->min_price;
    //     $max = (float) $request->max_price;

    //     $products = Product::all()->filter(function ($product) use ($min, $max) {
    //         // Default price is regular
    //         $final_price = $product->regular_price;

    //         // Calculate final price based on discount type
    //         if ($product->discount_price > 0) {
    //             if ($product->discount_type === 'percent') {
    //                 $final_price = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
    //             } elseif ($product->discount_type === 'flat') {
    //                 $final_price = $product->regular_price - $product->discount_price;
    //             }
    //         }

    //         // Filter by final calculated price
    //         return $final_price >= $min && $final_price <= $max;
    //     });

    //     $html = '';
    //     foreach ($products as $product) {
    //         $html .= view('website.layouts.partials.product_shop', compact('product'))->render();
    //     }

    //     return $html;
    // }


    public function getProductsByCategory($id){
        $category = Category::with('products')->findOrFail($id);
        return view('website.layouts.pages.product.category-product', compact('category'));
    }

    public function getProductsByBrand($id){
        $brand = Brand::with('products')->findOrFail($id);
        return view('website.layouts.pages.product.brand-product', compact('brand'));
    }


    public function termsAndCondtion()
    {
        $pageTitle = 'Term & Condition';
        $termsAndCondition = Termscondition::first();
        return view('website.layouts.terms_and_condition', compact('termsAndCondition', 'pageTitle'));
    }

    // Privacy policy page method
    public function privacyPolicyPage()
    {
        $pageTitle = 'Privacy policy';
        $privacyPolicy = Privacypolicy::first();
        return view('website.layouts.privacy_policy', compact('privacyPolicy', 'pageTitle'));
    }

    public function returnRefund()
    {
        $pageTitle = 'Return & Refund';
        $returnRefund = Returnrefund::first();
        return view('website.layouts.return_refund', compact('returnRefund', 'pageTitle'));
    }
}
