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
        if($this->request->bk == 0 && $this->request->angkatan == 0 ){
            $mahasiswa = Mahasiswa::all();
            $data = $mahasiswa->sortBy(function ($mhs, $key) {
                return $mhs['angkatan'].$mhs['nim'];
            });
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
        }else if($this->request->bk == 0 && $this->request->angkatan != 0 ){
            $mahasiswa = Mahasiswa::where('angkatan', $this->request->angkatan)->get();
            $data = $mahasiswa->sortBy(function ($mhs, $key) {
                return $mhs['angkatan'].$mhs['nim'];
            });
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

        }else if($this->request->bk != 0 && $this->request->angkatan == 0 ){
            $mahasiswa = Mahasiswa::where('kode_bk', $this->request->bk)->get();
            $data = $mahasiswa->sortBy(function ($mhs, $key) {
                return $mhs['angkatan'].$mhs['nim'];
            });
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
            $mahasiswa = Mahasiswa::where('kode_bk', $this->request->bk)->where('angkatan', $this->request->angkatan)->get();
            $data = $mahasiswa->sortBy(function ($mhs, $key) {
                return $mhs['angkatan'].$mhs['nim'];
            });
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
