<?php
// app/Providers/AppServiceProvider.php
 
namespace App\Providers;
 
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
 
class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Sudah ditambahkan di Bab 7 untuk styling Bootstrap 4
        Paginator::useBootstrapFour();
    }
}
