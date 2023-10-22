<?php 

ini_set("session.use_only_cookies",1);
ini_set("session.use_strict_mode",1);
session_set_cookie_params([
    'lifetime'=> 1800,
   'domain'=>'localhost',
   'path'=>'/',
   'secure'=>true,
   "httponly"=>true 
]);
session_start();
$lastRegeneration="last_regenaration";
if(!isset($_SESSION[$lastRegeneration])){
    
    regenerate_session_id();


}
else
{
    $timeInterval=60*30; // 30 minutes
    if(time()-$_SESSION[$lastRegeneration]  >=$timeInterval )
    {
        /*
        time()=5:30
        timeInterval=30 min;
        lastGeneration=4:00;
        
        */ 
        regenerate_session_id();
    
    }
}

function regenerate_session_id(){
    global $lastRegeneration;
    session_regenerate_id();
    $_SESSION[$lastRegeneration]=time();
}