<?php

require_once './_init.php';
require_once 'rb.phar';
echo '<pre><hr><br>';

R::setup("pgsql:host=127.0.0.1; dbname=teste", 'fx', 'fx');
R::freeze();
R::debug();

$projeto = new Projeto();
$projeto->setNome('appGT');
$projeto->setDescricao('appGT Analise');
$usuario1 = $projeto->addUsuario(new Usuario());
$usuario1->setLogin('mfontolan');
$usuario1->setNome('Marcello Fontolan');

$usuario2 = $projeto->addUsuario(new Usuario());
$usuario2->setLogin('marc');
$usuario2->setNome('Marcs Jobs');

$usuario3 = $projeto->addUsuario(new Usuario());
$usuario3->setLogin('john');
$usuario3->setNome('John Doe');

ProjetoDAO::save($projeto);

$projeto->removeUsuario($usuario3);

ProjetoDAO::save($projeto);

$fatura = new Fatura();
$fatura->setCliente('Fontolan Tecnologia Ltda');
$fatura->setUsuario($usuario3);
$terminal1 = $fatura->addTerminal(new Terminal());
$terminal1->setNumero('554796011111');
$terminal2 = $fatura->addTerminal(new Terminal());
$terminal2->setNumero('554796022222');
$terminal3 = $fatura->addTerminal(new Terminal());
$terminal3->setNumero('554796033333');
FaturaDAO::save($fatura);
$fatura->removeTerminal($terminal2);
FaturaDAO::save($fatura);

echo '</pre>';
