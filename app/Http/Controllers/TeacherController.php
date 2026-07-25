<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return "Menampilkan daftar guru";
    }

    public function create()
    {
        return "Menampilkan halaman tambah guru";
    }

    public function store()
    {
        return "Melakukan penambahan data guru";
    }

    public function show($id)
    {
        return "Menampilkan guru dengan ID: {$id}";
    }

    public function edit($id)
    {
        return "Menampilkan halaman edit guru dengan ID: {$id}";
    }

    public function update($id)
    {
        return "Melakukan perubahan data guru dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data guru dengan ID: {$id}";
    }
}