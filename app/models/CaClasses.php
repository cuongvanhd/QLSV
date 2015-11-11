<?php
/**
 * class CaClasses
 */
 Class CaClasses extends Eloquent{
 	
	protected $table ='ca_classes';
	
	public $timestamps = false;
	
	//relationship
	public function student(){
		return $this->hasMany('CaStudent');
	}
	
	public static $rule = array(
		'name' => 'required',
	);
	
	/**
	 * function Validate Classes
	 */
	 public static function isValid($data){
	 	
		$validation=Validator::make($data, static::$rules);
		
		if($validation->passes()){
			
			return true;
			
		}else{
			
			return false;
			
		}
	 }
	
 }
