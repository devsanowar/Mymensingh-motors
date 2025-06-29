<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;

Route::get('/get-category-posts/{id}', [BlogController::class, 'getCategoryPosts'])->name('api.category.posts');
