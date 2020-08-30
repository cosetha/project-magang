<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\TenagaKependidikan as TK;

class TenagaImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new TK([
          'nama' => $row['nama'],
          'alamat' => $row['alamat'],
          'no_tlp' => $row['no_tlp'],
          'kode_jabatan' => $row['kode_jabatan'],
        ]);
    }
  
}
