<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\principalController::class, 'principal'])->name('site.index')->middleware('log.acesso');
Route::get('/sobre_nos', [\App\Http\Controllers\sobrenosController::class, 'SobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\contatoContrller::class, 'Contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\contatoContrller::class, 'Salvar'])->name('site.contato');
Route::get('/login/{erro?}', [\App\Http\Controllers\loginController::class, 'index'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\loginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function() {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [\App\Http\Controllers\loginController::class, 'sair'])->name('app.sair');
    Route::get('/fornecedor', [\App\Http\Controllers\fornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/listar', [\App\Http\Controllers\fornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [\App\Http\Controllers\fornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [\App\Http\Controllers\fornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [\App\Http\Controllers\fornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}', [\App\Http\Controllers\fornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::post('/fornecedor/editar/{id}', [\App\Http\Controllers\fornecedorController::class, 'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [\App\Http\Controllers\fornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');


    Route::resource('produto', \App\Http\Controllers\produtoController::class);
    Route::resource('produtodetalhe', \App\Http\Controllers\ProdutoDetalheController::class);
    Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
    Route::resource('pedido', \App\Http\Controllers\PedidoController::class);
    Route::get("pedidoproduto/create/{pedido}", [\App\Http\Controllers\PedidoProdutoController::class, 'create'])->name('pedidoproduto.create');
    Route::post("pedidoproduto/store/{pedido}", [\App\Http\Controllers\PedidoProdutoController::class, 'store'])->name('pedidoproduto.store');
    Route::delete('pedidoproduto/destroy/{pedido}/{produto}', [\App\Http\Controllers\PedidoProdutoController::class, 'destroy'])->name("pedidoproduto.destroy");
    // Route::resource('pedidoproduto', \App\Http\Controllers\PedidoProdutoController::class);
});

Route::fallback(function () {
    return 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para a página inicial';
});