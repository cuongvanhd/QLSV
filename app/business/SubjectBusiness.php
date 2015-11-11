<?php
/**
 * Class SubjectBusiness
 */
class SubjectBusiness {
	
	/**
	 * Method using to get list of subject and put to datatable model.
	 * @param $dtModel
	 * @return mixed
	 */ 	
	 public function getListSubjectDatatable(DatatableModel $dtModel) {

        // Set total record.
        $dtModel -> set_iTotalRecords(CaSubject::count());

        // Create search.
        $link = '%' . $dtModel -> get_sSearch() . '%';

        //Set tottal display record.
        $dtModel -> set_iTotalDisplayRecords(CaSubject::where('subject_name', 'like', $link) -> count());

        // Order by.
        switch ($dtModel->get_iSortCol_0 ()) {
            case 0 :
                $orderCol = "id";
                break;
            case 1 :
                $orderCol = "subject_name";
                break; 
            default :
                $orderCol = "id";
                break;
        }

        // Plus.
        $sortDir = $dtModel -> get_sSortDir_0();

        // Limit
        $offset = $dtModel -> get_iDisplayStart();
        $limit = $dtModel -> get_iDisplayLength();

        // Query.
        $listQueryData = CaSubject::where('subject_name', 'like', $link) -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();

        // Set.
        $dtModel -> set_aaData($listQueryData);

        // return Response::json($dtModel->toArray());
        return $dtModel;
    }
	 
	/**
	 * Method using to add new subject
	 */ 
	 public function addSubject($data){
	 	
		$subject = new CaSubject();
		
		$subject->subject_name=trim($data);
		
		//save to DB
		$subject->save();
	 }
	 
	 /**
	 * Method using to update subject
	 * @param $id
     * @param $data
	 */ 
	 public function updateSubject($id, $data){
	 	
		//get Classes by Id
		$subject = CaSubject::find($id);
		$subject->subject_name=trim($data);
		$subject->save();
	 }
	 
	  /**
	 * Method using to delete subject
	 * @param $id
	 */ 
	 public function deleteSubject($id){
	 	
		//get Subject by Id
		$subject = CaSubject::find($id);
		
		//delete subject
		$subject->delete();
		
	 }
	 
	 /**
     * Method using to get subject by Id
     * @param $id
     * 
     */
    public function getSubjectById($id) {
        return CaSubject::find($id);
    }
	 
}
