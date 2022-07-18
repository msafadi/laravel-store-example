<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth'])->only('index');
    }

    // Actions
    public function index()
    {
        $title = 'Store';

        $user = Auth::user();
        
        // Return response: view, josn, redirect, file
        
        return view('dashboard.index', [
            'user' => 'Mohammed',
            'title' => $title
        ]);
    }
}
