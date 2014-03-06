<?php

/**
 * Description of TerminalDAO
 *
 * @copyright (c) 2014, Marcello Fontolan
 * @author Marcello
 */
class TerminalDAO {

	const tableName = 'terminal';

	static public function save(Terminal &$terminal) {
		$bean = R::load(self::tableName, $terminal->getId());
		if ($bean->numero != $terminal->getNumero()) {
			$bean->numero = $terminal->getNumero();
		}
		if ($bean->isTainted()) {
			R::store($bean);
		}
		$terminal->setId($bean->id);
		return $bean;
	}

	static public function load($id) {
		$bean = R::load(self::tableName, $id);
		return self::beanToModel($bean);
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
			$terminal = new Terminal($bean->id);
			$terminal->setNumero($bean->numero);
			return $terminal;
		}
		return null;
	}

}
