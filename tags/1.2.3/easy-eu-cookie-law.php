<?php

    /**
    * Plugin Name: Easy EU Cookie law
    * Plugin URI: http://www.womp.es/
    * Description: Plugin for the new European cookie law.
    * Version: 1.2.3
    * Author: Womp.es
    * Author URI: http://www.womp.es/
    * License: GPL2
    */

    include_once("config.php");
    include_once("lib.php");
        
    function run_cookie_law()
    {
        include_once("lang/".lang.".php");
        $cookie = new Cookie_law();

        if($cookie->mostrar_mensaje())
        {            
            echo '<div class="wrap_cookies font-white '.color.'">
                    <div class="message">
                        <span class="siteTitle">'.$lang["cookie_title"].'</span>
                        <p>'.$lang["cookie_text"].'<a href="'.more_info_url.'" class="under" title="'.ucfirst($lang["polit_cook"]).'">'.$lang["polit_cook"].'</a>. &nbsp;[ <a href="#" id="cerrar_msj" title="'.$lang["accept"].'"><span class="cerrar_msj">'.$lang["accept"].'</span></a> ]</p>
                    </div>
                </div>';

        }
    
    }
    
    function panel_admin()
    {
        if(is_admin())
            add_menu_page("Cookie Law","Cookie Law","administrator","slug_menu","cookie_law_settings","dashicons-book-alt");
    }
    
    function cookie_law_settings()
    {        
        include_once("lang/".lang.".php");
        require_once("admin_form.php");
        
        if(isset($_POST['save']))
        {
            $path = plugin_dir_path(__FILE__)."config.php";
            $data = get_text_file_in_array($path);

            if(count($data))
            {
                foreach($_POST as $key => $value)
                {
                    $lines = array_search_preg("\"".$key."\"",$data);

                    if(count($lines)==1)
                    {
                        $line = $lines[0];
                        $value = $value; //sanitize $value
                        $data[$line] = "define(\"".$key."\",\"".$value."\");\n";
                    }
                }
                
                //montar string
                $config = "<?php".mount_text_array_to_string($data);
                
                //write file
                $res = write_file(plugin_dir_path(__FILE__)."config.php",$config);
                                
                if($res)
                    echo "<script>var url = this.location; location.href = url+'&saved=ok'; </script>";
                else
                    echo "<script>var url = this.location; location.href = url+'&saved=err'; </script>";
            }
        }
        
    }
    
    function ocultar_msj()
    {
        $cookie = new Cookie_law();
        
        echo ($cookie->ocultar_mensaje()) ? "OK" : "ERROR";
        die();   
    }
    
    function set_cookie()
    {
        $cookie = new Cookie_law();
        
        if($cookie->comprobar_cookie())
        {
            $cookie->enviar_cookie();
        }
    }
	
    function cargar_archivos()
    {
        wp_enqueue_style( 'style_cookie_law', plugins_url( 'css/style.min.css' , __FILE__ ), false );
        wp_enqueue_script( 'cookie_law_js', plugins_url( 'js/cookie_law.min.js' , __FILE__ ), array( 'jquery' ) );
		echo '<script>var ocultar_msj_url = "'.admin_url('admin-ajax.php').'";</script>';
    }
    
    add_action( 'init', 'set_cookie');
    add_action('wp_enqueue_scripts', 'cargar_archivos');
    add_action('admin_menu', 'panel_admin');
	add_action( 'get_footer', 'run_cookie_law');
    
    //ajax
    add_action( 'wp_ajax_nopriv_ocultar_msj', 'ocultar_msj' );  
    add_action( 'wp_ajax_ocultar_msj', 'ocultar_msj' );  
    
?>
