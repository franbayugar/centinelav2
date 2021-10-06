{{-- Info box --}}
<div class="box box-solid box-info">

    <div class="box-header">
        <h3 class="box-title">Detalle máquina</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>

    <div class="box-body">

        {{-- Imagen de la máquina --}}

        @if ( $machine->image != null )
            <div class="thumbnail">
                <img src="{{ asset('img/machines/' . $machine->image ) }}" alt="Imágen máquina {{ $machine->name }}">
            </div>
        @else
            <div class="thumbnail">
                <img src="{{ asset('AdminLTE/img/sin-imagen.png') }}" alt="Imágen máquina {{ $machine->name }}">
            </div>
        @endif

        <strong>
            <i class="{!! $machine->machinetype->icon !!} margin-r-5"></i> 
            Máquina
        </strong>

        <p class="text-muted dont-break-out">{!! $machine->name !!} ({!! $machine->machinetype->name !!})</p>

        <hr>

        @if ( $machine->serial != null )
            <strong>
                <i class="fa fa-tag margin-r-5"></i> 
                Serial
            </strong>
    
            <p class="text-muted">{!! $machine->serial !!}</p>
    
            <hr>
        @endif

        @if ( $machine->password != null )
            <strong>
                <i class="fa fa-unlock-alt margin-r-5"></i> 
                Contraseña de ingreso
            </strong>

            <p class="text-muted">{{ Crypt::decrypt($machine->password) }}</p>

            <hr>
        @endif

        <strong><i class="fa fa-calendar margin-r-5"></i> Comprada</strong>

        @if ( $machine->date_purchased != null )
            <p class="text-muted">{!! date("d/m/Y", strtotime($machine->date_purchased)) !!}</p>
            <hr>
        @else
            <p class="text-danger">Sin fecha</p>
            <hr>
        @endif

        @if ( $events->first() != null )
            <strong><i class="fa fa-wrench margin-r-5"></i> Reparación</strong>
            
            <p class="text-muted"><strong>Fecha entrada: </strong>{!! date("d/m/Y", strtotime($events->last()->admission_date)) !!}</p>

            @if ( $events->first()->departure_date != null )
                <p class="text-muted"><strong>Fecha salida: </strong>{!! date("d/m/Y", strtotime($events->first()->departure_date)) !!}</p>
            @endif

            <p class="text-muted"><strong>Estado: </strong><strong class="{!! $events->first()->statusrepair->color_text !!}">{!! $events->first()->statusrepair->name !!}</strong></p>

            <hr>
        @endif

        @if ( $machine->description != null )
            <strong><i class="fa fa-keyboard-o margin-r-5"></i> Caracteristicas</strong>
            <br><br>
            <div class="text-muted dont-break-out">{!! $machine->description !!}</div>

            <hr>
        @endif

        <strong>
            <i class="fa fa-user margin-r-5"></i> 
            Utilizada por
        </strong>

        <p class="text-muted">{{ $machine->user->name }} {{ $machine->user->lastname }}</p>

        <hr>

        <strong>
            <i class="fa fa-sitemap margin-r-5"></i> 
            Área
        </strong>

        <p class="text-muted">{{ $machine->user->area->name }}</p>

        <hr>

        <strong>
            <i class="fa fa-envelope margin-r-5"></i> 
            Email
        </strong>

        <p class="text-muted dont-break-out">{{ $machine->user->email }}</p>

        <hr>

        <strong>
            <i class="fa fa-phone margin-r-5"></i> 
            Teléfono
        </strong>

        <p class="text-muted">{{ $machine->user->phone }}</p>

        <hr>

        <a href="{{ route('machines.withoutimage', $machine->id) }}" class="btn btn-primary btn-block"><b>Sin imágen</b></a>

        <a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-warning btn-block"><b>Modificar</b></a>

        {{-- Boton eliminar usuario --}}
        <a href="#" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal"><b>Eliminar</b></a>

        {{-- Modal --}}
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                {{-- Modal content --}}
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Alerta!</h4>
                </div>
                <div class="modal-body">
                    <p>Está seguro que desea eliminar la máquina <b>"{!! $machine->name !!}"</b> asociada a <b>"{{ $machine->user->name }} {{ $machine->user->lastname }}"</b> del área <b>"{{ $machine->user->area->name }}"</b>?</p>

                    <p><strong>Importante: </strong>se eliminarán todos los eventos asociados a dicha máquina por lo que perderá el historial de seguimiento de reparaciones asociadas.</p>
                </div>
                <div class="modal-footer">

                    {{ Form::open(['route' => ['machines.destroy', $machine->id], 'method' => 'DELETE']) }}
                        {{ Form::submit('Sí', ['class' => 'btn btn-danger btn-sm btn-sm']) }}

                        <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">No</button>
                    {{ Form::close() }}

                </div>
                </div>

            </div>
        </div>
        
    </div>{{-- /.box-body --}}
</div>{{-- /.box --}}