<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class StudentImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        

        return new Student([
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'name' => $row['nama'],
            'jurusan' => $row['jurusan'],
            'kelas' => $row['kelas'],
            'status' => $row['status'],
        ]);
    }
}
