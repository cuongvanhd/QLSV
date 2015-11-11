<?php
/**
 * create class User
 */
 use Illuminate\Auth\UserInterface; 
 class CaUser extends Eloquent implements UserInterface{
 	
	protected $table='ca_user';
	protected $fillable = array('username','password');
	public $timestamps = false;
	 
public function getAuthIdentifier(){
 	return $this->getKey();
 	}
 	public function getAuthPassword(){
 	return $this->password;
 	}
	public function getRememberToken(){
		
	}
	public function setRememberToken($value){
		
	}
	public function getRememberTokenName(){
		
	}
 
	/**
	 * Validation rules
	 */
	public static $rules=array(
	
	'username' => 'required',
	'password' => 'required',
	);
	
	/**
	 * function Validate User
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
