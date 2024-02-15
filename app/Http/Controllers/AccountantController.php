<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FinancialData;

class AccountantController extends Controller
{
    public function showFinancialData()
    {
        // Логика для отображения финансовых данных
        $financialData = FinancialData::all();

        return view('accountant.show_financial_data', ['financialData' => $financialData]);
    }

    // Дополнительные методы...
}
