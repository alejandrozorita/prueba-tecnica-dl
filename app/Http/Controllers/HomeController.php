<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Models\EmployerSrc;

class HomeController extends Controller
{
    /**
     * @var \Src\Models\EmployerSrc
     */
    private $employerSrc;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmployerSrc $employerSrc)
    {
        //$this->middleware('auth');
        $this->employerSrc = $employerSrc;
    }


    public function index()
    {
        $employees = $this->employerSrc->getPaginate(10);

        return view('welcome', compact('employees'));
    }

    public function findEmployer(Request $request)
    {
        if( ! $request->emp_no) {
            return response()->json(['data' => null]);
        }
        return response()->json(['data' => $this->employerSrc->find($request->emp_no)]);
    }

}
