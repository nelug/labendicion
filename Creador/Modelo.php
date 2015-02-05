<?php

class Modelo 
{
	protected $model=null;

	public function __construct($model)
	{
		$this->model = $model;
	}

	public static crear()
	{
		$filename =app_path().'/models/'.ucfirst($model).'.php';

		if (file_exists ( $filename )==false) 
		{
			$contenido=$this->crud();
			$fp=fopen($filename,'x');
			fwrite($fp,$contenido);
			fclose($fp) ;

			return 'Modelo '.$this->model.' Creado..!';
		}
	}

	public function model()
	{
		$contenido = '<?php

		use \NEkman\ModelLogger\Contract\Logable;

		class '.ucfirst($this->model).' extends \BaseModel implements Logable {

			protected $table = "'.$this->model.'s"

			protected $guarded = array("id");

			protected $fillable = [];

			public function getLogName() 
			{
				return $this->id;
			}

		}';

		return $contenido;
	}

}