<div class="formulario-label-fiel">
  {!! Form::label('name', 'Nombre', array('class' => 'formulario-label ')) !!}
  {!! Form::text('name', null ,['class' => 'formulario-field']) !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('email', 'Email', array('class' => 'formulario-label ')) !!}
  {!! Form::text('email', null ,['class' => 'formulario-field']) !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('celular', 'Celular', array('class' => 'formulario-label ')) !!}
  {!! Form::text('celular', null ,['class' => 'formulario-field']) !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('direccion', 'Dirección', array('class' => 'formulario-label ')) !!}
  {!! Form::text('direccion', null ,['class' => 'formulario-field']) !!}
</div>



<div class="formulario-label-fiel">
  {!! Form::label('factura_con_iva', '¿Factura con IVA?', array('class' => 'formulario-label ')) !!}
  {!! Form::select('factura_con_iva',['si' => 'Activo',
                             'no' => 'Inactivo'] , null )          !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('razon_social', 'Razon social', array('class' => 'formulario-label ')) !!}
  {!! Form::text('razon_social', null ,['class' => 'formulario-field']) !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('rut', 'Rut', array('class' => 'formulario-label ')) !!}
  {!! Form::text('rut', null ,['class' => 'formulario-field']) !!}
</div>

