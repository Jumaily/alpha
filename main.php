<?php
require_once("controllers/system.cont.php");
if(is_null($SESSION->get_var('username')) || $SESSION->get_var('username')==''){ header("location: logout.php"); exit; }
?><!DOCTYPE html>
<html lang="en">
      <head>
        <?php $exec->get_includes("header"); ?>
      </head>
      <body>
	      
		    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse" >
		      <ul class="nav navbar-nav">
		        <li class="nav-item active">
		          <a class="nav-link" href="#">Main <span class="sr-only">(current)</span></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#">About</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="logout.php">Logout: <?php echo $SESSION->get_var('username'); ?></a>
		        </li>
		      </ul>
		    </nav>
		
		    <div class="container">
		
		      <div class="starter-template">
		        <h1>Bootstrap starter template</h1>
		        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
		      </div>
		
		    </div><!-- /.container -->


      <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
      <script src="js/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
   </body>
</html>