<?php

/**
 * ProjetoDAO
 *
 * @copyright (c) 2014, Fontolan Tecnologia, Marcello Fontolan
 * @author Marcello
 */
class ProjetoDAO {

	const tableName = 'projeto';

	static public function load($id) {
		$bean = R::load(self::tableName, $id);
		return self::beanToModel($bean);
	}

	static public function save(Projeto &$projeto) {
		$bean = R::load(self::tableName, $projeto->getId());
		if ($bean->nome != $projeto->getNome()) {
			$bean->nome = $projeto->getNome();
		}
		if ($bean->descricao != $projeto->getDescricao()) {
			$bean->descricao = $projeto->getDescricao();
		}
		$bean->sharedUsuario = array();
		foreach ($projeto->getUsuarios() as $vUsuario) {
			$bean->sharedUsuario[] = UsuarioDAO::save($vUsuario);
		}

		if ($bean->isTainted()) {
			R::store($bean);
		}
		$projeto->setId($bean->id);
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
			$projeto = new Projeto($bean->id);
			$projeto->setNome($bean->nome);
			$projeto->setDescricao($bean->descricao);
			foreach ($bean->sharedUsuario as $vUsuario) {
				$projeto->addUsuario(UsuarioDAO::beanToModel($vUsuario));
			}
			return $projeto;
		}
		return null;
	}

}
