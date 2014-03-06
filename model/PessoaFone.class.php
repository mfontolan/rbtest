<?php

/**
 * PessoaFone
 *
 * @copyright (c) 2014, Fontolan Tecnologia, Marcello Fontolan
 * @author Marcello Fontolan <marcello@fontolan.com.br>
 */
class PessoaFone {

	protected $id;

	/**
	 * @var FoneTipo
	 */
	protected $tipoFone;
	protected $numero;

	// getters & setters
	public function getId() {
		return $this->id;
	}

	public function getTipoFone() {
		return $this->tipoFone;
	}

	public function getNumero() {
		return $this->numero;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setTipoFone(FoneTipo $tipoFone) {
		$this->tipoFone = $tipoFone;
		return $this;
	}

	public function setNumero($numero) {
		$this->numero = $numero;
		return $this;
	}

}
