<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
class ExportData extends Controller
{

public function export()
{
    return Excel::download(new ProductsExport, 'products.xlsx');
}

}
