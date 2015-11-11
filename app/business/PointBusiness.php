<?php
/**
 * Class PointBusiness
 */
class PointBusiness {

	/**
	 * Method using to get list of point and put to datatable model.
	 * @param $dtModel
	 * @return mixed
	 */
	public function getListPointDatatable(PointDatatableModel $dtModel) {

		// Set total record.
		$dtModel -> set_iTotalRecords(CaPoint::count());

		// Create search.
		$student = intval($dtModel -> get_iStudent());
		$subject = intval($dtModel -> get_iSubject());

		$link = intval(trim($dtModel -> get_sSearch()));

		//Set tottal display record.
		switch (($student > 0) .'|'. ($subject >0)) {
			case true . '|' . true :
				$dtModel -> set_iTotalDisplayRecords(CaPoint::where('student_id', '=', $student) -> where('subject_id', '=', $subject) -> count());
				break;
			case true . '|' . false :
				$dtModel -> set_iTotalDisplayRecords(CaPoint::where('student_id', '=', $student) -> count());
				break;
			case false . '|' . true :
				$dtModel -> set_iTotalDisplayRecords(CaPoint::where('subject_id', '=', $subject) -> count());
				break;
			default :
				$dtModel -> set_iTotalDisplayRecords(CaPoint::count());
				break;
		}
		if($link >0){
			$dtModel -> set_iTotalDisplayRecords(CaPoint::where('point','=',$link)->count());
		}
		// Order by.
		switch ($dtModel->get_iSortCol_0()) {
			case 0 :
				$orderCol = "student_id";
				break;
			case 1 :
				$orderCol = "subject_id";
				break;
			case 2 :
				$orderCol = "point";
				break;
			default :
				$orderCol = "student_id";
				break;
		}

		// Plus.
		$sortDir = $dtModel -> get_sSortDir_0();

		// Limit
		$offset = $dtModel -> get_iDisplayStart();
		$limit = $dtModel -> get_iDisplayLength();

		$selectColumn = array('ca_students.name', 'ca_subjects.subject_name', 'ca_points.point', 'ca_points.id'); //,'ca_students.id as id_students'

		//query main
		$listQueryData = CaPoint::select($selectColumn) -> join('ca_students', 'ca_students.id', '=', 'ca_points.student_id') -> join('ca_subjects', 'ca_subjects.id', '=', 'ca_points.subject_id');
		
		// Query filter by student name
		if ($student > 0) {
			$listQueryData = $listQueryData -> where('student_id', '=', $student);
		}

		// Query filter by subject name
		if ($subject > 0) {
			$listQueryData = $listQueryData -> where('subject_id', '=', $subject);
		}

		if($link>0){
			$listQueryData = $listQueryData -> where('point', '=', $link);
		}
		
		$listQueryData = $listQueryData -> orderBy($orderCol, $sortDir) -> skip($offset) -> take($limit) -> get();

		// Set.
		$dtModel -> set_aaData($listQueryData);

		return $dtModel;
	}

	/**
	 * Method using to add new point
	 */
	public function addPoint($data) {

		$point = new CaPoint();

		$point -> student_id = $data['student'];
		$point -> subject_id = $data['subject'];
		$point -> point = trim($data['point']);

		//save to DB
		$point -> save();
	}

	/**
	 * Method using to update point
	 * @param $id
	 * @param $data
	 */
	public function updatePoint($id, $data) {

		//get Point by Id
		$point = CaPoint::find($id);

		$point -> student_id = $data['student'];
		$point -> subject_id = $data['subject'];
		$point -> point = trim($data['point']);

		//save to DB
		$point -> save();
	}

	/**
	 * Method using to delete point
	 * @param $id
	 */
	public function deletePoint($id) {

		//get Point by Id
		$point = CaPoint::find($id);

		//delete point
		$point -> delete();

	}

	/**
	 * Method using to get point by Id
	 * @param $id
	 *
	 */
	public function getPointById($id) {
		
		return CaPoint::find($id);
	}

}
