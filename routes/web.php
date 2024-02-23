<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\src\controller\AdminController;
use App\Http\Controllers\src\controller\ProfessorController;
use App\Http\Controllers\src\controller\ResearcherController;
use App\Http\Controllers\src\PublishResearchController;
use App\Http\Controllers\src\ResearchProjectController;
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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminIndex'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
});

Route::middleware(['auth', 'role:professor'])->group(function () {
    Route::get('/professor/dashboard', [ProfessorController::class, 'professorIndex'])->name('professor.dashboard');
    Route::get('/professor/logout', [ProfessorController::class, 'professorLogout'])->name('professor.logout');
});

Route::middleware(['auth', 'role:researcher'])->group(function () {
    Route::get('/dashboard', [ResearcherController::class, 'researcherIndex'])->name('researcher.dashboard');
    Route::get('/profile', [ResearcherController::class, 'researcherProfile'])->name('researcher.profile');
    Route::get('/logout', [ResearcherController::class, 'researcherLogout'])->name('researcher.logout');

    // Research Project
    Route::get('/projects', [ResearchProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ResearchProjectController::class, 'store'])->name('projects.store');
    Route::post('/projects/{project}/add-collaborators', [ResearchProjectController::class, 'addCollaborators'])->name('projects.addCollaborators');
    Route::get('/projects/{project}/removeCollaborator/{collaborator}', [ResearchProjectController::class, 'removeCollaborator'])->name('projects.removeCollaborator');
    Route::put('/projects/{project}', [ResearchProjectController::class, 'update'])->name('projects.update');


    // Publish Research
    Route::get('/publish', [PublishResearchController::class, 'index'])->name('publish.index');
    Route::post('/publish', [PublishResearchController::class, 'store'])->name('publish.store');
});



require __DIR__ . '/auth.php';
