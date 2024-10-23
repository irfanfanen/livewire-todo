<?php

use App\Livewire\Todos;
use Illuminate\Support\Facades\Route;

Route::get('/', Todos::class);