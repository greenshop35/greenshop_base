<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\Studio\StudioHendlar;
use Inertia\Inertia; // 🌸 राधिका: React को जोड़ने वाली असली जादुई कड़ी ✨

/*
|--------------------------------------------------------------------------
| JANI'S PORTAL SYSTEM (FINAL & SECURE) 2026 🚀
|--------------------------------------------------------------------------
*/

// A. ASSET LOADER (सुरक्षित एसेट लोडिंग) ✨
Route::get('/assets/{path}', function ($path) {
    $fullPath = base_path('public/assets/' . $path);
    if (file_exists($fullPath)) {
        $file = file_get_contents($fullPath);
        $type = mime_content_type($fullPath);
        return response($file)->header('Content-Type', $type);
    }
    abort(404);
})->where('path', '.*');

// B. STUDIO PROTECTED API (सिर्फ लॉगिन यूजर्स के लिए) 🛡️🌸
Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/studio/get-folder-content', [StudioHendlar::class, 'getFolderContent']);
    Route::post('/studio/read-file', [StudioHendlar::class, 'readFileContent']);
    Route::post('/studio/save-file', [StudioHendlar::class, 'saveFileContent']);
});

// C. API MANAGEMENT ⚡
Route::any('/api/{slug}', [PortalController::class, 'handleApiRequest'])->where('slug', '.*');

// D. PORTALS (Business, Delivery, Office, Studio) 🌸
// 🌸 राधिका: यहाँ 'Studio' पुराना Blade रेंडर करेगा, बाकी सब Inertia/React!
Route::any('/{portal}/{sub_page?}', [PortalController::class, 'handleRequest'])
    ->where('portal', '^(?!assets|public|css|js|images)(business|delivery|office|studio)$')
    ->where('sub_page', '.*');

// E. MAIN HOMEPAGE (Customer App - Pure React UI) ✨🌻
Route::any('/{sub_page?}', [PortalController::class, 'handleRequest'])
    ->where('sub_page', '^(?!assets|public|css|js|images|studio).*$');

// F. FALLBACK 🚫
Route::fallback(function () {
    return response()->json([
        'status' => 'error',
        'message' => 'Invalid Route Access - Green Shop Security'
    ], 404);
});