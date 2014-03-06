<?php

/**
 * Pessoa
 *
 * @copyright (c) 2014, Fontolan Tecnologia
 * @author Marcello Fontolan <marcello@fontolan.com.br>
 */
class Pessoa {

	protected $id;
	protected $nome;

	/**
	 * @var PessoaTipo
	 */
	protected $pessoaTipo;

	/**
	 * @var PessoaFone[]
	 */
	protected $pessoaFones;

	// getters & setters

	public function getId() {
		return $this->id;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getPessoaFones() {
		return $this->pessoaFones;
	}

	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function setPessoaFones(PessoaFone $pessoaFones) {
		$this->pessoaFones = $pessoaFones;
		return $this;
	}

	public function getPessoaTipo() {
		return $this->pessoaTipo;
	}

	public function setPessoaTipo(PessoaTipo $pessoaTipo) {
		$this->pessoaTipo = $pessoaTipo;
		return $this;
	}

}
