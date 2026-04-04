<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AlbumController::class, "getAlbumListPage"])
    ->name("home");

Route::get("/edit", [AlbumController::class, "getEditPage"])
    ->name("edit_page")
    ->middleware("auth");

Route::post("/album/add", [AlbumController::class, "addAlbum"])
    ->name("add_album")
    ->middleware("auth");

Route::post("/album/delete/{id}", [AlbumController::class, "deleteAlbum"])
    ->name("delete_album")
    ->middleware("auth");

// auth routes
Route::get("/login", [AuthController::class, "getLoginPage"])
    ->name("login_page")
    ->middleware("guest");

Route::post("/login", [AuthController::class, "login"])
    ->name("login")
    ->middleware("guest");

Route::get("/sign-up", [AuthController::class, "getSignUpPage"])
    ->name("sign_up_page")
    ->middleware("guest");

Route::post("/sign-up", [AuthController::class, "signup"])
    ->name("sign_up")
    ->middleware("guest");

Route::get("/logout", [AuthController::class, "logout"])
    ->name("logout")
    ->middleware("auth");
