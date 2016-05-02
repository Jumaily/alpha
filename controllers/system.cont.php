<?php
error_reporting(E_ALL); ini_set('display_errors', '1');

# run system paths
$exec = new SYSTEM_GET_PATHS($_SERVER['PHP_SELF']);

# path configs
define('PATH',$exec->URL_GET_PATH());

# run system basic classes & essential core files
require_once("config/site.conf.php");
require_once("classes/sessions.class.php"); $SESSION = new SessionCls();
require_once("classes/ldap.class.php"); $ldap = new ldap_auth();


# Configure Path Names
class SYSTEM_GET_PATHS{
   private $path;
   public function __construct($p,$b=''){
      $a = explode('/',$p);
      array_shift($a);array_shift($a);
      if(count($a)>1){
         array_shift($a);
         foreach($a as $c){ $b .= "../"; }
         }
      else{ $b = './'; }
      $this->path = $b;
      }

   public function get_includes($file){ include_once("{$this->path}views/includes/$file.php"); }
   public function get_forms($file){ include_once("{$this->path}views/forms/$file.php"); }
   public function URL_GET_PATH(){ return $this->path; }
   public function show_views($file){ $this->Link_up_Paths($file,'system/views'); }

   private function Link_up_Paths($file,$inc){
      global $SESSION;
      $a = explode('.',$file);
      foreach($a as $b)$inc .= "/$b";
      @include_once("{$this->path}$inc.php");
      }

   }

?>
