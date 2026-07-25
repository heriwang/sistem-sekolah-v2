<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Menampilkan daftar jurusan";
    }

    public function create()
    {
        return "Menampilkan halaman tambah jurusan";
    }

    public function store()
    {
        return "Melakukan penambahan data jurusan";
    }

    public function show($id)
    {
        return "Menampilkan jurusan dengan ID: {$id}";
    }

    public function edit($id)
    {
        return "Menampilkan halaman edit jurusan dengan ID: {$id}";
    }

    public function update(Request $request, $id)
    {
        return "Melakukan perubahan data jurusan dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data jurusan dengan ID: {$id}";
    }
}