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
                'name' => 'Andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'
            ],
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi',
                'class' => 'XII AKL 1',
                'major' => 'AKL'
            ],
            [
                'id' => 3,
                'nis' => '22100003',
                'name' => 'Bryan',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'
            ],
            [
                'id' => 4,
                'nis' => '22100004',
                'name' => 'Stevent',
                'class' => 'XII BID',
                'major' => 'BID'
            ]
        ];

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }
    public function show(string $id)
    {
        $title = "Sistem Sekolah - Detail Siswa";
        return view('students.show', [
            'title' => $title
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function edit(string $id)
    {
        $title = "Sistem Sekolah - Edit Siswa";
        return view('students.edit', [
            'title' => $title
        ]);
    }

    public function store()
    {
        return "Menambahkan data siswa baru";
    }

    public function update(string $id)
    {
        return "Mengubah data siswa dengan ID: {$id}";
    }

    public function destroy(string $id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}
