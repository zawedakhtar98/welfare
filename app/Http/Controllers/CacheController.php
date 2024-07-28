<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    public function clearAllCaches()
    {
        // Clear application cache
        Artisan::call('cache:clear');

        // Clear route cache
        Artisan::call('route:clear');

        // Clear configuration cache
        Artisan::call('config:clear');

        // Clear view cache
        Artisan::call('view:clear');

        // Clear compiled classes
        Artisan::call('clear-compiled');

        // Rebuild optimized class loader
        Artisan::call('optimize:clear');

        return response()->json(['status' => 'success', 'message' => 'All caches cleared']);
    }
}
