<?php

use App\Livewire\Course\CreateEdit as CourseCreateEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/dev', function () {
    return view('pages.dev');
})->name('dev');

// admin has been included to create a more realistic nested route prefix
Route::prefix('admin')->name('admin')->group(function () {
    Route::get('/courses/{course}/edit', CourseCreateEdit::class)->name('.course.edit');
    Route::get('/courses/create', CourseCreateEdit::class)->name('.course.create');
});
