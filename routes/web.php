<?php

use App\Livewire\PageMain;
use Illuminate\Support\Facades\Route;

Route::get('/', PageMain::class)
    ->name('home');
