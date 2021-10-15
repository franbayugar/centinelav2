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
use App\Models\UserTask;

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
        $workAssignments = WorkAssignment::whereBetween('working_state_id', [
            0,
            4,
        ])
            ->orderBy('working_state_id', 'ASC')
            ->get();

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
        $working_states = WorkingState::orderBy('id', 'ASC')
            ->pluck('name', 'id')
            ->all();
        return view(
            'panel.workassignments.create',
            compact('users_computos', 'working_states')
        );
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
        if (!empty($request['user_id'])) {
            foreach ($request['user_id'] as $id_user) {
                $workAssignment->users()->attach($id_user);
            }
        } else {
            $workAssignment->users()->attach(null);
        }

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
        $working_states = WorkingState::orderBy('id', 'ASC')
            ->pluck('name', 'id')
            ->all();
        $usersID = [];
        foreach ($workassignment->users as $user) {
            array_push($usersID, $user->id);
        }
        return view(
            'panel.workassignments.edit',
            compact(
                'users_computos',
                'working_states',
                'workassignment',
                'usersID'
            )
        );
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

        //Verifica que la tarea no la den por terminada sin agregarle fecha de finalizacion.
        if (
            $workassignment->working_state_id == 3 &&
            $workassignment->finish_date == null
        ) {
            flash(
                'Has olvidado poner la fecha de finalización de la tarea.'
            )->error();
            return back()->withInput();
        }
        //Verifica que no se ponga una fecha de finalizacion anterior a la fecha de creacion.
        if (
            $workassignment->working_state_id == 3 &&
            $workassignment->finish_date < $workassignment->start_date
        ) {
            flash(
                'La fecha de finalizacion no debe ser menor a la de creacion.'
            )->error();
            return back()->withInput();
            //Verifica que no se den por terminadas tareas que no fueron asignadas.
        }
        if (
            empty($request->user_id) &&
            $workassignment->working_state_id == 3
        ) {
            flash(
                'No puede dar por terminada una tarea que no esta asignada'
            )->error();
            return back()->withInput();
        }
        $workassignment->save();
        $res = $request['user_id'];

        $workassignment->users()->sync($res);

        flash('La tarea ha sido modificada de forma exitosa!')->success();
        return redirect()->route('workassignments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$idauth = \Auth::user()->id;
        $workassignment = WorkAssignment::findOrFail($id);
        //if($workassignment->user_id == $idauth){
        $workassignment->delete();
        flash('La tarea ha sido eliminada de forma exitosa!')->success();
        //}else{
        //    flash('Solo las personas asignadas a la misma pueden elminar esta tarea')->error();
        //};
        return redirect()->route('workassignments.index');
    }

    public function bentrada()
    {
        $user = User::find(\Auth::user()->id);

        $id = \Auth::user()->id;
        /*
        $test = WorkAssignment::where('user_id', $id)
            ->orderBy('working_state_id', 'ASC')
            ->get();
        // Retorno a la vista
       */
        $workAssignments = $user->workAssignments;

        return view(
            'panel.workassignments.bentrada',
            compact('workAssignments')
        );
    }

    public function terminada()
    {
        $workAssignments = WorkAssignment::where('working_state_id', 3)
            ->orderBy('working_state_id', 'ASC')
            ->get();
        // Retorno a la vista

        return view(
            'panel.workassignments.terminada',
            compact('workAssignments')
        );
    }

    public function sinasignar()
    {
        /*parche para sin asignar - rapido MEJORAR - */
        $workAssignments = WorkAssignment::all();
        $tasks = [];
        foreach ($workAssignments as $workAssignment) {
            if (count($workAssignment->users) == 0) {
                array_push($tasks, $workAssignment);
            }
        }

        /*$tasks = WorkAssignment::with('users')->whereHas('users', function($q) {
                            $q->where('user_id', null);
                        })
                            ->orderBy('working_state_id', 'ASC')
                            ->get();
        */

        /*
        $test = $workAssignments->users->where('user_id', null);
        var_dump($test);
        die();

        $workAssignments = WorkAssignment::where('user_id', null)
            ->orderBy('working_state_id', 'ASC')
            ->get();*/

        $workAssignments = $tasks;
        // Retorno a la vista
        return view(
            'panel.workassignments.sinasignar',
            compact('workAssignments')
        );
    }

    //funcion para autoasignarse a una tarea
    public function autoassing($id)
    {
        $task = WorkAssignment::findOrFail($id);

        //controlo que no haya usuarios asignados a la tarea
        $authid = \Auth::user()->id;

        $task->users()->sync($authid);

        return redirect()->back();
    }
}
