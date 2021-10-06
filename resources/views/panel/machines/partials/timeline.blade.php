<div class="tab-pane active" id="timeline">

        {{-- row --}}
        <div class="row">                        
            <div class="col-md-12">
                {{-- The time line --}}
                <ul class="timeline">

                    @foreach ($events as $event)
                        {{-- timeline time label --}}
                        <li class="time-label">
                            <span class="bg-red">
                                {!! date("d/m/Y", strtotime($event->admission_date)) !!}
                            </span>
                        </li>
                        {{-- /.timeline-label --}}

                        {{-- timeline item --}}
                        <li>
                            <i class="{!! $event->action->icon !!} {!! $event->statusrepair->color !!}"></i>
                            <div class="timeline-item">

                                <span class="time"><i class="fa fa-clock-o"></i> {!! date("H:i",strtotime($event->admission_date)) !!}</span>

                                <h3 class="timeline-header">
                                    <strong class="text-primary">
                                        {!! $event->user->name !!} {!! $event->user->lastname !!}
                                    </strong> 
                                    {!! $event->action->name !!}
                                </h3>

                                <div class="timeline-body expandable dont-break-out">
                                    {!! $event->description !!}
                                </div>

                                <div class='timeline-footer'>
                                    <a class="btn btn-warning btn-xs" href="{{ route('events.edit', $event->id) }}">Modificar</a>

                                    {{-- Boton eliminar evento --}}
                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModale"><b>Eliminar</b></a>

                                    {{-- Modal --}}
                                    <div id="myModale" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                            
                                            {{-- Modal content --}}
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Alerta!</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Está seguro que desea eliminar?</p>
                                            </div>
                                            <div class="modal-footer">
                            
                                                {{ Form::open(['route' => ['events.destroy', $event->id], 'method' => 'DELETE']) }}
                                                    {{ Form::submit('Sí', ['class' => 'btn btn-danger btn-sm btn-sm']) }}
                            
                                                    <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">No</button>
                                                {{ Form::close() }}
                            
                                            </div>
                                            </div>
                            
                                        </div>
                                    </div>
                                    
                                </div>

                            </div>
                        </li>
                        {{-- END timeline item --}}
                    @endforeach

                    <li>
                        <i class="fa fa-clock-o"></i>
                    </li>
                </ul>
            </div>{{-- /.col --}}
        </div>{{-- /.row --}}

</div>
{{-- /.tab-pane --}}