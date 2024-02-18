<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\src\controller\AdminController;
use App\Http\Controllers\src\controller\ProfessorController;
use App\Http\Controllers\src\controller\ResearcherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminIndex'])->name('admin.dashboard');
});

Route::middleware(['auth', 'verified', 'role:professor'])->group(function () {
    Route::get('/professor/dashboard', [ProfessorController::class, 'professorIndex'])->name('professor.dashboard');
});

Route::middleware(['auth', 'verified', 'role:researcher'])->group(function () {
    Route::get('/dashboard', [ResearcherController::class, 'researcherIndex'])->name('researcher.dashboard');
    Route::get('/profile', [ResearcherController::class, 'researcherProfile'])->name('researcher.profile');
    Route::get('/logout', [ResearcherController::class, 'researcherLogout'])->name('researcher.logout');
});

require __DIR__ . '/auth.php';
