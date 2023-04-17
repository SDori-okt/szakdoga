<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Prologue\Alerts\Facades\Alert;

class FileController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('upload');
    }

    public function store(Request $request): RedirectResponse
    {
        try {
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
            $file->difficulty_level = $request->input('difficulty_level');
            $file->type = "röpdolgozat";
            $file->time = 5;
            $file->num_of_downloads = 0;
            $file->user_id = 2;

            $file->save();
            Alert::success('Fájl feltöltése sikeres.');

            return redirect()->route('home')->with('success', 'Fájl feltöltése sikeres.');
        } catch (Exception $e) {
            Alert::error('Fájl feltöltése sikertelen.');
            Log::debug($e);

            return redirect()->route('home')->with('error', 'Fájl feltöltése sikertelen.');
        }
    }

    public function destroy(File $file): RedirectResponse
    {
        try {
            $file->delete();
            Alert::success('Fájl törlése sikeres.');

            return redirect()->route('dashboard')->with('success', 'Fájl törlése sikeres.');
        } catch (Exception $e) {
            Alert::error('Fájl törlése sikertelen.');
            Log::debug($e);

            return redirect()->route('home')->with('error', 'Fájl törlése sikertelen.');
        }

    }

    public function downloadFile($filename): Response
    {
        if (!Storage::disk('public')->exists($filename)) {
            abort(404);
        }

        $file = Storage::disk('public')->get($filename);
        $response = new Response($file, 200);
        $response->header('Content-Type', Storage::disk('public')->mimeType($filename));
        $response->header('Content-Disposition', 'attachment; filename="' . $filename . '"');

        return $response;
    }
}
