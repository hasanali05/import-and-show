<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkResource;
use App\Imports\WorkImport;
use App\Models\Work;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'nullable|string'
        ]);
        
        $employee_id = $validated['employee_id'] ?? '';
        $works = Work::query();

        if($employee_id) {
            $works->where('employee_id', 'like', "%$employee_id%");
        }
        
        return WorkResource::collection($works->get());
    }
    public function pdf(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'nullable|string',
            'in_time' => 'nullable|string',
            'out_time' => 'nullable|string',
        ]);
        $employee_id = $validated['employee_id'] ?? '';
        $in_time = $validated['in_time'] ?? '';
        $out_time = $validated['out_time'] ?? '';
    
        $works = Work::query();
        if($employee_id) {
            $works->where('employee_id', 'like', "%$employee_id%");
        }
    
        $works = $works->get();
        
        return view('pdf', compact('works', 'in_time', 'out_time'));
    }
    
    public function import(Request $request)
    {
        $workImport = new WorkImport;
        Excel::import($workImport, request()->file('file'));
        return response()->json(['data' => true]);
    }
}
