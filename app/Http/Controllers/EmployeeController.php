<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        $request->validate([
            'name' => 'string|nullable',
        ]);

        $orderKey = 'name';
        $orderDirection = 'asc';

        $employees = DB::table('employees')->orderBy($orderKey, $orderDirection);

        $request->whenFilled('name', function ($name) use ($employees) {
            $employees->where('name', 'like', '%'. $name. '%');
        });

        return $employees->paginate(10);
    }
}
