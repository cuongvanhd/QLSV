@extends('layouts.default')

@section('body')
<div id="content">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>MANAGE STUDENT INFORMATION</h4>
			</div>
			<div class="panel-body">
				<p>You can insert, update, delete student</p>
			<div class="table-responsive">
				<!-- Customer filter by classes -->
			    <div class="row form-group">
				    <div class="col-sm-6 col-xs-12">
                         {{ Form::label('classes', 'Classes') }}
                         {{ Form::select('classes',$classes, '0', array('class' => 'form-control col-sm-6 col-xs-12', 'id' => 'classes-select')) }}
                     </div>
                </div>
				<!-- End Customer filter by classes -->
				<table id="student-list-table" class="table table-striped table-bordered table-hover table-green">
					<thead>
					<tr>
						<th style="width:2%;">ID</th>
						<th>FULLNAME</th>
						<th>BIRTHDAY</th>
						<th>SEX</th>
						<th>CLASSES_ID</th>
						<th>CLASSES_NAME</th>
						<th style="width:300px;">ACTION</th>
					</tr>
				</thead>
				<tbody></tbody>
				</table>
			</div>
			</div>
			<div class="footer">
				<button class="btn btn-success" id="add-student"><i class="glyphicon glyphicon-plus"></i>Add</button>
			</div>
		</div>
</div>
<!--  Add Modal Container -->
<div class="modal modal-flex fade" id="studentAddModal" tabindex="-1" role="dialog" aria-labelledby="studentAddModalLabel" aria-hidden="true">
	
</div>
<!--  Edit Modal Container -->
<div class="modal modal-flex fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="studentEditModalLabel" aria-hidden="true">
	
</div>
@stop

@section('outCss')
<link rel="stylesheet" href="/css/plugins/datatables/datatables.css" />
<link rel="stylesheet" href="/css/plugins/bootstrap-datepicker/datepicker3.css"/>
@stop

@section('outJs')
<script src="/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="/js/plugins/datatables/datatables-bs3.js"></script>
<script src="/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="/js/page/manage_student.js"></script>
@stop
