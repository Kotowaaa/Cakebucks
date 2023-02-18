<?php

namespace App\Exports;

use App\Models\DataPenjualan;
use Illuminate\Contracts\Queue\ShouldQueue as QueueShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class DataPenjualanExport implements FromCollection, WithHeadings, ShouldAutoSize, QueueShouldQueue
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    // Variabel Form Start date and End date
    public function __construct(String $start_date = null, String $end_date = null)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public function collection()
    {
        // Function select data from database
        return DataPenjualan::select()->where('updated_at','>=',$this->start_date)->where('updated_at','<=',$this->end_date)->get();
    }

    /**
     * @return array
     */
    public function DataPenjualanEvents(): array
    {
        return[
            AfterSheet::class   => function(AfterSheet $event) {
                $cellRange = 'A1:W1';  //All Header
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }

    // Function Header In Excel
    public function headings(): array
    {
        return[
            'No',
            'Nama Kue',
            'Jumlah Terjual',
            'Tanggal',
            'Total Penghasilan',
            'Created_at',
            'Updated_at',
        ];
    }
}
