<?php

/**
 * Description of Terminal
 *
 * @copyright (c) 2014, Marcello Fontolan
 * @author Marcello
 */
class Terminal {

	protected $id;
	protected $numero;

	public function __construct($id = 0) {
		$this->id = $id;
	}

	// g&s

	public function getId() {
		return $this->id;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
	}

}
