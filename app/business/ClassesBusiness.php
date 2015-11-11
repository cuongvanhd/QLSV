<?php
/**
 * Class ClassesBusiness
 */
 class ClassesBusiness{

	/**
	 * Method using to get list of classes and put to datatable model.
	 * @param $dtModel
	 * @return mixed
	 */ 	
	 public function getListClassesDatatable(DatatableModel $dtModel) {

        // Set total record.
        $dtModel -> set_iTotalRecords(CaClasses:: count());

        // Create search.
        $link = '%' . $dtModel -> get_sSearch() . '%';

        //Set tottal display record.
        $dtModel -> set_iTotalDisplayRecords(CaClasses::where('classes_name', 'like', $link) -> count());

        // Order by.
        switch ($dtModel->get_iSortCol_0 ()) {
            case 0 :
                $orderCol = "id";
                break;
            case 1 :
                $orderCol = "classes_name";
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
        $listQueryData = CaClasses::where('classes_name', 'like', $link) -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();

        // Set.
        $dtModel -> set_aaData($listQueryData);

        return $dtModel;
    }
	 
	/**
	 * Method using to add new classes
	 */ 
	 public function addClasses($data){
	 	
		$classes = new CaClasses();
		
		$classes->classes_name=trim($data);
		
		//save to DB
		$classes->save();
	 }
	 
	 /**
	 * Method using to update classes
	 * @param $id
     * @param $data
	 */ 
	 public function updateClasses($id, $data){
	 	
		//get Classes by Id
		$classes = CaClasses::find($id);
		$classes->classes_name=trim($data);
		$classes->save();
	 }
	 
	  /**
	 * Method using to delete classes
	 * @param $id
	 */ 
	 public function deleteClasses($id){
	 	
		//get Classes by Id
		$classes = CaClasses::find($id);
		
		//delete classes
		$classes->delete();
		
	 }
	 
	 /**
     * Method using to get classes by Id
     * @param $id
     * 
     */
    public function getClassesById($id) {
        return CaClasses::find($id);
    }
	 
 }
