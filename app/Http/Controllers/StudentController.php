<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";

        $search =  $request->query('search');
        $class =  $request->query('class');
        $major =  $request->query('major');
        
        $students = Student::select(['id', 'nis', 'name', 'class', 'major'])
            ->when($search, function ($query, $search) {
                 $query->where(function ($query) use ($search) {
                     $query->where('name', 'like', "%{$search}%")
                            ->orWhere('nis', 'like', "%{$search}%");
                 });
            })
            ->when($class, fn ($query, $class) => $query->where('class', '=', $class))
            ->when($major, fn ($query, $major) => $query->where('major', '=', $major))
        ->paginate(10)
        ->withQueryString();

            
        $majors = ['TKJ', 'BID', 'AKL'];
        $schoolClasses = 
        ['10 TKJ 1', '10 TKJ 2', '10 TKJ 3', 
        '11 TKJ 1', '11 TKJ 2', '11 TKJ 3', 
        '12 TKJ 1', '12 TKJ 2', '12 TKJ 3',
        '10 BID', '11 BID', '12 BID', 
        '10 AKL', '11 AKL', '12 AKL']; 

        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store(StoreRequest $request)
    {
        // PERBAIKAN: Tambahkan kurung () pada validated()
        $validatedRequest = $request->validated();

        // Tambahkan data ke Database
        Student::create($validatedRequest);

        // Handle if Success
        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $title = 'Sistem Sekolah - Detail Siswa';
        return view('students.show', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function edit(Student $student)
    {
        $title = 'Sistem Sekolah - Edit Siswa';
        return view('students.edit', [
            'title' => $title,
            'student' => $student
        ]);
    }

    public function update(Student $student, UpdateRequest $request)
    {
        $validatedRequest = $request->validated();

        $student->update($validatedRequest);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}