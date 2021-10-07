<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\WorkAssignmentRequest;
use App\Http\Requests\WorkAssignmentNewRequest;

use App\Models\WorkAssignment;
use App\Models\WorkingState;
use App\Models\User;

class WorkAssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Busco todas las workAssignments
        $workAssignments = WorkAssignment::whereBetween('working_state_id',[0,2])->orderBy('working_state_id', 'ASC')->get();
        
        // Retorno a la vista
        return view('panel.workassignments.index', compact('workAssignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users_computos = User::where('area_id', 1)->get();
        $working_states = WorkingState::orderBy('id', 'ASC')->pluck('name', 'id')->all();;
        return view('panel.workassignments.create', compact('users_computos', 'working_states'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkAssignmentRequest $request)
    {
        $workAssignment = new WorkAssignment($request->all());
        $workAssignment->save();
        flash('La tarea se ha registrado con exito!')->success();
        return redirect()->route('workassignments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workassignment = WorkAssignment::findOrFail($id);
        $users_computos = User::where('area_id', 1)->get();
        $working_states = WorkingState::orderBy('id', 'ASC')->pluck('name', 'id')->all();;
        return view('panel.workassignments.edit', compact('users_computos', 'working_states', 'workassignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WorkAssignmentRequest $request, $id)
    {
        $workassignment = WorkAssignment::find($id);
        $workassignment->fill($request->all());
        if (($workassignment->working_state_id == 3) && ($workassignment->finish_date == null)) {
            flash('Has olvidado poner la fecha de finalización de la tarea.')->error();
            return back();
        }
        else {
            $workassignment->save();
            flash('La tarea ha sido modificada de forma exitosa!')->success();
            return redirect()->route('workassignments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workassignment = WorkAssignment::findOrFail($id);
        $workassignment->delete();
        flash('La tarea ha sido eliminada de forma exitosa!')->success();
        return redirect()->route('workassignments.index');


    }

    public function bentrada()
    {      
        $id =\Auth::user()->id;
        
        $workAssignments = WorkAssignment::whereBetween('working_state_id',[0,2])->where('user_id',$id)->orderBy('working_state_id', 'ASC')->get();
        // Retorno a la vista
        return view('panel.workassignments.bentrada', compact('workAssignments'));
    }

    //funcion para autoasignarse a una tarea
    public function autoassing($id){
        $task = WorkAssignment::findOrFail($id);

        //controlo que no haya usuarios asignados a la tarea
        if($task->user_id == null){
            $authid = \Auth::user()->id;
            $task->user_id = $authid;
            $task->save();
        }

        return redirect()->back();
    }

  
}
