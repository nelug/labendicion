<?php
class Controlador 
{
	protected $columnas=null; 
	protected $model=null;

	public function __construct($columnas,$model)
	{
		$this->columnas = $columnas;
		$this->model = $model;
	}

	public static crear()
	{
		$filename =app_path().'/controllers/'.ucfirst($this->model).'Controller.php';
		
		if (file_exists ( $filename )==false) 
		{
			$contenido=$this->crud();
			$fp=fopen($filename,'x');
			fwrite($fp,$contenido);
			fclose($fp) ;

			return 'Controlador '.$this->model.' Creado..!';
		}
	}

	public function crud()
	{
		$contenido ='?php

class '.ucfirst($this->model).'Controller extends BaseController {


	public function mostrar()
	{
		return View::make("'.$this->model.'s.mostrar");
	}

	public function lista()
	{
		$table = "'.$this->model.'s";

		$columns = array(id, '.$this->arrayColums().');

		$Searchable = array('.$this->arrayColums().');

		echo SearchTable::get($table, $columns, $Searchable);
	}

	public function create()
	{
		if (Input::has("_token"))
		{
			$'.$this->model.' = new '.ucfirst($this->model).';

			if ($'.$this->model.'->_create())
			{
				return "success";
			}

			return $'.$this->model.'->errors();
		}

		return View::make("'.$this->model.'s.create");
	}

	public function edit()
	{
		if (Input::has("_token"))
		{
			$'.$this->model.' = '.ucfirst($this->model).'::find(Input::get("id"));

			if ( $'.$this->model.' ->_update() )
			{
				return "success";
			}

			return $'.$this->model.'->errors();
		}

		$'.$this->model.' = '.ucfirst($this->model).'::find(Input::get("id"));

		return View::make("'.$this->model.'s.edit", compact("'.$this->model.'"));
	}

	public function delete()
	{
		$delete = '.ucfirst($this->model).'::destroy(Input::get("id"));

		if ($delete)
		{
			return "success";
		}

		return "error al tratar de eliminar";
	}
}';

		return $contenido;
	}

	public function arrayColums()
	{
	 $colums=null;
		for ($i=0; $i < (count($this->columnas)-1); $i++) 
		{ 
			if ($i < (count($this->columnas)-2))
				$colums.='"'.$this->columnas[$i].'",';
			else
				$colums.='"'.$this->columnas[$i].'"';
		}
		return $colums;
	}
}
