<?php
/**
 * class SubjectController
 */
class SubjectController extends BaseController{
	
	/**
	 * @var SubjectBusiness
	 */
	private $subjectBusiness;
	
	/**
	 * Constructor.
	 * @param SubjectBusiness $subjectBusiness
	 */
	public function __construct(SubjectBusiness $subjectBusiness) {
		$this -> subjectBusiness = $subjectBusiness;
	}
	
	/**
	 * Method using to display manage subject index page
	 */
	public function index() {

		return View::make('subject.index');
	}

	/**
	 * Method using to display create page.
	 * @return mixed
	 */
	public function create() {

		return View::make('subject.add');
	}

	/**
	 * Method using to add new subject
	 */
	public function store() {

		//Get data form input
		$data = Input::get('name');

		$result = $this -> subjectBusiness -> addSubject($data);

		return Redirect::route('subject.index');
	}

	/**
	 * Method using to display edit page
	 */
	public function edit($id) {

		//get classes by ID
		$subject = $this -> subjectBusiness -> getSubjectById($id);
		$subject_name=$subject->subject_name;
		//return view
		return View::make('subject.edit')->with('subject_name',$subject_name);

	}

	/**
	 * Method using to update subject
	 */
	public function update($id) {

		// Get data from Input
		$data = Input::get('name');

		//Get classes by ID
		$result = $this -> subjectBusiness -> updateSubject($id, $data);

		return Redirect::route('subject.index');
	}

	/**
	 * Method using to delete subject
	 */
	public function destroy($id) {

		//delete classes
		$result=$this -> subjectBusiness -> deleteSubject($id);

		//return
		return json_encode($result);
	}
	
	/**
	 * Method using to load subject datatable
	 */
	public function loadSubjectDatatable() {

        // Create dtModel from Input
        $dtModel = new DatatableModel();
        $dtModel->set_sSearch(Input::get('sSearch'));
        $dtModel->set_iDisplayStart(Input::get('iDisplayStart'));
        $dtModel->set_iDisplayLength(Input::get('iDisplayLength'));
        $dtModel->set_iSortingCols(Input::get('iSortingCols'));
        $dtModel->set_iSortCol_0(Input::get('iSortCol_0'));
        $dtModel->set_sSortDir_0(Input::get('sSortDir_0'));
        $dtModel->set_iTotalRecords(Input::get('iTotalRecords'));
        $dtModel->set_iTotalDisplayRecords(Input::get('iTotalDisplayRecords'));

        // Get list of Subject then put to dtModel.
       $dtModel = $this->subjectBusiness->getListSubjectDatatable($dtModel);
        // Return.
        return $dtModel->toJson();
    }
	
	
}
