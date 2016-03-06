<?php

    /*
     * Cookies law script.
     * Developed by Reacción Estudio
     * http://www.reaccionestudio.com
     */

     class Cookie_law
     {
         
         public $site_name;
         public $cookie_name;
         
         function __construct() 
         {
             $this->site_name = blog_name;
             $this->cookie_name = $this->site_name."_cookie_law";
         }
         
         /*
          * Comprueba si es la primera vez que entra el usuario al sitio web.
          */
         public function comprobar_cookie()
         {
             $ret = true;
             
             if(isset($_COOKIE[$this->cookie_name]))
                 if($_COOKIE[$this->cookie_name] == "hide")
                     $ret = false;
             
             return $ret;
         }
         
         /*
          * Muestra el mensaje.
          */
         public function mostrar_mensaje()
         {
             $ret = false;
             if($this->comprobar_cookie())
                 $ret = true;
             
             return $ret;
         }
         
         /*
          * Envía una cookie al ordenador del usuario para que el usuario acepta la política de cookies.
          */
         public function enviar_cookie()
         {
             $value = "show";
             $res = setcookie($this->cookie_name,$value,null,"/",null);
             return $res;
         }         
         
         public function ocultar_mensaje()
         {
             $value = "hide";
             $res = setcookie($this->cookie_name,$value,null,"/",null);
             return $res;
         }
         
     }
     
     //helper functions
     function get_text_file_in_array($file)
     {
        $content = array();
        if(strlen($file))
        {
            $fh = fopen($file,"r");            
            while(!feof($fh))
            {
               if(strlen($line = str_replace("<?php","",fgets($fh))))
                    $content[] = $line;
            }
            fclose($fh);
        }
        return $content;
     }
     
     function mount_text_array_to_string($array)
     {
        $text = "";
        
        if(count($array))
        {
            foreach($array as $value)
            {
                $text .= $value;
            }
        }
        return $text;
     }
     
     function array_search_preg( $find, $in_array, $keys_found=Array() )
     {
        if( is_array( $in_array ) )
        {
            foreach( $in_array as $key=> $val )
            {
                if( is_array( $val ) )
                {
                    array_search_preg( $find, $val, $keys_found );
                }else{
                    if( preg_match( '/'. $find .'/', $val ) ) 
                        $keys_found[] = $key;
                }
            }
            return $keys_found;
        }
        return false;
     }
     
     function write_file($path, $data)
     {
         
        return file_put_contents($path, $data);
         
     }

?>