<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Excel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'Idpel' => $row[1],
            'Nama' => $row[2],
            'Alamat' => $row[3],
            'Daya' => $row[4],
            'PK' => $row[5]
            
        ]);

    }
}
