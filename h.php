<?php

 /* test getallheaders polyfill */ 

if (!function_exists('getallheaders')) {
	function getallheaders() {
		$headers = [];
		if (isset($_SERVER['CONTENT_TYPE']))
			$headers['Content-Type'] = $_SERVER['CONTENT_TYPE'];
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

header('Content-Type: text/plain');
var_dump(getallheaders());

?>
