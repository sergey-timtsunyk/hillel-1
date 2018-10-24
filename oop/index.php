<?php

require_once 'Table.php';
require_once 'TableNew.php';

TableNew::createInstance();

$t1 = new Table(120, 45);

$tn1 = new TableNew('белый', 190, 60);
$tn1->setH(40);

$tn1::createInstance();

$tn2 = clone $tn1;

$tn2->setH(60);


printSqTable($t1);
printSqTable($tn1);
printSqTable($tn2);

$tn1 = new TableNew('белый', 100, 20);;
var_dump($tn2);




function printSqTable(Table $t) {
    printf('Площа стола: %s<br>', $t->getSq());
}