<?php

echo "<h1>Countries</h1> <table border='1' style='width:80%'>
  <a href='/'>На главную</a>|
  <a href='/countries/add'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Название</th> 
    <th>Код страны</th>
    <th>Код телефона</th>
    <th>Действия</th>
  </tr>";

/** @var Country $country */
foreach ($data['countries'] as $country) {
    echo "<tr>
        <td>{$country->getId()}</td>
        <td>{$country->getName()}</td>
        <td>{$country->getCode()}</td>
        <td>{$country->getPhoneCode()}</td>
        <td>
            <a href='/countries/edit?id={$country->getId()}'>Редактировать</a>
            <a href='/countries/delete?id={$country->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";