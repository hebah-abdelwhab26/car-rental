<?php

use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get("/category/all",[CategoryController::class,"index"]);
Route::get("/category/show/{id}",[CategoryController::class,"show"]);
Route::post("/category/delete",[CategoryController::class,"delete"]);
Route::post("/category/store",[CategoryController::class,"store"]);
Route::post("/category/update", [CategoryController::class, "update"]);
?>
