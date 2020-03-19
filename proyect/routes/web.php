<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Product;

Route::middleware('auth')->group(function(){

Route::get('products', function(){

	$products = Product::orderBy('created_at', 'desc')->get();

	return view('products.index', compact('products'));
})->name('products.index');

Route::get('products/create', function(){
	return view('products.create');
})->name('products.create');

Route::post('products', function(Request $request){
	
	$newProduct = new Product;
	$newProduct->description = $request->input('description');
	$newProduct->price = $request->input('price');
	$newProduct->save();

	return redirect()->route('products.index')->with('info', 'Producto creado exitosamente');

})->name('products.store');

Route::delete('products/{id}', function($id ){
	$product = Product::findOrFail($id);
	$product->delete();
	return redirect()->route('products.index')->with('info', 'Producto eliminado exitosamente');
	//return $id;
})->name('products.distroy');

Route::get('products/{id}/edit', function($id){
	$product = Product::findOrFail($id);
	return view('products.edit', compact('product'));
})->name('products.edit');

Route::put('products/{id}', function(Request $request, $id){
	$product = Product::findOrFail($id);
	$product->description= $request->input('description');
	$product->price= $request->input('price');
	$product->save();
	return redirect()->route('products.index')->with('info', 'Producto Actualizado exitosamente');
})->name('products.update');
});


Route::get('lista','PagesController@lista');

Route::get('/','PagesController@index')->name('indice');

Route::get('/detalle/{id}','PagesController@detalle')->name('notas.detalle');

Route::post('nota/crear', 'PagesController@crear')->name('notas.crear');

Route::get('editar/{id}','PagesController@editar')->name('notas.editar');

Route::put('editar/{id}', 'PagesController@update')->name('notas.update');

Route::delete('eliminar/{id}','PagesController@eliminar')->name('notas.eliminar');

Route::get('uno','PagesController@inicio')->name('uno');

Route::get('fotos','PagesController@fotos')->name('foto');

Route::get('nosotros/{nombre?}','PagesController@nosotros')->name('nosotros');





Auth::routes();

