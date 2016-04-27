<?php

	function saveSettings()
    {
        $ret = array('STATUS' => 'ERROR', 'ERROR' => 'INIT');

        if( ! empty($_POST['formData']))
        {
            createOrUpdateOptions($_POST['formData']);
            $ret['STATUS'] = 'OK';
        }

        echo json_encode($ret);
        wp_die();
    }
    
    function createOrUpdateOptions($optionsArray)
    {
        foreach($optionsArray as $optionName => $optionValue)
        {
            $optionName     = 'eecl_' . $optionName;

            if( ! get_option($optionName))
            {
                delete_option($optionName);
                add_option($optionName, $optionValue,'', 'no');
            }
            else
            {
                update_option($optionName, $optionValue, 'no');
            }
        }
    }

    function createDefaultOptions()
    {
        add_option('eecl_language', 'en','', 'no');
        add_option('eecl_color', 'asfalto','', 'no');
        add_option('eecl_position', 'bottom','', 'no');
        add_option('eecl_more_info_url', '#','', 'no');
    }
