<?php

namespace App\Http\Controllers\Admin\Master\Development;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhpinfoController extends Controller
{
    public function index(Request $request)
    {
        $route = route('admin.master.development.phpinfo.info');
        return view('admin.master.development.phpinfo.index', [
            'route' => $route,
        ]);
    }

    public function info(Request $request)
    {
        return view('admin.master.development.phpinfo.info');
    }
}
