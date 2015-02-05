<?php

class Ruta 
{
	
	protected $model=null;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public function agregar()
	{
		$contenido=$this->grupo();

		$filename =app_path().'/routes.php';

		$file = fopen($filename, "w");

		fwrite($file, $contenido );

		fclose($file);

		return 'Grupo de Rutas  '.$this->model.' Creado..!';
	}

	public function grupo()
	{

		$contenido='
		Route::group(array("prefix" => "'.$this->model.'s"), function()
		{
			Route::get("create",   "'.ucfirst($this->model).'Controller@create");
			Route::post("create",  "'.ucfirst($this->model).'Controller@create");
			Route::post("edit",    "'.ucfirst($this->model).'Controller@edit");
			Route::post("delete",  "'.ucfirst($this->model).'Controller@delete");
			Route::get("mostrar",  "'.ucfirst($this->model).'Controller@mostrar");
			Route::get("lista",    "'.ucfirst($this->model).'Controller@lista");
		});';

		return $contenido;
	}
