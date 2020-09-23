<?php

namespace App\Imports;

use App\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Dosen([
            'nama' => $row['nama'],
            'nik' => $row['nik'],
            'nidn' => $row['nidn'],
            'deskripsi' => $row['deskripsi']
        ]);
    }
}
