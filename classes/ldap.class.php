<?php

class ldap_auth{
   private $msg='';

   function __construct(){
      if((isset($_POST['password']) && isset($_POST['password']))&&($_POST['password']!='' && $_POST['password']!='')){
   	    $u = ($_POST['username']);
   		 $p = ($_POST['password']);
   		 $this->msg = @$this->ldap_valiate($u,$p);
   		 }

      }


   function ldap_status(){ return $this->msg; }


   function ldap_valiate($u,$p,$v=''){
      global $SESSION;

      // connect to ldap server
      $ldapconn = ldap_connect(LDAP_SERVER) or die("Could not connect to LDAP server.");

      if($ldapconn){
         // binding to ldap server, using only MC domain accounts
         $ldapbind = ldap_bind($ldapconn,"mc\\$u",$p);

         // Verify binding & Session Login
         if($ldapbind){
            $SESSION->set_var('username', strtolower($u));
		      header("location: main.php");
		      exit;
			   }
         else{ $v = '<br/><div class="alert alert-danger" role="alert">Login Failed: <strong>'.$u.'</strong></div>'; }
         }

      ldap_close($ldapconn);
      return $v;
      }



   }

?>
