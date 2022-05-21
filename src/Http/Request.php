<?php 
namespace Maalls\Http;

class Request {



	public function get($name, $default = null) {

		$params = $_GET;

		return isset($params[$name]) ? $params[$name] : ($default ? $default : null);

	}
}