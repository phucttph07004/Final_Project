<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{

    public function headingRow() : int
    {
        return 1;
    }

    public function model(array $row)
    {
        $id_last=Student::all()->last();
        if($id_last != null){
        $code="ph$id_last->id";
        }else{
            $code="ph1";
        }
        return new Student(
            [
            'fullname' => $row['fullname'] ?? $row['fullname'],
            'is_active' =>$code,
            'code' =>1,
            'password' =>bcrypt('123456'),
            'email' => $row['email'] ?? $row['email'],
            'address' => $row['address'] ?? $row['address'],
            'class_id' => $row['class_id'] ?? $row['class_id'],
            'phone' => $row['phone'] ?? $row['phone'],
            'date_of_birth' => $row['date_of_birth'] ?? $row['date_of_birth'],
            ]
            );
    }
}
