<?php

namespace App\Controllers;

class Controller {

	protected $c;

	public function __construct($container) {
		$this->c = $container;
	}

}