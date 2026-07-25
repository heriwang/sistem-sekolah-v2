<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return "Menampilkan daftar siswa";
    }

    public function create()
    {
        return "Menampilkan halaman tambah siswa";
    }

    public function store()
    {
        return "Melakukan penambahan data siswa";
    }

    public function show($id)
    {
        return "Menampilkan siswa dengan ID: {$id}";
    }

    public function edit($id)
    {
        return "Menampilkan halaman edit siswa dengan ID: {$id}";
    }

    public function update($id)
    {
        return "Melakukan perubahan data siswa dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}
