<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    public function index(Request $request)
    {

        $receipts = DB::table('receipts')->latest();

        return $receipts->paginate(10);
    }
}
