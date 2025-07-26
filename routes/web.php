<?php

use App\Livewire\Page\Category\CategoryPage;
use App\Livewire\Page\MainPage\PageMain;
use Illuminate\Support\Facades\Route;




use App\Livewire\Page\Resolution\ResolutionPage;

Route::get('/category/{category}', CategoryPage::class)
    ->name('page.category');

Route::get('/resolution/{resolution}', ResolutionPage::class)
    ->name('page.resolution');

Route::get('/', PageMain::class)
    ->name('page.main');
