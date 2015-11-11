<?php
/**
 * The Class ModelBase.
 * Contains: List error.
 */
class ModelBase {
	/**
	 * List contains error code.
	 */
	var $list_error_code = array ();
	
	public function get_list_error_code() {
		
		return $this->list_error_code;
	
	}
	
	public function set_list_error_code($list_error_code) {
		
		$this->list_error_code = $list_error_code;
	
	}

}
