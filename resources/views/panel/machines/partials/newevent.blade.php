<div class="tab-pane" id="settings">

    {{-- form start --}}
    {!! Form::open(['route' => 'events.store', 'method' => 'POST']) !!}
    {!! Form::hidden('machine_id', $machine->id) !!}
    <div class="box-body">

        <div class="row">
            {{-- Fecha de entrada --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('admission_date', 'Fecha de entrada') !!}
                    {!! Form::text('admission_date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'placeholder' => 'yyyy-mm-dd hh:mm:ss', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
            {{-- Fecha de salida --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('departure_date', 'Fecha de salida') !!}
                    {!! Form::text('departure_date', null, ['class' => 'form-control', 'id' => 'datetimepicker2', 'placeholder' => 'yyyy-mm-dd hh:mm:ss']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Usuario de computos --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('user_id', 'Asignada a') !!}
                    <select class="form-control select-simple" id="user_id" name="user_id">
                        @foreach ( $users_computos as $user )
                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- Acciones --}}
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('action_id', 'Acción') !!}
                    {!! Form::select('action_id', $actions, null, ['class' => 'form-control select-simple', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="row">
            {{-- Estados de reparación --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('statusrepair_id', 'Estado') !!}
                    {!! Form::select('statusrepair_id', $status_repairs, null, ['class' => 'form-control select-simple', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
        </div>
        
        <div class="row">
            {{-- Description --}}
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'data-validation' => 'required', 'required']) !!}
                </div>
            </div>
        </div>

    </div>

    <div class="box-footer">
        {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

</div>
{{-- /.tab-pane --}}