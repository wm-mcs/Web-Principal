<div class="formulario-label-fiel">
  {!! Form::label('estado', 'Estado', array('class' => 'formulario-label ')) !!}
  {!! Form::select('estado',['si' => 'Activo',
                             'no' => 'Desactivar'] , null )          !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('role', 'Role', array('class' => 'formulario-label ')) !!}
  @if(Auth::user()->role != 'adminMcos522')
     {!! Form::select('role', config('options.role_para_user'),null ) !!}
  @else
     {!! Form::select('role', config('options.role'),null ) !!}
  @endif 
</div>

<div class="formulario-label-fiel">
  {!! Form::label('contrato_pagina_web', '¿Contrató Web?', array('class' => 'formulario-label ')) !!}
  {!! Form::select('contrato_pagina_web',['si' => 'Activo',
                             'no' => 'Desactivar'] , null )          !!}
</div>

<div class="formulario-label-fiel">
  {!! Form::label('contrato_sistema_gestion', '¿Contrató sistema de gestión?', array('class' => 'formulario-label ')) !!}
  {!! Form::select('contrato_sistema_gestion',['si' => 'Activo',
                             'no' => 'Desactivar'] , null )          !!}
</div>