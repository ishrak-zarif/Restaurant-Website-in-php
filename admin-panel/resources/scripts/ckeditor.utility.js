$(document).ready(function () {
	var config = {
		toolbar:
		[
			['Source', '-', 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
			['Styles', 'Format', 'Font', 'FontSize'],
			['UIColor']
		],
		width: rich_area_width,
		height: rich_area_height
	};

	// Initialize the editor.
	// Callback function can be passed and executed after full instance creation.
	$('.inputRichArea').ckeditor(config);
});