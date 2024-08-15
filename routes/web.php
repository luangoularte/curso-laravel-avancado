<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobrenos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function (){ return 'login'; })->name('site.login'); 

Route::prefix('/app')->group(function (){
    Route::get('/clintes', function () { return 'Clientes'; })->name('app.clientes');
    Route::get('/fornecedores', function () { return 'Fornecedores'; })->name('app.fornecedores');
    Route::get('/produtos', function () { return 'Produtos'; })->name('app.produtos');
});

Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('rota1');

Route::get('/rota2', function () {
    echo 'Rota2';
})->name('rota2');

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para a página inicial'; 
});