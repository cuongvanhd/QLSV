<?php
/**
 * Class ClassesController
 */
Class ClassesController extends BaseController {

	/**
	 * @var ClassesBusiness
	 */
	private $classesBusiness;

	/**
	 * Constructor.
	 * @param ClassesBusiness $classesBusiness
	 */
	public function __construct(ClassesBusiness $classesBusiness) {
		$this -> classesBusiness = $classesBusiness;
	}

	/**
	 * Method using to display manage classes index page
	 */
	public function index() {

		return View::make('classes.index');
	}

	/**
	 * Method using to display create page.
	 * @return mixed
	 */
	public function create() {

		// Create empty Classes obj   array('classes', $classes)
		//$classes = new CaClasses();
		return View::make('classes.add');
	}

	/**
	 * Method using to add new Classes
	 */
	public function store() {

		//Get data form input
		$data = Input::get('name');

		$result = $this -> classesBusiness -> addClasses($data);

		return Redirect::route('classes.index');
	}

	/**
	 * Method using to display edit page
	 */
	public function edit($id) {

		//get classes by ID
		$classes = $this -> classesBusiness -> getClassesById($id);
		$classes_name=$classes->classes_name;
		//return view
		return View::make('classes.edit')->with('classes_name',$classes_name);

	}

	/**
	 * Method using to update classes
	 */
	public function update($id) {

		// Get data from Input
		$data = Input::get('name');

		//Get classes by ID
		$result = $this -> classesBusiness -> updateClasses($id, $data);

		//return Redirect::route('classes.index');
	}

	/**
	 * Method using to delete classes
	 */
	public function destroy($id) {

		//delete classes
		$result=$this -> classesBusiness -> deleteClasses($id);

		//return
		return json_encode($result);
		//return Redirect::to('/classes');
	}
	
	/**
	 * Method using to load classes datatable
	 */
	public function loadClassesDatatable() {

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

        // Get list of Classes then put to dtModel.
        $dtModel = $this->classesBusiness->getListClassesDatatable($dtModel);

        // Return.
        return $dtModel->toJson();
    }

}
