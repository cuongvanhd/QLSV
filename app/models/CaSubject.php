<?php
/**
 * Class CaSubject
 */
class CaSubject extends Eloquent{
	
	protected $table='ca_subjects';
	
	public $timestamps = false;
	
	//relationship
	public function point(){
		$this->hasMany('CaPoint');
	}
}
