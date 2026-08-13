<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'        
            ],
            
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'budi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'         
            ]
        ];
        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store()
    {
        return "Melakukan penambahan data siswa";
    }

    public function show($id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        return view('students.show', [
            'title' => $title
        ]);
    }

    public function edit($id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        return view('students.edit', [
            'title' => $title
        ]);
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
