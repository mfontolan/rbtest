<?php

/**
 * UsuarioDAO
 *
 * @copyright (c) 2014, Marcello Fontolan
 * @author Marcello
 * 
 */
class UsuarioDAO {

	const tableName = 'usuario';

	static public function load($id) {
		$bean = R::load(self::tableName, $id);
		return self::beanToModel($bean);
	}

	static public function save(Usuario &$usuario) {
		$bean = R::load(self::tableName, $usuario->getId());

		if ($bean->login != $usuario->getLogin()) {
			$bean->login = $usuario->getLogin();
		}
		if ($bean->nome != $usuario->getNome()) {
			$bean->nome = $usuario->getNome();
		}
		if ($bean->isTainted()) {
			R::store($bean);
		}

		$usuario->setId($bean->id);
		return $bean;
	}

	static public function delete($id) {
		$bean = R::load(self::tableName, $id);
		if ($bean->id) {
			R::trash($bean);
			return true;
		}
		return false;
	}

	static public function beanToModel($bean) {
		if ($bean->id) {
			$usuario = new Usuario($bean->id);
			$usuario->setLogin($bean->login);
			$usuario->setNome($bean->nome);
			return $usuario;
		}
		return null;
	}

	static public function getByNome($nome) {
		$bean = R::findOne(self::tableName, 'nome = ?', array($nome));
		return self::beanToModel($bean);
	}

}
