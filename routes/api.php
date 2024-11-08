<?php

use App\Http\Controllers\InstallationType\InstallationTypeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Equipment\EquipmentController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'OK';
});

Route::resources([
    'customers' => CustomerController::class,
    'projects' => ProjectController::class,
    'installationTypes' => InstallationTypeController::class,
    'equipments' => EquipmentController::class
]);

Route::prefix('projects')->group(function() {
    Route::post('{projectId}/equipment', [ProjectController::class, 'storeEquipment']);
    Route::put('{projectId}/equipment/{equipamentId}', [ProjectController::class, 'updateEquipment']);
    Route::delete('{projectId}/equipment/{equipamentId}', [ProjectController::class, 'destroyEquipment']);
});