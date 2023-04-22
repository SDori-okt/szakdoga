<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;

class SearchController extends Controller
{
    public static function search(): Collection
    {
        $request = request();
        dd($request);
        return File::query()
            ->when($request->filled('topic'), function ($query) use ($request) {
                $query->where('topic', 'like', '%'.$request->input('topic').'%');
            })->get();
    }
}
