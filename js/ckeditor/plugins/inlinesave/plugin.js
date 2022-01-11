CKEDITOR.plugins.add( 'inlinesave',
{
	init: function( editor )
	{
		editor.addCommand( 'inlinesave',
			{
				exec : function( editor )
				{
					addData();
					
					function addData() {
						var data = editor.getData();
						var dataID = editor.container.getId();
						
						jQuery.ajax({
							type: "POST",
							url: 'editor.php',
							data: { editabledata: data, editorID: dataID }

						})
						.done(function (data, textStatus, jqXHR) {
							alert("Изменения сохранены");
						})
						.fail(function (jqXHR, textStatus, errorThrown) {
							alert("При сохранении изменений произошла ошибка [" + jqXHR.responseText + "]");
						});
					}
				}
			});
		editor.ui.addButton( 'Inlinesave',
		{
			label: 'Сохранить',
			command: 'inlinesave',
			icon: this.path + 'images/inlinesave.png'
		} );
	}
} );