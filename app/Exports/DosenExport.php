<?php

namespace App\Exports;

use App\Dosen;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DosenExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dosen::select('id','nama','deskripsi','created_at','updated_at')->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Dosen',
            'Deskripsi',
            'Dibuat Tanggal',
            'Terakhir Di-Ubah'
        ];
    }
}
