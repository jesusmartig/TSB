<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\CivilResponsabilityPolicies\CivilResponsabilityPoliciesController;
use App\Http\Controllers\Dashboard\Client\ClientController;
use App\Http\Controllers\Dashboard\Drivers\DriversController;
use App\Http\Controllers\Dashboard\Mechanicaltechnicalreview\MechanicaltechnicalreviewController;
use App\Http\Controllers\Dashboard\OperationCard\OperationCardController;
use App\Http\Controllers\Dashboard\Soatpolicy\SoatpolicyController;
use App\Http\Controllers\Dashboard\TransportCompany\TransportCompanyController;
use App\Http\Controllers\Dashboard\Vehicles\VehiclesController;
use App\Http\Controllers\Helpers\Activity\ActivityController;
use App\Http\Controllers\Helpers\Banks\BanksController;
use App\Http\Controllers\Helpers\Brands\BrandsController;
use App\Http\Controllers\Helpers\Cities\CitiesController;
use App\Http\Controllers\Helpers\Departments\DepartmentsController;
use App\Http\Controllers\Helpers\Files\FilesController;
use App\Http\Controllers\Helpers\TypeDocuments\TypeDocumentsController;
use App\Http\Controllers\Helpers\TypeFile\TypeFileController;
use App\Http\Controllers\Helpers\TypesSociety\TypesSocietyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('authenticate/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('authenticate/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('helpers/departments', [DepartmentsController::class, 'index'])->name('departments.index');
    Route::get('helpers/departments/show/{departments}', [DepartmentsController::class, 'show'])->name('departments.show');

    Route::get('helpers/cities', [CitiesController::class, 'index'])->name('cities.index');
    Route::get('helpers/cities/show/{cities}', [CitiesController::class, 'show'])->name('cities.show');
    Route::get('helpers/cities/show/cities/{cities}', [CitiesController::class, 'showCities'])->name('cities.cities');
    Route::get('helpers/cities/show/department/{department}', [CitiesController::class, 'department'])->name('cities.department');

    Route::get('helpers/types-society', [TypesSocietyController::class, 'index'])->name('types.society.index');
    Route::get('helpers/types-society/show/{typessociety}', [TypesSocietyController::class, 'show'])->name('types.society.show');

    Route::get('helpers/activities', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('helpers/activities/show/{activities}', [ActivityController::class, 'show'])->name('activity.show');

    Route::get('helpers/type-documents', [TypeDocumentsController::class, 'index'])->name('type-documents.index');
    Route::get('helpers/type-documents/show/{typeDocuments}', [TypeDocumentsController::class, 'show'])->name('type-documents.show');

    /* Rutas para el Helpers */
    Route::get('dashboard/transport-companies', [TransportCompanyController::class, 'index'])->name('transportCompany.index');
    Route::post('dashboard/transport-companies/store', [TransportCompanyController::class, 'store'])->name('transportCompany.store');
    Route::get('dashboard/transport-companies/show/{transport}', [TransportCompanyController::class, 'show'])->name('transportCompany.show');
    Route::patch('dashboard/transport-companies/update/{transport}', [TransportCompanyController::class, 'update'])->name('transportCompany.update');
    Route::delete('dashboard/transport-companies/{transport}', [TransportCompanyController::class, 'destroy'])->name('transportCompany.destroy');

    Route::get('dashboard/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::post('dashboard/client/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('dashboard/client/show/{transport}', [ClientController::class, 'show'])->name('clients.show');
    Route::patch('dashboard/client/update/{transport}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('dashboard/client/{transport}', [ClientController::class, 'destroy'])->name('clients.destroy');

    Route::get('dashboard/vehicles', [VehiclesController::class, 'index'])->name('vehicles.index');
    Route::post('dashboard/vehicle/store', [VehiclesController::class, 'store'])->name('vehicles.store');
    Route::get('dashboard/vehicle/show/{id}', [VehiclesController::class, 'show'])->name('vehicles.show');
    Route::patch('dashboard/vehicle/update/{id}', [VehiclesController::class, 'update'])->name('vehicles.update');
    Route::delete('dashboard/vehicle/{id}', [VehiclesController::class, 'destroy'])->name('vehicles.destroy');

    Route::get('dashboard/soat-policy', [SoatpolicyController::class, 'index'])->name('soat.index');
    Route::post('dashboard/soat-policy/store', [SoatpolicyController::class, 'store'])->name('soat.store');
    Route::get('dashboard/soat-policy/show/{id}', [SoatpolicyController::class, 'show'])->name('soat.show');
    Route::patch('dashboard/soat-policy/update/{id}', [SoatpolicyController::class, 'update'])->name('soat.update');
    Route::delete('dashboard/soat-policy/{id}', [SoatpolicyController::class, 'destroy'])->name('soat.destroy');

    /* Rutas para civil responsability policies*/
    Route::get('dashboard/civilresponsabilitypolicies', [CivilResponsabilityPoliciesController::class, 'index'])->name('civilresponsabilitypolicies.index');
    Route::post('dashboard/civilresponsabilitypolicies/store', [CivilResponsabilityPoliciesController::class, 'store'])->name('civilresponsabilitypolicies.store');
    Route::get('dashboard/civilresponsabilitypolicies/show/{id}', [CivilResponsabilityPoliciesController::class, 'show'])->name('civilresponsabilitypolicies.show');
    Route::patch('dashboard/civilresponsabilitypolicies/update/{id}', [CivilResponsabilityPoliciesController::class, 'update'])->name('civilresponsabilitypolicies.update');
    Route::delete('dashboard/civilresponsabilitypolicies/destroy/{id}', [CivilResponsabilityPoliciesController::class, 'destroy'])->name('civilresponsabilitypolicies.destroy');

    /* Rutas para technomechanical review*/
    Route::get('dashboard/mechanical-technical-review', [MechanicaltechnicalreviewController::class, 'index'])->name('rtm.index');
    Route::post('dashboard/mechanical-technical-review/store', [MechanicaltechnicalreviewController::class, 'store'])->name('rtm.store');
    Route::get('dashboard/mechanical-technical-review/show/{id}', [MechanicaltechnicalreviewController::class, 'show'])->name('rtm.show');
    Route::patch('dashboard/mechanical-technical-review/update/{id}', [MechanicaltechnicalreviewController::class, 'update'])->name('rtm.update');
    Route::delete('dashboard/mechanical-technical-review/destroy/{id}', [MechanicaltechnicalreviewController::class, 'destroy'])->name('rtm.destroy');


    /* Rutas para civil responsability policies*/
    Route::get('dashboard/operationcard', [OperationCardController::class, 'index'])->name('operationcard.index');
    Route::post('dashboard/operationcard/store', [OperationCardController::class, 'store'])->name('operationcard.store');
    Route::get('dashboard/operationcard/show/{id}', [OperationCardController::class, 'show'])->name('operationcard.show');
    Route::patch('dashboard/operationcard/update/{id}', [OperationCardController::class, 'update'])->name('operationcard.update');
    Route::delete('dashboard/operationcard/destroy/{id}', [OperationCardController::class, 'destroy'])->name('operationcard.destroy');

    /* Rutas para preoperative */
    Route::get('dashboard/preoperative', [OperationCardController::class, 'index'])->name('preoperative.index');
    Route::post('dashboard/preoperative/store', [OperationCardController::class, 'store'])->name('preoperative.store');
    Route::get('dashboard/preoperative/show/{id}', [OperationCardController::class, 'show'])->name('preoperative.show');
    Route::patch('dashboard/preoperative/update/{id}', [OperationCardController::class, 'update'])->name('preoperative.update');
    Route::delete('dashboard/preoperative/destroy/{id}', [OperationCardController::class, 'destroy'])->name('preoperative.destroy');

    /* Rutas para drivers */
    Route::get('dashboard/drivers', [DriversController::class, 'index'])->name('drivers.index');
    Route::post('dashboard/drivers/store', [DriversController::class, 'store'])->name('drivers.store');
    Route::get('dashboard/drivers/show/{id}', [DriversController::class, 'show'])->name('drivers.show');
    Route::patch('dashboard/drivers/update/{id}', [DriversController::class, 'update'])->name('drivers.update');
    Route::delete('dashboard/drivers/destroy/{id}', [DriversController::class, 'destroy'])->name('drivers.destroy');

    /* Rutas para drivers */
    Route::get('dashboard/social-security', [DriversController::class, 'index'])->name('socialsecurity.index');
    Route::post('dashboard/social-security/store', [DriversController::class, 'store'])->name('socialsecurity.store');
    Route::get('dashboard/social-security/show/{id}', [DriversController::class, 'show'])->name('socialsecurity.show');
    Route::patch('dashboard/social-security/update/{id}', [DriversController::class, 'update'])->name('socialsecurity.update');
    Route::delete('dashboard/social-security/destroy/{id}', [DriversController::class, 'destroy'])->name('socialsecurity.destroy');
});

/* Rutas para el Helpers */

Route::post('helpers/upload', [FilesController::class, 'upload'])->name('files.upload');


Route::get('helpers/banks', [BanksController::class, 'index'])->name('banks.index');
Route::get('helpers/banks/show/{banks}', [BanksController::class, 'show'])->name('banks.show');

Route::get('helpers/brands', [BrandsController::class, 'index'])->name('brands.index');
Route::get('helpers/brands/show/{brands}', [BrandsController::class, 'show'])->name('brands.show');

Route::get('helpers/type-file', [TypeFileController::class, 'index'])->name('type-file.index');
Route::get('helpers/type-file/show/{typefile}', [TypeFileController::class, 'show'])->name('type-file.show');
