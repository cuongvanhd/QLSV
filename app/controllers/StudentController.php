<?php
/**
 * Class StudentController
 */
Class StudentController extends BaseController{
	
	/**
	 * @var studentBusiness
	 */
	private $studentBusiness;

	/**
	 * Constructor.
	 * @param StudentBusiness $studentBusiness
	 */
	public function __construct(StudentBusiness $studentBusiness) {
		$this -> studentBusiness = $studentBusiness;
	}

	/**
	 * Method using to display manage student index page
	 */
	public function index() {
		
		$classes=array('0' =>'All')+CaClasses::lists('classes_name','id');
		return View::make('student.index')->with('classes',$classes);
	}

	/**
	 * Method using to display create page.
	 * @return mixed
	 */
	public function create() {
		
		//return View
		$classes=array('0'=>'All')+CaClasses::lists('classes_name','id');
		return View::make('student.add')->with('classes',$classes);
	}

	/**
	 * Method using to add new Student
	 */
	public function store() {

		//Get data form input
		$data = Input::all();
    
		$result = $this -> studentBusiness -> addStudent($data);

		return Redirect::route('student.index');
	}

	/**
	 * Method using to display edit page
	 */
	public function edit($id) {

		//get student by ID
		$student = $this -> studentBusiness -> getStudentById($id);
		
		$classes=array('0' =>'All')+CaClasses::lists('classes_name','id');
		//return view
		return View::make('student.edit',array('student' => $student,'classes'=>$classes));

	}

	/**
	 * Method using to update student
	 */
	public function update($id) {

		// Get data from Input
		$data = Input::all();
		
		//update student by ID
		$result = $this -> studentBusiness -> updateStudent($id, $data);
		
		// if($result){
			// return Redirect::route('student.index');
		// }
	}

	/**
	 * Method using to delete student
	 */
	public function destroy($id) {

		//delete student
		$result=$this -> studentBusiness -> deleteStudent($id);

		//return
		return json_encode($result);
		
	}
	
	/**
	 * Method using to load student datatable
	 */
	public function loadStudentDatatable() {

        // Create dtModel from Input
        $dtModel = new StudentDatatableModel();
        $dtModel->set_sSearch(Input::get('sSearch'));
		$dtModel->set_iClass(Input::get('iClass'));
        $dtModel->set_iDisplayStart(Input::get('iDisplayStart'));
        $dtModel->set_iDisplayLength(Input::get('iDisplayLength'));
        $dtModel->set_iSortingCols(Input::get('iSortingCols'));
        $dtModel->set_iSortCol_0(Input::get('iSortCol_0'));
        $dtModel->set_sSortDir_0(Input::get('sSortDir_0'));
        $dtModel->set_iTotalRecords(Input::get('iTotalRecords'));
        $dtModel->set_iTotalDisplayRecords(Input::get('iTotalDisplayRecords'));

        // Get list of Students then put to dtModel.
        $dtModel = $this->studentBusiness->getListStudentDatatable($dtModel);

        // Return.
        return $dtModel->toJson();
    }
	
	
}
