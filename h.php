<?php

/* test getallheaders polyfill */

if (!function_exists('getallheaders')) {
	function getallheaders() {
		$headers = [];
		foreach ($_SERVER as $name => $value) {
			if (substr($name, 0, 5) == 'HTTP_') {
				$name = substr($name, 5);
				$name = str_replace('_', ' ', $name);
				$name = ucwords(strtolower($name));
				$name = str_replace(' ', '-', $name);
				$name = str_replace('X-Github', 'X-GitHub', $name);
				$headers[$name] = $value;
			}
		}
		return $headers;
	}
}

var_dump(getallheaders());

?>
