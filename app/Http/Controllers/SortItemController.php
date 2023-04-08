<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use Illuminate\Support\Facades\DB;

class SortItemController extends Controller
{
    public function index()
    {
        $allItems = Prodcts::all();
        return view('home', compact('allItems'));
    }
}
