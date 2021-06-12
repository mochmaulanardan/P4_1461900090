<?php

namespace App\Exports;

use App\Models\buku;
use App\Models\jenis_buku;
use App\Models\rak_buku;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class BukuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $buku = DB::table('rak_buku')
            ->join('buku', 'rak_buku.id_buku', '=', 'buku.id')
            ->join('jenis_buku', 'rak_buku.id_jenis_buku', '=', 'jenis_buku.id')
            ->select('rak_buku.id', 'buku.judul', 'buku.tahun_terbit', 'jenis_buku.jenis')
            ->get();
    }
}