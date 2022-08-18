<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Jobs\ImportProducts;
use Illuminate\Http\Request;

class ImportProductsController extends Controller
{
    
    public function create()
    {
        return view('dashboard.products.import');
    }

    public function store(Request $request)
    {
        $job = new ImportProducts($request->post('count'));
        $job->onQueue('import')->delay(now()->addSeconds(5));
        $this->dispatch($job);

        return redirect()
            ->route('dashboard.products.index')
            ->with('success', 'Import is runing...');
    }
}
