<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpdeskController;

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/helpdesk', [HelpdeskController::class,'index'])->name('helpdesk');

Route::post('/helpdesk', [HelpdeskController::class,'salvar'])->name('helpdesk.salvar');

Route::get('/idade', function () {
    return view('projetos.idade');
})->name('idade');

Route::post('/idade', function () {
    return view('projetos.idade');
})->name('idade.salvar');

Route::get('/notas', function () {
    return view('projetos.notas');
})->name('notas');

Route::post('/notas', function () {
    return view('projetos.notas');
})->name('notas.salvar');

Route::get('/jogos', function () {
    return view('projetos.jogos');
})->name('jogos');

Route::post('/jogos', function () {
    return view('projetos.jogos');
})->name('jogos.salvar');

Route::get('/login-jogos', function () {
    return view('projetos.login-jogos');
})->name('login-jogos');

Route::post('/login-jogos', function () {
    return view('projetos.login-jogos');
})->name('login-jogos.salvar');

