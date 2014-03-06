<?php

/**
 * Description of FaturaDAO
 *
 * @copyright (c) 2014, Marcello Fontolan
 * @author Marcello
 * 
 */
class FaturaDAO {

	const tableName = 'fatura';

	static public function save(Fatura &$fatura) {
		$bean = R::load(self::tableName, $fatura->getId());

		if ($bean->cliente != $fatura->getCliente()) {
			$bean->cliente = $fatura->getCliente();
		}
		$bean->usuario = UsuarioDAO::save($fatura->getUsuario());

		$bean->xownTerminalList = array();
		foreach ($fatura->getTerminais() as $vTerminal) {
			$bean->xownTerminalList[] = TerminalDAO::save($vTerminal);
		}
		if ($bean->isTainted()) {
			R::store($bean);
		}

		$fatura->setId($bean->id);
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

	static public function beanToModel(RedBeanPHP\OODBBean $bean) {
		if ($bean->id) {
			$fatura = new Fatura($bean->id);
			$fatura->setCliente($bean->cliente);
			$fatura->setUsuario(UsuarioDAO::beanToModel($bean->usuario));
			foreach ($bean->xownTerminalList as $vTerminal) {
				$fatura->addTerminal(TerminalDAO::beanToModel($vTerminal));
			}
			return $fatura;
		} else {
			return null;
		}
	}

}
