jQuery(document).ready(function()
{
    // Accept buttonn event
    jQuery("a#cerrar_msj").click(function(event)
    {
        event.preventDefault();
        
        jQuery.post(ocultar_msj_url,
        { 
            action: 'hideMessage'
        },
        function(data)
        {
            if(data.STATUS == 'OK')
            {
                jQuery("div.wrap_cookies").slideUp(800, function()
                {
                    if( jQuery("div.wrap_cookies").hasClass("top"))
                    {
                        jQuery("body").css("padding-top", "0px");
                    }
                });
            }
        }, 
        "json");
    });     

    // top padding if admin bar is visible
    if(jQuery("div#wpadminbar").length)
    {
        if(jQuery("div.wrap_cookies").hasClass("top"))
        {
            var padding_top = jQuery("div#wpadminbar").height();
            jQuery("div.wrap_cookies").css("padding-top", padding_top + "px");
        }
    }

    // body padding
    if( jQuery("div.wrap_cookies").hasClass("top"))
    {
        var wrap_height = jQuery("div.wrap_cookies").height();
        jQuery("body").css("padding-top", wrap_height + "px");
    }
});