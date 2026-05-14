<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsLetterController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/NewsLetter/NewsLetterPage', [
            'NewsLetter' => NewsLetter::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/NewsLetter/NewsLetterCreate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        NewsLetter::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return redirect()->route('news_letter.index');
    }

    public function edit($id)
    {
        $newsletter = NewsLetter::findOrFail($id);
        return Inertia::render('Admin/NewsLetter/NewsLetterEdit', [
            'newsletter' => $newsletter,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $newsletter = NewsLetter::findOrFail($id);
        $newsletter->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return redirect()->route('news_letter.index');
    }

    public function destroy($id)
    {
        $data = NewsLetter::findOrFail($id);
        $data->delete();
        return redirect()->route('news_letter.index');
    }
}
