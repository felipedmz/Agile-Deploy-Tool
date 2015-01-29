<?php
/**
 * @author    Felipe Maziero <flpmaziero@gmail.com>
 * @copyright 2015 Felipe Maziero
 */

try {
	$srcRoot   = __DIR__ . "/src";
	$buildRoot = __DIR__ . "/build";
	
	$phar = new Phar($buildRoot . "/agile.phar", FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME, "myapp.phar");

	if ($handle = opendir($srcRoot)) {
	    while (false !== ($file = readdir($handle))) {
	    	if ($file !== "." && $file !== "..") {
	    		$phar[$file] = file_get_contents($srcRoot . "/" . $file);
	    	}
	    }
	    closedir($handle);
	}

	$phar->setStub($phar->createDefaultStub("index.php"));
} catch (Exception $e) {
	echo "\033[31m";
	echo $e->getMessage();
	echo "\n";
	debug_print_backtrace();
	exit;
} finally {
	echo "\033[32mRun: php /build/agile.phar\n";	
}