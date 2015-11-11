var table_subject=undefined;
$(document).ready(function() {
	// Init database table.
	table_subject = $('#subject-list-table').dataTable({
		'bProcessing' : true,
		'bServerSide' : true,
		'sAjaxSource' : '/subject/subject_load_datatable',
		'fnServerData' : function(sSource, aoData, fnCallback, oSettings) {
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
			'mData' : 'subject_name',
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
				html += 'onclick="edit_subject(' + full.id + ')"';
				html += '>';
				html += '<span class="glyphicon glyphicon-edit">';
				html += '</span>';
				html += 'Edit';
				html += '</button>';
				html += '</div>';
				//create delete button
				html += '<div class="col-md-6">';
				html += '<a type="button" class="btn btn-danger btn-square btn-group btn-block" role="button"';
				html += 'onclick="delete_subject('+ full.id +')"';
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

	//load form add new subject
	$('#add-subject').click(function() {
		$('#subjectAddModal').load('subject/create', function() {
			$('#subjectAddModal').modal('show');
		});
	});

	//add new subject modal processing
	$('#subjectSave').click(function() {

		//call ajax to add new subject
		var classes = $('#add-subject-form').serialize();
		$.ajax({
			type : 'post',
			url : '/subject/store',
			sucess : function(data) {
				
			}
		});
		$('#subjectAddModal').modal('hide');
				subject_table_reload();
	});
	
});

/**
 *Edit subject
 */
function edit_subject(id) {

	//load modal edit subject
	var url = '/subject/' + id+ '/edit';
	
	$('#subjectEditModal').load(url, function() {
		$('#subjectEditModal').modal('show');

		//Edit subject modal processing
		$('#subjectEdit').click(function() {
			//call ajax to update classes
			var classes = $('#edit-subject-form').serialize();
			$.ajax({
				type : 'PUT',
				data: classes,
				url : '/subject/' + id,
				sucess : function(data) {
					
				}
			});
			$('#subjectEditModal').modal('hide');	   
			subject_table_reload();
		});
	});
	
}
/**
 * Delete subject
 */
function delete_subject(id){
	//call ajax to delete subject
	$.ajax({
		type:'DELETE',
		url:'/subject/' + id,
		dataType:'json',
	});
	subject_table_reload();
}
//reload datatble
function subject_table_reload() {
	if (table_subject != undefined) {
		table_subject.fnReloadAjax();
	}
}
	
