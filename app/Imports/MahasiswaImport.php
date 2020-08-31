<?php

namespace App\Imports;

use App\Mahasiswa;
use App\Bidang_keahlian;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class MahasiswaImport implements ToModel, WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $row['id_bk']   = Bidang_keahlian::select('id')->where("nama_bk", "like", "%".$row['Bidang Keahlian']."%")->first();
        
        foreach($row as $rows) {
            $data = Mahasiswa::where('nim','=',$row['Nim'])->first();
            if (empty($data)) {
                return new Mahasiswa([
                    'nim' => $row['Nim'],
                    'nama' => $row['Nama'], 
                    "angkatan" => $row['Angkatan'],
                    "kode_bk" => $row['id_bk']->id 
                ]);
            } 
        }
    }

    public function rules(): array
    {
        return [
            // 'Nim' => Rule::unique('mahasiswa', 'nim'),
        ];
    }

    public function customValidationMessages()
    {
        return [
            // 'Nim.unique' => 'Custom message',
        ];
    }
}
