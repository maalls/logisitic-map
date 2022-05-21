<?php 
namespace Maalls\Http;

class Request {



	public function get($name) {

		$params = $_GET;

		return isset($params[$name]) ? $params[$name] : null;

	}
}