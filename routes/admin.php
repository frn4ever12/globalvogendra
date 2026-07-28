<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroBannerController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PageFaqController;
use App\Http\Controllers\Admin\PageSectionController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SubMenuController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UniversityController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('site/setting',[SiteSettingController::class,'setting'])->name('site.setting');
Route::put('site/setting/{setting}',[SiteSettingController::class,'settingUpdate'])->name('site.setting.update');

Route::get('about-us',[AboutUsController::class,'show'])->name('about-us.show');
Route::get('about-us/edit',[AboutUsController::class,'edit'])->name('about-us.edit');
Route::put('about-us/update',[AboutUsController::class,'update'])->name('about-us.update');

Route::resource('hero-banner',HeroBannerController::class);
Route::resource('service',ServiceController::class);
Route::resource('program',ProgramController::class);
Route::resource('country',CountryController::class);
Route::resource('course',CourseController::class);
Route::resource('university',UniversityController::class);
Route::resource('faqs',FaqsController::class);
Route::resource('team',TeamController::class);
Route::resource('appointment',AppointmentController::class);
Route::resource('event',EventController::class);
Route::resource('menu',MenuController::class);
Route::resource('submenu',SubMenuController::class);
Route::resource('page',PageController::class);

// AJAX routes for Gallery
Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
Route::put('gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
Route::delete('gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

// AJAX routes for Page FAQs
Route::post('page-faq', [PageFaqController::class, 'store'])->name('page-faq.store');
Route::put('page-faq/{faq}', [PageFaqController::class, 'update'])->name('page-faq.update');
Route::delete('page-faq/{faq}', [PageFaqController::class, 'destroy'])->name('page-faq.destroy');

// AJAX routes for Page Sections
Route::post('page-section', [PageSectionController::class, 'store'])->name('page-section.store');
Route::put('page-section/{section}', [PageSectionController::class, 'update'])->name('page-section.update');
Route::delete('page-section/{section}', [PageSectionController::class, 'destroy'])->name('page-section.destroy');
Route::post('page-section/{section}/duplicate', [PageSectionController::class, 'duplicate'])->name('page-section.duplicate');
Route::post('page-section/reorder', [PageSectionController::class, 'reorder'])->name('page-section.reorder');

// AJAX routes for Hero Banners
Route::post('hero-banner/reorder', [HeroBannerController::class, 'reorder'])->name('hero-banner.reorder');

// AJAX routes for Services
Route::post('service/reorder', [ServiceController::class, 'reorder'])->name('service.reorder');
Route::post('service/{service}/duplicate', [ServiceController::class, 'duplicate'])->name('service.duplicate');
Route::post('service/{service}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('service.toggle-status');

});