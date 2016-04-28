<?php

    /**
    * Plugin Name: Easy EU Cookie law
    * Plugin URI: http://www.albertolabs.com/
    * Description: Plugin for the new European cookie law.
    * Version: 1.3.3
    * Author: Albertolabs.com
    * Author URI: http://www.albertolabs.com/
    * License: GPL2
    * Text Domain: easy-eu-cookie-law
    * Domain Path: /languages/
    */

    include_once 'includes/CookieManager.php';
    include_once 'includes/AdminForm.php';

    function eecl_load_textdomain()
    {
        load_plugin_textdomain( 'easy-eu-cookie-law', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    function initCookieLawPlugin()
    {
        $cookie = new Cookie_law();

        if($cookie->showCookieMessage())
        {            
            echo '<div class="wrap_cookies ' . get_option('eecl_position') . ' font-white ' . get_option('eecl_color') . '">
                    <div class="message">' . 
                    __('This site uses cookies to enhance your experience. By continuing to the site you accept their use. More info in our ', 'easy-eu-cookie-law') .
                        '<a href="'. get_option('eecl_more_info_url') .'" class="under" title="' . ucfirst( __('cookies policy', 'easy-eu-cookie-law')) . '">' 
                            . __('cookies policy', 'easy-eu-cookie-law') .
                        '</a>. 
                        &nbsp;&nbsp;&nbsp; 
                        <a href="#" id="cerrar_msj" title="' . _('Accept', 'accept', 'easy-eu-cookie-law') . '"><span class="cerrar_msj">'. strtoupper( __('Accept', 'easy-eu-cookie-law') ) . '</span></a>
                    </div>
                </div>';
        }
    }
    
    function adminPanel()
    {
        if(is_admin())
        {
            add_menu_page("Cookie Law","Cookie Law","administrator","slug_menu","cookieLawSettings","dashicons-book-alt");
        }
    }

    function saveSettingsAssets()
    {
        wp_enqueue_script( 'admin_js', plugins_url( '/js/admin.min.js', __FILE__ ), array('jquery') );
        wp_localize_script( 'admin_js', 'the_ajax_script',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )) 
        );
    }

    function cookieLawSettings()
    {   
        // load config
        $eecl_position  = get_option('eecl_position');
        $eecl_color     = get_option('eecl_color');
        $eecl_url       = get_option('eecl_more_info_url');

        require_once("admin_form.php");
    }
    
    function hideMessage()
    {
        $cookie = new Cookie_law();
        
        $strJsonResult = ($cookie->hideCookieMessage()) ? "OK" : "ERROR";
        echo json_encode( array('STATUS' => $strJsonResult) );

        wp_die();
    }
    
    function setInitCookie()
    {
        $cookie = new Cookie_law();
        
        if($cookie->checkCookie())
        {
            $cookie->sendCookie();
        }
    }
	
    function loadPluginAssets()
    {
        wp_enqueue_style( 'style_cookie_law', plugins_url( 'css/style.min.css' , __FILE__ ), false );
        wp_enqueue_script( 'cookie_law_js', plugins_url( 'js/cookie_law.min.js' , __FILE__ ), array( 'jquery' ) );
        echo '<script>var ocultar_msj_url = "'.admin_url('admin-ajax.php').'";</script>';
    }

    function save_settings()
    {
        saveSettings();
    }

    function plugin_activate()
    {
        createDefaultOptions();
    }

    // plugin translations
    add_action( 'plugins_loaded', 'eecl_load_textdomain' );

    // plugin init
    add_action( 'init', 'setInitCookie');
    add_action('wp_enqueue_scripts', 'loadPluginAssets');
    add_action('admin_menu', 'adminPanel');
    add_action( 'get_footer', 'initCookieLawPlugin');
    add_action( 'admin_footer', 'saveSettingsAssets');
    
    // hide cookie message ajax
    add_action('wp_ajax_nopriv_hideMessage', 'hideMessage');
    add_action('wp_ajax_hideMessage', 'hideMessage'); 
     
    // save plugin config ajax
    add_action('wp_ajax_nopriv_save_settings', 'save_settings');
    add_action('wp_ajax_save_settings', 'save_settings');

    // plugin activation database config insertion
    register_activation_hook( __FILE__ , 'plugin_activate' );

?>
