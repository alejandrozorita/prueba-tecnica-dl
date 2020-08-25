<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Src\Models\{DepartmentSrc, EmployerSrc};

class HomeController extends Controller
{
    /**
     * @var \Src\Models\EmployerSrc
     */
    private $employerSrc;
    /**
     * @var \Src\Models\DepartmentSrc
     */
    private $departmentSrc;


    /**
     * Create a new controller instance.
     *
     * @param  \Src\Models\EmployerSrc  $employerSrc
     * @param  \Src\Models\DepartmentSrc  $departmentSrc
     */
    public function __construct(EmployerSrc $employerSrc, DepartmentSrc $departmentSrc)
    {
        //$this->middleware('auth');
        $this->employerSrc = $employerSrc;
        $this->departmentSrc = $departmentSrc;
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $employees = $this->employerSrc->getPaginate(10);
        $data = $request->all();
        return view('listado_empleados', compact('employees', 'data'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function filterMananager(Request $request)
    {
        $managers = $this->departmentSrc->getAllManagers();

        $employees = null;
        $data = $request->all();
        if ($request->manager) {
            $employees = $this->employerSrc->getEmployersByManager($request->manager, $request->to, $request->from);
        }

        return view('listado_empleados_filtro', compact('managers','employees', 'data'));
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findEmployer(Request $request)
    {
        if ( ! $request->emp_no) {
            return response()->json(['data' => null]);
        }
        return response()->json(['data' => $this->employerSrc->find($request->emp_no)]);
    }

}
