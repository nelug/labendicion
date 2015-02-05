<?php

class Vista 
{
	protected $model=null;
	protected $columnas=null; 
	protected $contenidoCrear=null;
	protected $contenidoEditar=null;
	protected $contenidoMostrar=null;



	public function __construct($columnas,$model)
	{
		$this->model = $model;
		$this->columnas = $columnas;	}

		public function crearDirectorio()
		{
			$filename =app_path().'/views/'.$this->model.'s';
			mkdir($filename, 0700);
		}

		public function vistaCrear()
		{

			$contenido=
			'
			{{ Form::_open("'.ucfirst($model).'creado") }}

			'.$this->contenidoCrear.'

			{{ Form::close() }}

			';


		}

		public function vistaEditar()
		{
			$contenido=
			'
			{{ Form::_open("'.ucfirst($model).'creado") }}

			{{ Form::hidden("id", @$'.$this->model.'->id) }}

			'.$this->contenidoCrear.'

			{{ Form::close() }}

			';
		}

		public function vistaMostrar()
		{

		}

		public function columnas()
		{

			for ($i=0; $i < (count($this->columnas)-1); $i++) 
			{ 
				if ($i < (count($this->columnas)-2))
				{
					$contenidoCrear.='


					{{ Form::_text("'.$this->columnas[$i].'") }}';

					$contenidoEditar.='


					{{ Form::_text("'.$this->columnas[$i].'", @$'.$this->model.'->'.$this->columnas[$i].') }';
				}
			}

		}
	}
/*
 $contenido ='
<script>
$(document).ready(function() {

    proccess_table("Items");

    $("#example").dataTable({

        "order": [[ 0, "desc" ]],
        
        "aoColumnDefs": [
            {"sClass": "hover widthS hide",   "sTitle": "Id",             "aTargets": [0]},
            {"sClass": "hover widthS",        "sTitle": "Codigo",         "aTargets": [1]},
            {"sClass": "hover widthS",        "sTitle": "Descripcion",    "aTargets": [2]},
            {"sClass": "hover widthS", 		  "sTitle": "Precio",         "aTargets": [3]},
            {"sClass": "hover widthS",        "sTitle": "Creado en",      "aTargets": [4]},
            {"sClass": "hover widthS",        "sTitle": "Actualizado en", "aTargets": [5]},
        ],

        "fnDrawCallback": function( oSettings ) {
            $( ".DTTT" ).html("");
            $( ".DTTT" ).append();
            $( ".DTTT" ).append();
            $( ".DTTT" ).append();
        },

        "bJQueryUI": false,
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": "productos/mostrar"
    });

});
</script>';


 /*
 '<button id="_create" class="btn btngrey"><i class="fa fa-plus-square"></i> Nuevo</button>' 
 '<button id="_edit" class="btn btngrey btn_edit" disabled><i class="fa fa-pencil"></i> Editar</button>'
 '<button id="_delete" class="btn btngrey btn_edit" disabled><i class="fa fa-times"></i> Eliminar</button>'
  */
 