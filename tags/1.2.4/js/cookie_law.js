jQuery(document).ready(function()
{
    // Accept buttonn event
    jQuery("a#cerrar_msj").click(function(event){
        
        event.preventDefault();
        
        jQuery.post(ocultar_msj_url,
        { 
                action: 'ocultar_msj'
        },
        function(data)
        {
            if(data == "OK")
            {
                jQuery("div.wrap_cookies").slideUp();
            }
        });
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