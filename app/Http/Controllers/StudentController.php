<?php

namespace App\Http\Controllers;
use App\Models\Major;
use App\Models\SchoolClass;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\UriQueryString;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $search = $request->query('search');
        $class = $request->query('class');
        $major = $request->query('major');

        $students = Student::select(['id', 'nis', 'name', 'class_id', 'major_id'])
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->when($class, fn($query, $class) => $query->where('class_id', '=', $class))
            ->when($major, fn($query, $major) => $query->where('major_ids', '=', $major))
            ->paginate(10)
            ->withQueryString();

        $schoolClasses = ['10 AKL', '11 AKL', '11 TKJ 1', '11 TKJ 2', '10 BiD', '12 TKJ 1', '12 TKJ 2', '12 TKJ 3'];
        $majors = ['AKL', 'BiD', 'TKJ'];


        return view('students.index', [
            'title' => $title,
            'students' => $students,
            'schoolClasses' => $schoolClasses,
            'majors' => $majors
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
        $student->subjects()->detach();
        $student->delete();
        return redirect()->route('students.index');
    }
}