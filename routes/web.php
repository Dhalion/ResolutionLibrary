<?php

use App\Livewire\Page\MainPage\PageMain;
use Illuminate\Support\Facades\Route;

Route::get('/', PageMain::class)
    ->name('home');
