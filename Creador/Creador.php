<?php 

class Creador 
{
	
	public function CrearMVC()
	{
		$controlador = new Controlador( $columnas , $modelo );
		$controlador->crear();

		$modelo = new Modelo($modelo);
		$modelo->crear();

		$ruta = new Ruta($modelo);
		$ruta->agregar();
	}

}


/**/