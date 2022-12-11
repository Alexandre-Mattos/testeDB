<?php

namespace App\Http\Controllers;

class WipeController extends Controller
{
    public function index()
    {
        exec('php artisan migrate:fresh --seed');
        \Log::channel('single')->debug('refresh no banco.........');
    }
}
