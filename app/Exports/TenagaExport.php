<?php

namespace App\Exports;

use App\TenagaKependidikan as TK;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TenagaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('tenaga_kependidikan as tng')
        ->join('jabatan as j', 'tng.kode_jabatan', '=', 'j.id')
        ->select('tng.nama', 'tng.alamat', 'tng.no_tlp', 'j.nama_jabatan')
        ->orderBy('tng.id', 'desc')
        ->get();
        return $data;
    }

    public function headings() :array
    {
        return ["Nama", "Alamat", "Telepon","Jabatan", "Gambar"];
    }

}
