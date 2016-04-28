<?php

     class Cookie_law
     {
         public $cookie_name;
         
         public function __construct() 
         {
             $this->cookie_name = "easy_eu_cookie_law";
         }
         
         /*
          *  Checks if is the first time that user enters
          */
         public function checkCookie()
         {
             $ret = true;
             
             if(isset($_COOKIE[$this->cookie_name]))
                 if($_COOKIE[$this->cookie_name] == "hide")
                     $ret = false;
             
             return $ret;
         }
         
         /*
          *  Shows the cookie law message
          */
         public function showCookieMessage()
         {
             $ret = false;
             if($this->checkCookie())
                 $ret = true;
             
             return $ret;
         }
         
         /*
          * Send a cookie to the user's computer which is used to check if the user has accepted the cookies policy
          */
         public function sendCookie()
         {
             $value = "show";
             $res = setcookie($this->cookie_name,$value,null,"/",null);
             return $res;
         }         
        
         /*
         *  Hides the cookie law message
         */
         public function hideCookieMessage()
         {
             return setcookie($this->cookie_name, 'hide' , null, "/", null);
         }
         
     }

?>
