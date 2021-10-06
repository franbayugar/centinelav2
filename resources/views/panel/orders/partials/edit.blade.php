{{-- Data Edit --}}
<div class="col-md-9">
    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Modificar</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="settings">

            {!! Form::open(['route' => ['orders.update', $order->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="box-body">
                {{ Form::hidden('product_id', $order->product_id) }}

                {{ Form::hidden('user_id', \Auth::user()->id) }}

                @if ( $order->statusoutput_id == 1 )
                    {{-- Cantidad --}}
                    <div class="form-group">
                        {!! Form::label('quantity', 'Cantidad') !!}
                        {!! Form::text('quantity', $order->quantity, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'data-validation' => 'number', 'data-validation-allowing' => 'range[1;999]']) !!}
                    </div>
                @else
                    {{ Form::hidden('quantity', $order->quantity) }}
                @endif
                {{-- Description --}}
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', $order->description, ['class' => 'form-control', 'data-validation' => 'required', 'placeholder' => 'Ingrese descripción. Ej: Razón de la solicitud, recuento de páginas impresas en caso de solicitar toner.']) !!}
                </div>
        
            </div>
        
            <div class="box-footer">
                {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
            </div>
            {!! Form::close() !!}

        </div>
        {{-- /.tab-pane --}}
    </div>
    {{-- /.tab-content --}}
    </div>
    {{-- /.nav-tabs-custom --}}
</div>
{{-- /.col --}}