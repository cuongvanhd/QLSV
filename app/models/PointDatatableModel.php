<?php

use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Contracts\JsonableInterface;
// TODO: Auto-generated Javadoc
/**
 * Contains data table model.
 *
 */
class PointDatatableModel extends DatatableModel {
	
	var $iStudent = '';
	var $iSubject='';

    public function get_iStudent() {

        return $this->iStudent;

    }

    public function set_iStudent($iStudent) {

        $this->iStudent = $iStudent;

    }
	
	public function get_iSubject() {

        return $this->iSubject;

    }

    public function set_iSubject($iSubject) {

        $this->iSubject = $iSubject;

    }
	
	/* (non-PHPdoc)
	 * @see JsonableInterface::toJson()
	 */ 
	public function toJson($options = 0) {
		// Return Json
		return json_encode ( array(
		"sSearch" => $this->get_sSearch(),
        "iStudent" => $this->get_iStudent(),
        "iSubject" => $this->get_iSubject(),
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
