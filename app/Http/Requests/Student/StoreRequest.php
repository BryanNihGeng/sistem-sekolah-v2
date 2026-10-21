<?php

namespace App\Http\Requests\Student;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => ['required', 'string', 'size:4', 'unique:students,nis'],
            'name' => ['required', 'string'],
            'gender' => ['required', 'string', 'in:Laki-laki, Perempuan'],
            'major_id' => ['required', 'exists:majors,id'],
            'class_id' => ['required', 'exists:classes,id'],
            'user_id' => ['required', 'exists:users,id', 'unique:students,user_id'],
        ];
    }


    public function attributes()
    {
        return [
            'nis' => 'Nomor Induk Siswa',
            'name' => 'Nama Lengkap',
            'gender' => "Jenis Kelamin",
            'class_id' => "Kelas",
            'major_id' => "Jurusan",
            'user_id' => "Pengguna",
        ];
    }
}
