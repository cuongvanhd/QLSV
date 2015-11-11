var table= undefined;
$(document).ready(function() {
	// Init database table.
	table = $('#student-list-table').dataTable({
		'bProcessing' : true,
		'bServerSide' : true,
		'sAjaxSource' : '/student/student_load_datatable',
		'fnServerData' : function(sSource, aoData, fnCallback, oSettings) {
			aoData.push({
				"name" : "iClass",
				"value" : $('#classes-select').val()
			});
			oSettings.jqXHR = $.ajax({
				'dataType' : 'json',
				'type' : 'POST',
				'url' : sSource,
				'data' : aoData,
				'success' : fnCallback
			});
		},
		'aoColumns' : [{
			'sClass' : 'text-center',
			'mData' : 'id',
			'bSortable' : true
		}, {
			'mData' : 'name',
			'bSortable' : true
		}, {
			'mData' : 'birthday',
			'bSortable' : true
		}, {
			'mData' : 'sex',
			'bSortable' : true
		}, {
			'mData' : 'classes_id',
			'bSortable' : true
		}, {
			'mData' : 'classes_name',
			'bSortable' : true
		}, {
			'mData' : function() {
				return '';
			},
			'mRender' : function(data, type, full) {
				var html = "";
				//create edit button
				html += '<div class="row">';
				html += '<div class="col-md-6">';
				html += '<button type="button" class="btn btn-primary btn-group btn-square btn-block" role="button"';
				html += 'onclick="edit_student(' + full.id + ')"';
				html += '>';
				html += '<span class="glyphicon glyphicon-edit">';
				html += '</span>';
				html += 'Edit';
				html += '</button>';
				html += '</div>';
				//create delete button
				html += '<div class="col-md-6">';
				html += '<a type="button" class="btn btn-danger btn-square btn-group btn-block" role="button"';
				html += 'onclick="delete_student(' + full.id + ')"';
				html += '>';
				html += '<span class="glyphicon glyphicon-trash">';
				html += '</span>';
				html += 'Delete';
				html += '</a>';
				html += '</div>';
				html += '</div>';
				return html;
			}
		}]
	});

	//load form add new student
	$('#add-student').click(function() {
		$('#studentAddModal').load('student/create', function() {
			//show modal
			$('#studentAddModal').modal('show');
			//Init birthday picker
			$(".input-birthday-picker").datepicker({
				format : "yyyy/mm/dd",
				autoclose:true
			});
		});
	});

	//add new student modal processing
	$('#studentSave').click(function() {

		//call ajax to add new student
		var classes = $('#add-student-form').serialize();
		$.ajax({
			type : 'post',
			url : '/student/store',
			sucess : function(data) {
				$('#studentAddModal').modal('hide');
			}
		});
	});

	//classes select
	$('#classes-select').on('change', function(event) {
		//prevent default processing
		event.preventDefault();
		//reload data
		student_table_reload();
	});
});

/**
 *Edit classes
 */
function edit_student(id) {

	//load modal edit classes
	var url = '/student/' + id + '/edit';

	$('#studentEditModal').load(url, function() {
		$('#studentEditModal').modal('show');

		//Init birthday picker
			$(".input-birthday-picker").datepicker({
				format : "yyyy/mm/dd",
				autoclose:true
			});
		//Edit classes modal processing
		$('#studentEdit').click(function() {

			//call ajax to update student
			var students = $('#edit-student-form').serialize();
			$.ajax({
				type : 'PUT',
				data : students,
				url : '/student/' + id,
				sucess : function(data) {
				
				}
			});
			//location.reload();
			$('#studentEditModal').modal('hide');
			student_table_reload();
		});
	});
}

/**
 * Delete classes
 */
function delete_student(id) {

	//call ajax to delete classes
	$.ajax({
		type : 'DELETE',
		url : '/student/' + id,
		dataType : 'json',
	});
	//location.reload();
	student_table_reload();
}

//reload datatble
function student_table_reload() {
	if (table != undefined) {
		table.fnReloadAjax();
	}
}
