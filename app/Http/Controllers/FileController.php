<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
            $file->type = $request->input('type');
            $file->time = $request->input('time');
            $file->num_of_downloads = 0;
            $file->user_id = session()->get('active_user')->id;

            $file->save();

            self::addPoints($file->type);

            return redirect()->route('home')->with('success', 'Fájl feltöltése sikeres.');
        } catch (Exception $e) {
            Log::debug($e);

            return redirect()->route('home')->with('error', 'Fájl feltöltése sikertelen.');
        }
    }

    public function destroy($filename): RedirectResponse
    {
        $file = File::query()->where('file_name', '=', $filename)->first();
        try {
            $file->deleted_at = now();
            $file->save();

            return redirect()->route('home')->with('success', 'Fájl törlése sikeres.');
        } catch (Exception $e) {
            Log::debug($e);

            return redirect()->route('home')->with('error', 'Fájl törlése sikertelen.');
        }
    }

    public function downloadFile($filename)
    {
        if (!Storage::exists('public/files/' . $filename)) {
            abort(404);
        }

        $path = Storage::path('public/files/' . $filename);

        return response()->download($path, substr($filename, 11));
    }

    public static function getMyFiles($id): Collection
    {
        return File::query()
            ->where("user_id", "=", $id)
            ->get();
    }

    public static function addPoints($type): void
    {
        $user = session()->get('active_user');
        $point = Type::query()->where('name', '=', $type)->first()->point_up;
        $user->point += $point;
        $user->save();
    }
}
