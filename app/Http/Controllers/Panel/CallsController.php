<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Calls;

class CallsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Calls::all();

        // $calls = Calls::orderBy('id', 'ASC')
        //    ->all();
        //return view(
        // 'panel.workassignments.edit',
        //  compact('users_computos', 'working_states', 'workassignment')
        // );

        // Retorno vista
        return view('panel.calls.index', compact('calls'));
    }
}
