<?php
/**
 * Class PointController
 */
Class PointController extends BaseController{
	
	/**
	 * @var pointBusiness
	 */
	private $pointBusiness;

	/**
	 * Constructor.
	 * @param pointBusiness $pointBusiness
	 */
	public function __construct(PointBusiness $pointBusiness) {
		$this -> pointBusiness = $pointBusiness;
	}

	/**
	 * Method using to display manage point index page
	 */
	public function index() {
		
		$student=array('0' =>'All')+CaStudent::lists('name','id');
		$subject=array('0' =>'All')+CaSubject::lists('subject_name','id');
		return View::make('point.index')->with('student',$student)->with('subject',$subject);
	}

	/**
	 * Method using to display create page.
	 * @return mixed
	 */
	public function create() {
		
		//return View
		$student=array('0' =>'All')+CaStudent::lists('name','id');
		$subject=array('0' =>'All')+CaSubject::lists('subject_name','id');
		
		return View::make('point.add')->with('student',$student)->with('subject',$subject);
	}

	/**
	 * Method using to add new Point
	 */
	public function store() {

		//Get data form input
		$data = Input::all();
    
		$result = $this -> pointBusiness -> addPoint($data);

		return Redirect::route('point.index');
	}

	/**
	 * Method using to display edit page
	 */
	public function edit($id) {

		//get point by ID
		$point = $this -> pointBusiness -> getPointById($id);
		
		$student=array('0' =>'All')+CaStudent::lists('name','id');
		$subject=array('0' =>'All')+CaSubject::lists('subject_name','id');
		
		return View::make('point.edit')->with('point',$point)->with('student',$student)->with('subject',$subject);

	}

	/**
	 * Method using to update point
	 */
	public function update($id) {

		// Get data from Input
		$data = Input::all();
		
		//update point by ID
		$result = $this -> pointBusiness -> updatePoint($id, $data);

	}

	/**
	 * Method using to delete point
	 */
	public function destroy($id) {

		//delete point
		$result=$this -> pointBusiness -> deletePoint($id);

		//return
		return json_encode($result);
		
	}
	
	/**
	 * Method using to load point datatable
	 */
	public function loadPointDatatable() {

        // Create dtModel from Input
        $dtModel = new PointDatatableModel();
        $dtModel->set_sSearch(Input::get('sSearch'));
		$dtModel->set_iStudent(Input::get('iStudent'));
		$dtModel->set_iSubject(Input::get('iSubject'));
        $dtModel->set_iDisplayStart(Input::get('iDisplayStart'));
        $dtModel->set_iDisplayLength(Input::get('iDisplayLength'));
        $dtModel->set_iSortingCols(Input::get('iSortingCols'));
        $dtModel->set_iSortCol_0(Input::get('iSortCol_0'));
        $dtModel->set_sSortDir_0(Input::get('sSortDir_0'));
        $dtModel->set_iTotalRecords(Input::get('iTotalRecords'));
        $dtModel->set_iTotalDisplayRecords(Input::get('iTotalDisplayRecords'));

        // Get list of Point then put to dtModel.
        $dtModel = $this->pointBusiness->getListPointDatatable($dtModel);

        // Return.
        return $dtModel->toJson();
    }
	
	
}
