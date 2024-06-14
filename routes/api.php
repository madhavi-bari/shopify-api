<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/cities/{country_code}', [PostController::class, 'getCitiesByCountryCode']);
