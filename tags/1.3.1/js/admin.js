jQuery(document).ready(function()
{
	jQuery('input#save-post').on('click', function()
	{
		var formData = {
			language: jQuery('#lang option:selected').val(),
			position: jQuery('#position option:selected').val(),
			color: jQuery('#color option:selected').val(),
			more_info_url: jQuery('#more_info_url').val()
		};

		jQuery.post(ajaxurl,
		{
			action: 'save_settings',
			formData: formData
		},
		function(result)
		{
			if(result.STATUS == "OK")
			{
				jQuery('#saved_ok').show();
			}
			else
			{
				jQuery('#saved_ko').show();
			}
		}, 
		"json");
	}); 
});