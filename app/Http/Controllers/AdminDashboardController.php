<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class AdminDashboardController extends Controller
{
    //
    public function __invoke()
    {
        Gate::authorize('admin', auth()->user());
        return view('admin.dashboard');
    }
}
