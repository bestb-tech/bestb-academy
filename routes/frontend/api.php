<?php

use App\Http\Controllers\Backend\API\ContactFormController;

Route::post('contact_form', [ContactFormController::class,'store'])->name('post.contact_form');
