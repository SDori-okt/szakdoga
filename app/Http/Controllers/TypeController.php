<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

class TypeController extends Controller
{
    public static function getAllTypes(): Collection|array
    {
        return Type::query()->get();
    }
}
