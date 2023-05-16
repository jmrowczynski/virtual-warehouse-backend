<?php

namespace App\Http\Controllers;

use App\Models\Handover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandoverController extends Controller
{
    public function index(Request $request)
    {

        $handovers = DB::table('handovers')->latest();

        return $handovers->paginate(10);
    }
}
