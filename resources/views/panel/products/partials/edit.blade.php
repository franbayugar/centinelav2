<div class="col-md-9">
    <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Modificar</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="settings">

            {!! Form::open(['route' => ['products.update', $product->id], 'method' => 'PUT', 'files' => true]) !!}
            <div class="box-body">
                {{-- Nombre --}}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre', 'data-validation' => 'length', 'data-validation-length' => '3-191', 'required']) !!}
                </div>

                {{-- Imagen --}}
                <div class="form-group">
                    {!! Form::label('image', 'Imagen') !!}
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-primary" onclick="$(this).parent().find('input[type=file]').click();">Seleccionar</span>
                            <input name="image" onchange="$(this).parent().parent().find('.form-control').html($(this).val().split(/[\\|/]/).pop());" style="display: none;" type="file">
                            {{--{!! Form::file('image') !!}--}}
                        </span>
                        <span class="form-control"></span>
                    </div>
                    <p class="help-block">La imagen debe tener un máximo de 300x300 píxeles.</p>
                </div>
        
                {{-- Description --}}
                <div class="form-group">
                    {!! Form::label('description', 'Descripción') !!}
                    {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
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