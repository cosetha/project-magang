<?php

namespace App\Exports;

use App\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MahasiswaExport implements FromCollection,WithHeadings, ShouldAutoSize
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->request->bk == 0 ){
            $data = Mahasiswa::all();
            $output = [];
            foreach ($data as $mhs)
            {
            $output[] = [
                $mhs->nim,
                $mhs->nama,
                $mhs->bidangKeahlian()->first()->nama_bk,
                $mhs->angkatan
            ];
            }
            return collect($output);
        }else{
            $data = Mahasiswa::where('kode_bk', $this->request->bk)->get();
            $output = [];
            foreach ($data as $mhs)
            {
            $output[] = [
                $mhs->nim,
                $mhs->nama,
                $mhs->bidangKeahlian()->first()->nama_bk,
                $mhs->angkatan
            ];
            }
            return collect($output);
        }
        
    }

    public function headings(): array
    {
        return [
            'Nim',
            'Nama',
            'Bidang Keahlian',
            'Angkatan'
        ];
    }
}
