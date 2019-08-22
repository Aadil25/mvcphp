jQuery(document).ready(function(){
	midContentHeight();
});

jQuery(window).resize(function(){
	midContentHeight();
});

function midContentHeight(){
	var myHeight = jQuery(window).height();
	var document_height = jQuery(document).height();
	if (myHeight> document_height)
	{
		jQuery('.veh-sidebar , .veh-content').css('min-height' , myHeight + 'px');
	}
	else {
		jQuery('.veh-sidebar , .veh-content').css('min-height' , document_height + 'px');
	}
}

jQuery('.select-style').select2({
	minimumResultsForSearch: -1,
	dropdownAutoWidth : true,
	width: '100%',
}); 
