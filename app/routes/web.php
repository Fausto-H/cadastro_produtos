<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Aqui você pode registrar as rotas web para sua aplicação. Estas 
| rotas são carregadas pelo RouteServiceProvider e todas serão 
| atribuídas ao grupo de middleware "web".
|
*/

// Página principal de produtos - lista os produtos cadastrados
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');

// Página de criação de um novo produto
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');

// Armazena o novo produto no banco de dados
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

// Página para editar um produto específico
Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');

// Atualiza os dados de um produto específico
Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update');
