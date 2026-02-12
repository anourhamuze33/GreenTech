<?php
namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProductsExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Product::query()->select('id', 'name', 'price', 'stock', 'created_at'); 
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom du produit',
            'Prix',
            'État du stock',
            'Date création',
        ];
    }
    //     public function columnFormats(): array
    // {
    //     return [
    //         'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //         'C' => NumberFormat::FORMAT_CURRENCY_EUR_INTEGER,
    //     ];
    // }

    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->price . ' MAD',
            $product->stock ? 'En stock' : 'Rupture',
            $product->created_at->format('d/m/Y'),
        ];
    }
}

