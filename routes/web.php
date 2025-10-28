<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiteCaseController;
use App\Http\Controllers\StaffController;

// Root diarahkan ke login, tapi kalau sudah login langsung ke dashboard
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard diarahkan ke index bite_cases, wajib login & verified
Route::get('/dashboard', [BiteCaseController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Semua route di bawah ini juga wajib login
Route::middleware('auth', 'superadmin')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('bite_cases', BiteCaseController::class);
    Route::get('/get-subdis/{district}', [BiteCaseController::class, 'getSubdis']);
    Route::get('/get-villages/{subdis}', [BiteCaseController::class, 'getVillages']);

    Route::get('/bite-cases/chart-subdis', [BiteCaseController::class, 'subDisChart'])->name('bite_cases.chart_subdis');
    Route::get('/bite-cases/chart-subdis', [BiteCaseController::class, 'subDisChart'])->name('bite_cases.chart_subdis');
    Route::get('/bite-cases/send-alert', [BiteCaseController::class, 'sendAlertEmail'])->name('bite_cases.send_alert');

    // Route untuk peta kasus rabies per kelurahan
    Route::get('/bite-cases/map', [BiteCaseController::class, 'map'])->name('bite_cases.map');

    // ✅ Route baru untuk cek NIK
    Route::get('/check-nik', [BiteCaseController::class, 'checkNik'])->name('check.nik');
    //route STAFF
    Route::resource('staff_vac', StaffController::class);

    //coba
    Route::get('/id-check', [BiteCaseController::class, 'idCheckPage'])->name('bite_cases.id_check');
    Route::get('/id-check/result', [BiteCaseController::class, 'idCheckResult'])->name('bite_cases.id_check_result');

    Route::get('/bite-cases/export', [BiteCaseController::class, 'export'])
    ->name('bite_cases.export');


});

Route::middleware('auth', 'admin')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('bite_cases', BiteCaseController::class);
    Route::get('/get-subdis/{district}', [BiteCaseController::class, 'getSubdis']);
    Route::get('/get-villages/{subdis}', [BiteCaseController::class, 'getVillages']);
    

    //Route::get('/bite-cases/chart-subdis', [BiteCaseController::class, 'subDisChart'])->name('bite_cases.chart_subdis');
    //Route::get('/bite-cases/send-alert', [BiteCaseController::class, 'sendAlertEmail'])->name('bite_cases.send_alert');

    // Route untuk peta kasus rabies per kelurahan
    Route::get('/bite-cases/map', [BiteCaseController::class, 'map'])->name('bite_cases.map');

    // ✅ Route baru untuk cek NIK
    Route::get('/check-nik', [BiteCaseController::class, 'checkNik'])->name('check.nik');

    //route STAFF
    Route::resource('staff_vac', StaffController::class);

    //export
    Route::get('/bite-cases/export', [BiteCaseController::class, 'export'])
    ->name('bite_cases.export');
    Route::get('/bite-cases/export-csv', [BiteCaseController::class, 'exportCsv'])
    ->name('bite_cases.export_csv');

});
require __DIR__.'/auth.php';
