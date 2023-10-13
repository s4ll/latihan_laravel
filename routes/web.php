<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//prefix: awalan, semua path url yang ada di dalam group nya nanti ketika diakses harus terlebih dahulu diawali dengan path prefix
//name : awalan value name route yg ada di dalam group
//group : mengelompokkan route yang memiliki akses data modifikasi yg sama
Route::prefix('medicine/')->name('medicine.')->group(function(){
    //ketika path/medicine/create diakses, akan ditangani oleh MedicineController bagian func create, kemudia jika ingin menggunakan route ini di kode dipanggil melalui medicine.create
    Route::get('create' , [MedicineController::class, 'create'])->name('create') ;
    Route::post('store' , [MedicineController::class, 'store'])->name('store');
    Route::get('data' , [MedicineController::class, 'index'])->name('index');

    // path yg ada tanda{} nya disebut dengan path parameter/path dimulai yg isinya bakal berubah2 tergantung apa yg mau diambil(mengambil data spesifik), dan ketika pemanggilan name routenya, path parameter ini wajib diisi
    Route::get('edit/{id}' , [MedicineController::class, 'edit'])->name('edit');
    Route::patch('update/{id}' , [MedicineController::class, 'update'])->name('update');
    Route::delete('delete/{id}' , [MedicineController::class, 'destroy'])->name('delete');
    Route::get('stock' , [MedicineController::class, 'stockData'])->name('stock');
    Route::get('{id}' , [MedicineController::class, 'show'])->name('show');
    Route::patch('update/stock/{id}', [MedicineController::class, 'updateStock'])->name('stock.update') ;
});

