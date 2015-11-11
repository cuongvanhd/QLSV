@extends('layouts.default')

@section('body')
<div id="content">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>MANAGE POINT STUDENT INFORMATION</h4>
		</div>
		<div class="panel-body">
			<p>
				You can insert, update, delete point
			</p>
		<div class="table-responsive">
			<div class="row form-group">
				<!-- Start customer filter by student -->
				<div class="col-sm-6">
					{{ Form::label('student', 'Student') }}
					{{ Form::select('student',$student, '0', array('class' => 'form-control col-sm-6 col-xs-12', 'id' => 'student-select')) }}
				</div>
				<!-- End customer filter by student -->

				<!-- Start customer filter by subject -->
				<div class="col-sm-6">
					{{ Form::label('subject', 'Subject') }}
					{{ Form::select('subject',$subject, '0', array('class' => 'form-control col-sm-6 col-xs-12', 'id' => 'subject-select')) }}
				</div>
				<!-- End vustomer filter by subject -->
			</div>
			<table id="point-list-table" class="table table-striped table-bordered table-hover table-green">
				<thead>
					<tr>
						<!-- <th>ID_STUDENT</th> -->
						<th>STUDENT</th>
						<th>SUBJECT</th>
						<th>POINT</th>
						<th style="width:300px;">ACTION</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		</div>
		<div class="footer">
			<button class="btn btn-default" id="add-point"><i class="glyphicon glyphicon-plus"></i>Add</button>
		</div>
	</div>
</div>
<!--  Add Modal Container -->
<div class="modal modal-flex fade" id="pointAddModal" tabindex="-1" role="dialog" aria-labelledby="pointAddModalLabel" aria-hidden="true">

</div>
<!--  Edit Modal Container -->
<div class="modal modal-flex fade" id="pointEditModal" tabindex="-1" role="dialog" aria-labelledby="pointEditModalLabel" aria-hidden="true">

</div>
@stop

@section('outCss')
<link rel="stylesheet" href="/css/plugins/datatables/datatables.css" />
@stop

@section('outJs')
<script src="/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="/js/plugins/datatables/datatables-bs3.js"></script>
<script src="/js/page/manage_point.js"></script>
@stop
