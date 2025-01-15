<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\supervisionController;
use App\Http\Controllers\Dashboard\ActivityController;
use App\Http\Controllers\Dashboard\geralControllerr;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\SupplierController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PaySalaryController;
use App\Http\Controllers\Dashboard\AttendenceController;
use App\Http\Controllers\Dashboard\AdvanceSalaryController;
use App\Http\Controllers\Dashboard\DatabaseBackupController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\PosController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// DEFAULT DASHBOARD & PROFILE
Route::middleware('auth')->group(function () {
  // Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
   Route::get('/', [DashboardController::class, 'dashboardComGrafico'])->middleware(['auth'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');

});

// ====== USERS ======
Route::middleware(['permission:user.menu'])->group(function () {
    Route::resource('/users', UserController::class)->except(['show']);
});

// ====== CUSTOMERS ======
Route::middleware(['permission:customer.menu'])->group(function () {
    Route::resource('/customers', CustomerController::class);
});

// ====== SUPPLIERS ======
Route::middleware(['permission:supplier.menu'])->group(function () {
    Route::resource('/suppliers', SupplierController::class);
});

// ====== EMPLOYEES ======
Route::middleware(['permission:employee.menu'])->group(function () {
    Route::resource('/employees', EmployeeController::class);
});

// ====== EMPLOYEE ATTENDENCE ======
Route::middleware(['permission:attendence.menu'])->group(function () {
    Route::resource('/employee/attendence', AttendenceController::class)->except(['show', 'update', 'destroy']);
});

// ====== SALARY EMPLOYEE ======
Route::middleware(['permission:salary.menu'])->group(function () {
    // PaySalary
    Route::resource('/pay-salary', PaySalaryController::class)->except(['show', 'create', 'edit', 'update']);
    Route::get('/pay-salary/history', [PaySalaryController::class, 'payHistory'])->name('pay-salary.payHistory');
    Route::get('/pay-salary/history/{id}', [PaySalaryController::class, 'payHistoryDetail'])->name('pay-salary.payHistoryDetail');
    Route::get('/pay-salary/{id}', [PaySalaryController::class, 'paySalary'])->name('pay-salary.paySalary');

    // Advance Salary
    Route::resource('/advance-salary', AdvanceSalaryController::class)->except(['show']);
});

// ====== PRODUCTS ======
Route::middleware(['permission:product.menu'])->group(function () {
    Route::get('/products/import', [ProductController::class, 'importView'])->name('products.importView');
    Route::post('/products/import', [ProductController::class, 'importStore'])->name('products.importStore');
    Route::get('/products/export', [ProductController::class, 'exportData'])->name('products.exportData');
    Route::resource('/products', ProductController::class);
});

// ====== ACTIVITIES ======
Route::middleware(['permission:product.menu'])->group(function () {
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities-create', [ActivityController::class, 'create'])->name('activities.create');
    Route::delete('/activities-delete-dash/{activity}/{id}', [ActivityController::class, 'destroy'])->name('dash.activities.destroy');
 
    //== Dashboard ==
    Route::delete('/activities-delete-dash/{id}', [DashboardController::class, 'destroy'])->name('dash.destroy');
    Route::put('/activities-edit-dash/{id}', [DashboardController::class, 'edit'])->name('dash.edit');

   
    Route::post('/activities-store', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities-details/{id}', [ActivityController::class, 'show'])->name('activities.show');
    Route::get('/activities-update/{id}', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/activities-updated/{id}', [ActivityController::class, 'update'])->name('activities.update');
    Route::put('/role/{id}', [RoleController::class, 'roleUpdate'])->name('role.update');    
    Route::delete('/activities-delete/{id}', [ActivityController::class, 'destroy'])->name('activities.destroy');


    Route::get('/activites-export', [ActivityController::class, 'exportData'])->name('activites.exportData');
    Route::resource('/activities', ActivityController::class);

});

// ====== CATEGORY PRODUCTS ======
Route::middleware(['permission:category.menu'])->group(function () {
    Route::resource('/categories', CategoryController::class);
});

// ====== POS ======
Route::middleware(['permission:pos.menu'])->group(function () {
    Route::get('/pos', [PosController::class,'index'])->name('pos.index');
    Route::post('/pos/add', [PosController::class, 'addCart'])->name('pos.addCart');
    Route::post('/pos/update/{rowId}', [PosController::class, 'updateCart'])->name('pos.updateCart');
    Route::get('/pos/delete/{rowId}', [PosController::class, 'deleteCart'])->name('pos.deleteCart');
    Route::post('/pos/invoice/create', [PosController::class, 'createInvoice'])->name('pos.createInvoice');
    Route::post('/pos/invoice/print', [PosController::class, 'printInvoice'])->name('pos.printInvoice');

    // Create Order
    Route::post('/pos/order', [OrderController::class, 'storeOrder'])->name('pos.storeOrder');
});

// ====== Monitoria ======
Route::middleware(['permission:monitoria.menu'])->group(function () {
    Route::get('/geral', [ActivityController::class, 'index'])->name('geral.index');
    Route::get('/geral-rescheduled', [ActivityController::class, 'rescheduled'])->name('geral-rescheduled');
    Route::get('/geral-completed', [ActivityController::class, 'complete'])->name('geral-completed');
    Route::get('/geral-pending', [ActivityController::class, 'pending'])->name('geral-pending');
    Route::get('/activites/export', [ActivityController::class, 'exportData'])->name('activites.exportData');
    Route::resource('/geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== ATS ======
Route::middleware(['permission:ats.menu'])->group(function () {
    Route::get('/ats-geral', [ActivityController::class, 'index'])->name('ats.geral.index');
    Route::get('/ats-geral-rescheduled', [ActivityController::class, 'ats-rescheduled'])->name('ats.geral-rescheduled');
    Route::get('/ats-geral-completed', [ActivityController::class, 'ats-complete'])->name('ats.geral-completed');
    Route::get('/ats-geral-pending', [ActivityController::class, 'ats-pending'])->name('ats.geral-pending');
    Route::get('/ats-activites/export', [ActivityController::class, 'ats-exportData'])->name('ats.activites.exportData');
    Route::resource('/ats-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== SMI ======
Route::middleware(['permission:smi.menu'])->group(function () {
    Route::get('/smi-geral', [ActivityController::class, 'index'])->name('smi.geral.index');
    Route::get('/smi-geral-rescheduled', [ActivityController::class, 'smi-rescheduled'])->name('smi.geral-rescheduled');
    Route::get('/smi-geral-completed', [ActivityController::class, 'smi-complete'])->name('smi.geral-completed');
    Route::get('/smi-geral-pending', [ActivityController::class, 'smi-pending'])->name('smi.geral-pending');
    Route::get('/smi-activites/export', [ActivityController::class, 'smi-exportData'])->name('smi.activites.exportData');
    Route::resource('/smi-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== SMI ======
Route::middleware(['permission:smi.menu'])->group(function () {
    Route::get('/smi-geral', [ActivityController::class, 'index'])->name('smi.geral.index');
    Route::get('/smi-geral-rescheduled', [ActivityController::class, 'smi-rescheduled'])->name('smi.geral-rescheduled');
    Route::get('/smi-geral-completed', [ActivityController::class, 'smi-complete'])->name('smi.geral-completed');
    Route::get('/smi-geral-pending', [ActivityController::class, 'smi-pending'])->name('smi.geral-pending');
    Route::get('/smi-activites/export', [ActivityController::class, 'smi-exportData'])->name('smi.activites.exportData');
    Route::resource('/smi-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
}); 

// ====== TB ======
Route::middleware(['permission:tb.menu'])->group(function () {
    Route::get('/tb-geral', [ActivityController::class, 'index'])->name('ec.geral.index');
    Route::get('/tb-geral-rescheduled', [ActivityController::class, 'ec-rescheduled'])->name('ec.geral-rescheduled');
    Route::get('/tb-geral-completed', [ActivityController::class, 'ec-complete'])->name('ec.geral-completed');
    Route::get('/tb-geral-pending', [ActivityController::class, 'ec-pending'])->name('ec.geral-pending');
    Route::get('/tb-activites/export', [ActivityController::class, 'ec-exportData'])->name('ec.activites.exportData');
    Route::resource('/tb-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== EC ======
Route::middleware(['permission:ec.menu'])->group(function () {
    Route::get('/ec-geral', [ActivityController::class, 'index'])->name('ec.geral.index');
    Route::get('/ec-geral-rescheduled', [ActivityController::class, 'ec-rescheduled'])->name('ec.geral-rescheduled');
    Route::get('/ec-geral-completed', [ActivityController::class, 'ec-complete'])->name('ec.geral-completed');
    Route::get('/ec-geral-pending', [ActivityController::class, 'ec-pending'])->name('ec.geral-pending');
    Route::get('/ec-activites/export', [ActivityController::class, 'ec-exportData'])->name('ec.activites.exportData');
    Route::resource('/ec-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== Administração ======
Route::middleware(['permission:admin.menu'])->group(function () {
    Route::get('/admin-geral', [ActivityController::class, 'index'])->name('admin.geral.index');
    Route::get('/admin-geral-rescheduled', [ActivityController::class, 'admin-rescheduled'])->name('admin.geral-rescheduled');
    Route::get('/admin-geral-completed', [ActivityController::class, 'admin-complete'])->name('admin.geral-completed');
    Route::get('/admin-geral-pending', [ActivityController::class, 'admin-pending'])->name('admin.geral-pending');
    Route::get('/admin-activites/export', [ActivityController::class, 'admin-exportData'])->name('admin.activites.exportData');
    Route::resource('/ec-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== CT ======
Route::middleware(['permission:ct.menu'])->group(function () {
    Route::get('/ct-geral', [ActivityController::class, 'index'])->name('ct.geral.index');
    Route::get('/ct-geral-rescheduled', [ActivityController::class, 'ct-rescheduled'])->name('ct.geral-rescheduled');
    Route::get('/ct-geral-completed', [ActivityController::class, 'ct-complete'])->name('ct.geral-completed');
    Route::get('/ct-geral-pending', [ActivityController::class, 'ct-pending'])->name('ct.geral-pending');
    Route::get('/ct-activites/export', [ActivityController::class, 'ct-exportData'])->name('ct.activites.exportData');
    Route::resource('/ct-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== RH ======
Route::middleware(['permission:rh.menu'])->group(function () {
    Route::get('/rh-geral', [ActivityController::class, 'index'])->name('rh.geral.index');
    Route::get('/rh-geral-rescheduled', [ActivityController::class, 'rh-rescheduled'])->name('rh.geral-rescheduled');
    Route::get('/rh-geral-completed', [ActivityController::class, 'rh-complete'])->name('rh.geral-completed');
    Route::get('/rh-geral-pending', [ActivityController::class, 'rh-pending'])->name('rh.geral-pending');
    Route::get('/rh-activites/export', [ActivityController::class, 'rh-exportData'])->name('rh.activites.exportData');
    Route::resource('/rh-geral', ActivityController::class);
    
    
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');
    
    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== Contabilidade ======
Route::middleware(['permission:contabilidade.menu'])->group(function () {
    Route::get('/contabilidade-geral', [ActivityController::class, 'index'])->name('contabilidade.geral.index');
    Route::get('/contabilidade-geral-rescheduled', [ActivityController::class, 'contabilidade-rescheduled'])->name('contabilidade.geral-rescheduled');
    Route::get('/contabilidade-geral-completed', [ActivityController::class, 'contabilidade-complete'])->name('contabilidade.geral-completed');
    Route::get('/contabilidadei-geral-pending', [ActivityController::class, 'contabilidade-pending'])->name('contabilidade.geral-pending');
    Route::get('/contabilidade-activites/export', [ActivityController::class, 'contabilidade-exportData'])->name('contabilidade.activites.exportData');
    Route::resource('/contabilidade-geral', ActivityController::class);
    
   
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});


// ====== Supervision ======
Route::middleware(['permission:supervision.menu'])->group(function () {
    Route::get('/supervision-show', [supervisionController::class, 'index'])->name('supervision.geral');
    Route::get('/supervision-create', [supervisionController::class, 'create'])->name('supervision.create');
    Route::post('/supervision-store', [SupervisionController::class, 'store'])->name('supervision.store');
    Route::resource('/contabilidade-geral', supervisionController::class);
    
    
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
});

// ====== SMI ======
Route::middleware(['permission:smi.menu'])->group(function () {
    Route::get('/smi-geral', [ActivityController::class, 'index'])->name('smi.geral.index');
    Route::get('/smi-geral-rescheduled', [ActivityController::class, 'smi-rescheduled'])->name('smi.geral-rescheduled');
    Route::get('/smi-geral-completed', [ActivityController::class, 'smi-complete'])->name('smi.geral-completed');
    Route::get('/smi-geral-pending', [ActivityController::class, 'smi-pending'])->name('smi.geral-pending');
    Route::get('/smi-activites/export', [ActivityController::class, 'smi-exportData'])->name('smi.activites.exportData');
    Route::resource('/smi-geral', ActivityController::class);
       
    // Pending Due
    Route::get('/pending/due', [OrderController::class, 'pendingDue'])->name('order.pendingDue');
    Route::get('/order/due/{id}', [OrderController::class, 'orderDueAjax'])->name('order.orderDueAjax');
    Route::post('/update/due', [OrderController::class, 'updateDue'])->name('order.updateDue');

    // Stock Management
    Route::get('/stock', [OrderController::class, 'stockManage'])->name('order.stockManage');
    
});
// ====== DATABASE BACKUP ======
Route::middleware(['permission:database.menu'])->group(function () {
    Route::get('/database/backup', [DatabaseBackupController::class, 'index'])->name('backup.index');
    Route::get('/database/backup/now', [DatabaseBackupController::class, 'create'])->name('backup.create');
    Route::get('/database/backup/download/{getFileName}', [DatabaseBackupController::class, 'download'])->name('backup.download');
    Route::get('/database/backup/delete/{getFileName}', [DatabaseBackupController::class, 'delete'])->name('backup.delete');
});

// ====== ROLE CONTROLLER ======
Route::middleware(['permission:roles.menu'])->group(function () {
    // Permissions
    Route::get('/permission', [RoleController::class, 'permissionIndex'])->name('permission.index');
    Route::get('/permission/create', [RoleController::class, 'permissionCreate'])->name('permission.create');
    Route::post('/permission', [RoleController::class, 'permissionStore'])->name('permission.store');
    Route::get('/permission/edit/{id}', [RoleController::class, 'permissionEdit'])->name('permission.edit');
    Route::put('/permission/{id}', [RoleController::class, 'permissionUpdate'])->name('permission.update');
    Route::delete('/permission/{id}', [RoleController::class, 'permissionDestroy'])->name('permission.destroy');

    // Roles
    Route::get('/role', [RoleController::class, 'roleIndex'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'roleCreate'])->name('role.create');
    Route::post('/role', [RoleController::class, 'roleStore'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'roleEdit'])->name('role.edit');
    Route::put('/role/{id}', [RoleController::class, 'roleUpdate'])->name('role.update');
    Route::delete('/role/{id}', [RoleController::class, 'roleDestroy'])->name('role.destroy');

    // Role Permissions
    Route::get('/role/permission', [RoleController::class, 'rolePermissionIndex'])->name('rolePermission.index');
    Route::get('/role/permission/create', [RoleController::class, 'rolePermissionCreate'])->name('rolePermission.create');
    Route::post('/role/permission', [RoleController::class, 'rolePermissionStore'])->name('rolePermission.store');
    Route::get('/role/permission/{id}', [RoleController::class, 'rolePermissionEdit'])->name('rolePermission.edit');
    Route::put('/role/permission/{id}', [RoleController::class, 'rolePermissionUpdate'])->name('rolePermission.update');
    Route::delete('/role/permission/{id}', [RoleController::class, 'rolePermissionDestroy'])->name('rolePermission.destroy');
});

require __DIR__.'/auth.php';
