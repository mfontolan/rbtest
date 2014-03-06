<?php

/**
 *  Fatura
 *
 * @copyright (c) 2014, Marcello Fontolan 
 * @author Marcello
 */
class Fatura {

	protected $id;
	protected $cliente;

	/**
	 * @var Usuario
	 */
	protected $usuario;

	/**
	 * @var Terminal[]
	 */
	protected $terminais;

	public function __construct($id = 0) {
		$this->id = $id;
		$this->terminais = array();
	}

	public function addTerminal(Terminal $terminal) {
		$this->terminais[] = $terminal;
		return $terminal;
	}

	public function removeTerminal(Terminal $terminal) {
		for ($i = 0; $i < count($this->terminais); $i++) {
			if ($terminal->getId() == $this->terminais[$i]->getId()) {
				unset($this->terminais[$i]);
				break;
			}
		}
	}

	// g&s

	public function getId() {
		return $this->id;
	}

	public function getCliente() {
		return $this->cliente;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function getTerminais() {
		return $this->terminais;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setCliente($cliente) {
		$this->cliente = $cliente;
	}

	public function setUsuario(Usuario $usuario) {
		$this->usuario = $usuario;
	}

	public function setTerminais($terminais) {
		$this->terminais = $terminais;
	}

}
