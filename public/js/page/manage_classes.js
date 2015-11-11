var table_classes = undefined;
$(document).ready(function() {
	// Init database table.
	table_classes = $('#classes-list-table').dataTable({
		'bProcessing' : true,
		'bServerSide' : true,
		'sAjaxSource' : '/classes/classes_load_datatable',
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
				html += 'onclick="edit_classes(' + full.id + ')"';
				html += '>';
				html += '<span class="glyphicon glyphicon-edit">';
				html += '</span>';
				html += 'Edit';
				html += '</button>';
				html += '</div>';
				//create delete button
				html += '<div class="col-md-6">';
				html += '<a type="button" class="btn btn-danger btn-square btn-group btn-block" role="button"';
				html += 'onclick="delete_classes(' + full.id + ')"';
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

	//load form add new classes
	$('#add-classes').click(function() {
		$('#classesAddModal').load('classes/create', function() {
			$('#classesAddModal').modal('show');

		});
		//add new classes modal processing
			$('#classesSave').click(function() {

				//call ajax to add new classes
				var classes = $('#add-classes-form').serialize();
				$.ajax({
					type : 'post',
					url : '/classes/store',
					sucess : function(data) {
							alert('aaaaaa');
					}
				});
				$('#classesAddModal').modal('hide');
				classes_table_reload();
			});
	});

});

/**
 *Edit classes
 */
function edit_classes(id) {

	//load modal edit classes
	var url = '/classes/' + id + '/edit';

	$('#classesEditModal').load(url, function() {
		$('#classesEditModal').modal('show');

		//Edit classes modal processing
		$('#classesEdit').click(function() {
			//call ajax to update classes
			var classes = $('#edit-classes-form').serialize();
			$.ajax({
				type : 'PUT',
				data : classes,
				url : '/classes/' + id,
				sucess : function(data) {

				}
			});
			$('#classesEditModal').modal('hide');
			classes_table_reload();
		});
	});

}

/**
 * Delete classes
 */
function delete_classes(id) {
	//call ajax to delete classes
	$.ajax({
		type : 'DELETE',
		url : '/classes/' + id,
		dataType : 'json',
	});
	classes_table_reload();
}

//reload datatble
function classes_table_reload() {
	if (table_classes != undefined) {
		table_classes.fnReloadAjax();
	}
}

