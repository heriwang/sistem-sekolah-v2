<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke($id)
    {
        return "Melakukan perubahan data kelas dengan ID: {$id}";
    }
}