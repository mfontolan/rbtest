<?php

/**
 * TipoFone
 *
 * @copyright (c) 2014, Fontolan Tecnologia
 * @author Marcello Fontolan <marcello@fontolan.com.br>
 */
class FoneTipo {

	protected $id;
	protected $descricao;

	// getters & setters
	public function getId() {
		return $this->id;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}

}
