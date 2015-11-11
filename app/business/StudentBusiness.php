<?php
/**
 * Class StudentBusiness
 */
 class StudentBusiness {
 	
	/**
	 * Method using to get list of student and put to datatable model.
	 * @param $dtModel
	 * @return mixed
	 */ 	
	 public function getListStudentDatatable(StudentDatatableModel $dtModel) {

        // Set total record.
        $dtModel -> set_iTotalRecords(CaStudent::count());

        // Create search.
        $classes=intval($dtModel->get_iClass());
        $link = '%' . $dtModel -> get_sSearch() . '%';

        //Set total display record.
        if($classes>0){
        	$dtModel -> set_iTotalDisplayRecords(CaStudent::where('classes_id', '=', $classes) -> count());
        }else{
        	  $dtModel -> set_iTotalDisplayRecords(CaStudent::where('name', 'like', $link) -> count());
			
        }
        // Order by.
        switch ($dtModel->get_iSortCol_0 ()) {
            case 0 :
                $orderCol = "id";
                break;
            case 1 :
                $orderCol = "name";
                break; 
			case 2 :
                $orderCol = "birthday";
                break; 
			case 3 :
                $orderCol = "sex";
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

	
		$selectColumn=array('ca_students.id','ca_students.name', 'ca_students.birthday', 'ca_students.sex', 'ca_students.classes_id', 'ca_classes.classes_name');
        
        // Query.
        if($classes>0){
        	//$listQueryData = CaStudent::where('classID', '=', $classes) -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();
             $listQueryData=CaStudent::select($selectColumn)->join('ca_classes','ca_students.classes_id','=','ca_classes.id')
			 ->where('classes_id', '=', $classes) -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();
        }else{
        	//$listQueryData = CaStudent::where('name', 'like', $link) -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();
        	 $listQueryData=CaStudent::select($selectColumn)->join('ca_classes','ca_students.classes_id','=','ca_classes.id')
			 ->where('ca_students.name', 'like', $link) -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();
        }
 
        // Set.
        $dtModel -> set_aaData($listQueryData);

       
        return $dtModel;
    }
	 
	/**
	 * Method using to add new student
	 */ 
	 public function addStudent($data){
	 	
		$student = new CaStudent();
		
		$student->name=trim($data['name']);
		$student->birthday=trim($data['birthday']);
		$student->sex=$data['sex'];
		$student->classes_id=$data['classes_id'];
		
		//save to DB
		$student->save();
	 }
	 
	 /**
	 * Method using to update student
	 * @param $id
     * @param $data
	 */ 
	 public function updateStudent($id, $data){
	 	
		//get Student by Id
		$student = CaStudent::find($id);
		
		$student->name=trim($data['name']);
		$student->birthday=trim($data['birthday']);
		$student->sex=$data['sex'];
		$student->classes_id=$data['classes_id'];
		
		//save to DB
		$student->save();
	 }
	 
	  /**
	 * Method using to delete student
	 * @param $id
	 */ 
	 public function deleteStudent($id){
	 	
		//get Student by Id
		$classes = CaStudent::find($id);
		
		//delete student
		$classes->delete();
		
	 }
	 
	 /**
     * Method using to get student by Id
     * @param $id
     * 
     */
    public function getStudentById($id) {
        return CaStudent::find($id);
    }
 }
