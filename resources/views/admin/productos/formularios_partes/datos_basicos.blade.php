<div class="formulario-label-fiel">
  
{!! Form::label('categoria_id', 'Categoria', ['class' => 'control-label']) !!}

<select style="margin: 15px 0;" value="{{ Input::old('categoria_id') }}" name="categoria_id">
                   
       <OPTION 
                      VALUE="0"
                      >
       Selecciona
        </OPTION>
      @foreach($Categorias as $Categoria)
        <OPTION @if(isset($Entidad)) @if($Entidad->categoria_id == $Categoria->id ) selected @endif @endif
                      VALUE="{{$Categoria->id}}"
                      >
        {{$Categoria->name}} 
        </OPTION>
      @endforeach 
</select>

</div>

<div class="formulario-label-fiel">
  {!! Form::label('name', 'Nombre', array('class' => 'formulario-label ')) !!}
  {!! Form::text('name', null ,['class' => 'formulario-field']) !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('description', 'Descripción', array('class' => 'formulario-label ')) !!}
  {!! Form::textarea('description', null ,['class' => 'formulario-field',
                                           'cols'    => '8',
                                           'row'    => '8' ]) !!}
</div>


<div class="formulario-label-fiel">
  {!! Form::label('ubicacion', 'Ubicación', array('class' => 'formulario-label ')) !!}
  {!! Form::text('ubicacion', null ,['class' => 'formulario-field']) !!}
</div>





