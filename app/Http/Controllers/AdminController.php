<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function contact(){
        return redirect()->back()->with('warning', 'Phiên bản lần này chưa hoàn thiện');
    }
}
