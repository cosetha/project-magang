<?php

namespace App\Exports;

use App\Dosen;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class DosenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Dosen::select('nama')->get();
    }
}
