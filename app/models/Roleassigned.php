<?php 

use \NEkman\ModelLogger\Contract\Logable;

class Roleassigned extends Eloquent implements Logable {

	protected $table = 'assigned_roles';

	protected $guarded = array('id');

	protected $fillable = [];

	public $timestamps = false;

	/**
	 * [getLogName description]
	 * @return el usuario que esta Autenticado
	 */
	public function getLogName() 
	{
		return $this->id;
	}
}