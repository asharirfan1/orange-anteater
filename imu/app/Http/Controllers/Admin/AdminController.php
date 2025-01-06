<?php

namespace Teplokvartal\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Teplokvartal\Http\Requests;
use Teplokvartal\Http\Controllers\Controller;

use Teplokvartal\Http\Middleware\Authenticate;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(Authenticate::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index'); 
    }
}
