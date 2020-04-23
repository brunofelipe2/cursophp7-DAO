<?php

spl_autoload_register(function($class_name){

	$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";//variavel para classe $class_name

	if (file_exists($filename/*chamando apenas a variavel da $class_nam,e*/)) {
		require_once($filename);
	}
});


?>