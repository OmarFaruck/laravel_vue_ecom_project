<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminPageController extends Controller
{
    public function index()
    {
         
        return Inertia::render('Admin/PageCreate/PageCreatePage');
    }

    public function create()
    {
        return Inertia::render('Admin/Page/Create');
    }

    public function store(Request $request)
    {
        // Validate and store the page data
        // ...

        return redirect()->route('page_create.index');
    }

    public function edit($id)
    {
        // Retrieve the page data by ID and pass it to the edit view
        // ...

        return Inertia::render('Admin/Page/Edit', [
            // 'page' => $page,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate and update the page data by ID
        // ...

        return redirect()->route('page_create.index');
    }

    public function destroy($id)
    {
        // Delete the page by ID
        // ...

        return redirect()->route('page_create.index');
    }
}
