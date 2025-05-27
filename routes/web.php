<?php

use App\Http\Controllers\TaiwanStockExchangeController;
use Illuminate\Support\Facades\Route;

Route::get('stock/twse/show/', [TaiwanStockExchangeController::class, 'show']);
