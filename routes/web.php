<?php

use App\Http\Controllers\CardController;
use Illuminate\Support\Facades\Route;

Route::get("/", [CardController::class, "index"]);

Route::prefix("card")->group(function () {
  Route::post("/", [CardController::class, "store"])->name("card.show");
  Route::get("/{card}/edit", [CardController::class, "edit"])->name("card.edit");
  Route::post("/{card}", [CardController::class, "update"])->name("card.update");
  Route::get("/{card}/destroy", [CardController::class, "destroy"])->name("card.destroy");
});