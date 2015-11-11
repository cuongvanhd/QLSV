<?php

use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Contracts\JsonableInterface;
// TODO: Auto-generated Javadoc
/**
 * Contains data table model.
 *
 */
class StudentDatatableModel extends DatatableModel {
	
	var $iClass = '';

    public function get_iClass() {

        return $this->iClass;

    }

    public function set_iClass($iClass) {

        $this->iClass = $iClass;

    }
	
	/* (non-PHPdoc)
	 * @see JsonableInterface::toJson()
	 */ 
	public function toJson($options = 0) {
		// Return Json
		return json_encode ( array(
		"sSearch" => $this->get_sSearch(),
        "iClass" => $this->get_iClass(),
        "iDisplayStart" => $this->get_iDisplayStart(),
		"iDisplayLength" => $this->get_iDisplayLength(), 
		"iSortingCols" => $this->get_iSortingCols(), 
		"iSortCol_0" => $this->get_iSortCol_0(), 
		"sSortDir_0" => $this->get_sSortDir_0(), 
		"iTotalRecords" => $this->get_iTotalRecords(), 
		"iTotalDisplayRecords" => $this->get_iTotalDisplayRecords(),
		"aaData" => $this->get_aaData()->toArray() ) );
	}
	
}
