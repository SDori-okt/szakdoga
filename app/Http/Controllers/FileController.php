<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('upload');
    }

    public function store(Request $request): RedirectResponse
    {
        $file = new File;

        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:1024'
        ]);

        $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/files', $fileName);

        $file->file_name = $fileName;
        $file->title = $request->input('title');
        $file->subject = $request->input('subject');
        $file->topic = $request->input('topic');
        $file->time = $request->input('time');
        $file->difficulty_level = $request->input('difficulty_level');
        $file->type = "röpdolgozat";
        $file->num_of_downloads = 0;
        $file->save();

        return redirect()->route('dashboard')->with('success', 'Fájl feltöltése sikeres.');
    }

    public function destroy(File $file): RedirectResponse
    {
        $file->delete();

        return redirect()->route('dashboard')->with('success', 'Fájl törlése sikeres.');
    }
}
