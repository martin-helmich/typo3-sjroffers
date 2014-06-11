<?php

$_EXTKEY = 'sjr_offers';
require_once('ext_emconf.php');

$conf = $EM_CONF[$_EXTKEY];

$validate = function() {
	echo("Performing syntax check on all files... ");
	exec("find . -name '*.php' | xargs -n1 php -l");
	echo("Done\n");
};

$createPackage = function() use ($_EXTKEY, $conf) {
	if (strpos($conf['version'], '-dev') !== FALSE) {
        echo("Do not package dev versions!\n");
        return 1;
	}

	$filename = sprintf("../%s_%s.zip", $_EXTKEY, $conf['version']);
	exec("zip -r $filename .");
	echo("Created $filename.\n");
};

$validate();
$createPackage();
