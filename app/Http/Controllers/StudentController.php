<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";

        $students =  Student::select(['id', 'nis', 'name', 'class' , 'major'])
        ->get();

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }




    public function show(Student $student)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar";
        

        return view('students.show', [
            'title' => $title,
            'description' => $description,
            'student' => $student
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Menambahkan Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar";

        return view('students.create', [
            'title' => $title,
            'description' => $description,
        ]);
    }

    public function edit(Student $student)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        $description = "Menampilkan daftar siswa yang terdaftar";

        return view('students.edit', [
            'title' => $title,
            'description' => $description,
            'student' => $student
        ]);
    }

    public function store(StoreRequest $request)
    {
        // Validasi
        $validatedRequest = $request->validated();
        Student::create($validatedRequest);
       
        return redirect()->route('students.index');
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