<?php
/**
 * Class CaPoint
 */
class CaPoint extends Eloquent{
	
	protected $table ='ca_points';
	
	public $timestamps = false;
	
	//relationship
	public function student(){
		$this->belongsTo('CaStudent');
	}
	public function subject(){
		$this->belongsTo('CaSubject');
	}
}
