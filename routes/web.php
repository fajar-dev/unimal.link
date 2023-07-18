<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'LinksController@create')->name('index');
Route::post('/links', 'LinksController@store')->name('link');
Route::get('/links/{link}', 'LinksController@show')->name('link_show');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::get('/settings', 'DashboardController@settings')->name('setting')->middleware('auth');
Route::post('/update-profile', 'DashboardController@updateProfile')->name('update_profile')->middleware('auth');
Route::post('/generate-token', 'DashboardController@generateToken')->name('generate_token')->middleware('auth');

Route::get('/admin/links', 'AdminController@links')->middleware('admin');
Route::get('/admin/users', 'AdminController@users')->middleware('admin');

Route::get('/{hash}', 'LinksController@process');
