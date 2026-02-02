<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use OpenAI\Laravel\Facades\OpenAI;
Route::get('/', function () {
    return view('productViews.formAddProduct');
});

Route::get('/test-groq', function () {
    $response = OpenAI::chat()->create([
        'model' => 'openai/gpt-oss-20b',
        'messages' => [
            ['role' => 'user', 'content' => 'generate a description for flowers'],
        ],
    ]);
    return $response->choices[0]->message->content;
});
Route::get('/ai/description/{name}', [ProductController::class, 'generateDescription'])->name('ai.description');
Route::get('/products',[ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/products/filter/{id}', [ProductController::class, 'filter'])->name('product.filter');







