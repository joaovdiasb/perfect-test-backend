<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::match([Request::METHOD_GET, Request::METHOD_POST], '/', 'DashboardController')->name('dashboard');

Route::resources([
    'sale'    => 'SaleController',
    'client'  => 'ClientController',
    'product' => 'ProductController'
], ['except' => ['index', 'show']]);