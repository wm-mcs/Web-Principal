<?php 

//Get Listado
Route::get('get_admin_empresas_gestion_socios',
[
  'uses'       => 'Admin_Empresa\Admin_Empresa_Gestion_Socios_Controllers@get_admin_empresas_gestion_socios',
  'as'         => 'get_admin_empresas_gestion_socios',

  'middleware' => 'role:adminMcos522'     
]);



//GET Crear
Route::get('get_admin_empresas_gestion_socios_crear',
[
  'uses'       => 'Admin_Empresa\Admin_Empresa_Gestion_Socios_Controllers@get_admin_empresas_gestion_socios_crear',
  'as'         => 'get_admin_empresas_gestion_socios_crear',

  'middleware' => 'role:adminMcos522'
]);

Route::post('set_admin_empresas_gestion_socios_crear',
[
  'uses'            => 'Admin_Empresa\Admin_Empresa_Gestion_Socios_Controllers@set_admin_empresas_gestion_socios_crear',
  'as'              => 'set_admin_empresas_gestion_socios_crear',

  'middleware' => 'role:adminMcos522'
]);


//GET Editar
Route::get('get_admin_empresas_gestion_socios_editar_{id}',
[
  'uses'       => 'Admin_Empresa\Admin_Empresa_Gestion_Socios_Controllers@get_admin_empresas_gestion_socios_editar',
  'as'         => 'get_admin_empresas_gestion_socios_editar',

  'middleware' => 'role:adminMcos522'
]); 


//Patch Editar
Route::patch('set_admin_empresas_gestion_socios_editar_{id}',
[
  'uses'       => 'Admin_Empresa\Admin_Empresa_Gestion_Socios_Controllers@set_admin_empresas_gestion_socios_editar',
  'as'         => 'set_admin_empresas_gestion_socios_editar',
  'middleware' => 'role:adminMcos522'
]); 


