@extends('layouts.default')

@section('body')
<div id="content">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>MANAGE SUBJECT INFORMATION</h4>
			</div>
			<div class="panel-body">
				<p>You can insert,update,delete subject</p>
			
			<div class="table-responsive">
				<table id="subject-list-table" class="table table-striped table-bordered table-hover table-green">
					<thead>
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th style="width:300px;">ACTION</th>
					</tr>
				</thead>
				<tbody></tbody>
				</table>
			</div>
			</div>
			<div class="footer">
				<button class="btn btn-success" id="add-subject"><i class="glyphicon glyphicon-plus"></i>Add</button>
			</div>
		</div>
</div>
<!--  Edit Modal Container -->
<div class="modal fade" id="subjectAddModal" tabindex="-1" role="dialog" aria-labelledby="subjectAddModalLabel" aria-hidden="true">
		
</div>
<div class="modal fade" id="subjectEditModal" tabindex="-1" role="dialog" aria-labelledby="subjectEditModalLabel" aria-hidden="true">
		
</div>
@stop

@section('outCss')
<link rel="stylesheet" href="/css/plugins/datatables/datatables.css" />
@stop

@section('outJs')
<script src="/js/plugins/datatables/jquery.dataTables.js"></script>
<script src="/js/plugins/datatables/datatables-bs3.js"></script>
<script src="/js/page/manage_subject.js"></script>
@stop