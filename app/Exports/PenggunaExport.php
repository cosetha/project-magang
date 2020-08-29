<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenggunaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select('id','name','email','created_at','updated_at')->where('id_role',2)->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama Pengguna',
            'Email',
            'Dibuat Tanggal',
            'Terakhir Di-Ubah'
        ];
    }
}
