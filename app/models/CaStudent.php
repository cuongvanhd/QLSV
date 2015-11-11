<?php
/**
 * class CaStudent
 */
 class CaStudent extends Eloquent{
 	
	protected $table='ca_students';
	
	public $timestamps = false;
	
	//relationship
	public function classes(){
		$this->belongsTo('CaClasses');
	}
	public function point(){
		$this->hasMany('CaPoint');
	}
 }
