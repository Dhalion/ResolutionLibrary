<?php

use App\Livewire\Page\Category\CategoryPage;
use App\Livewire\Page\MainPage\PageMain;
use Illuminate\Support\Facades\Route;



Route::get('/category/{category}', CategoryPage::class)
    ->name('page.category');

Route::get('/', PageMain::class)
    ->name('page.main');
