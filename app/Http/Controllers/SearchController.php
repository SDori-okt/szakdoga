<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SearchController extends Controller
{
    public static function search(): Factory|View|Application
    {
        $title = request('title');
        $subject = request('subject');
        $topic = request('topic');

        $query = File::query();

        $query->when($title, function ($q) use ($title) {
            return $q->where('title', 'LIKE', '%' . $title . '%');
        });

        $query->when($subject, function ($q) use ($subject) {
            return $q->where('subject', 'LIKE', '%' . $subject . '%');
        });

        $query->when($topic, function ($q) use ($topic) {
            return $q->where('topic', 'LIKE', '%' . $topic . '%');
        });

        $results = $query->get();

        return view('search', compact('results'));
    }
}
