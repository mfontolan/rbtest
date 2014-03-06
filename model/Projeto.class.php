<?php

/**
 * Projeto
 *
 * @copyright (c) 2014, Fontolan Tecnologia, Marcello Fontolan
 * @author Marcello
 */
class Projeto {

	protected $id;
	protected $nome;
	protected $descricao;
	/**
	 * @var Usuario[]
	 */
	protected $usuarios;

	public function __construct($id = 0) {
		$this->id = $id;
	}

	public function addUsuario(Usuario $usuario) {
		$this->usuarios[] = $usuario;
		return $usuario;
	}

	public function removeUsuario(Usuario $usuario) {
		for ($i = 0; $i < count($this->usuarios); $i++) {
			if ($usuario->getId() == $this->usuarios[$i]->getId()) {
				unset($this->usuarios[$i]);
				break;
			}
		}
	}

	// g & s

	public function getId() {
		return $this->id;
	}

	public function getUsuarios() {
		return $this->usuarios;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setUsuarios($usuarios) {
		$this->usuarios = $usuarios;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getDescricao() {
		return $this->descricao;
	}

	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	public function setDescricao($descricao) {
		$this->descricao = $descricao;
		return $this;
	}

}
