<?php

/**
 * Description of Usuario
 *
 * @copyright (c) 2014, Marcello Fontolan
 * 
 * @author Marcello
 * 
 */
class Usuario {

	protected $id;
	protected $login;
	protected $nome;

	public function __construct($id = 0) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}

	public function getLogin() {
		return $this->login;
	}

	public function getNome() {
		return $this->nome;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setLogin($login) {
		$this->login = $login;
	}

	public function setNome($nome) {
		$this->nome = $nome;
	}

}
