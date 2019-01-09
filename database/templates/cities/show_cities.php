<?php

echo "<h1>Cities</h1> <table border='1' style='width:80%'>
  <a href='/'>На главную</a>|
  <a href='form.php'>Добавить</a>
  <tr>
    <th>ID</th>
    <th>Название</th> 
    <th>Страна</th>
    <th>Действия</th>
  </tr>";

/** @var City $city */
foreach ($data['cities'] as $city) {
    echo "<tr>
        <td>{$city->getId()}</td>
        <td>{$city->getName()}</td>
        <td>{$city->getCountryName()}</td>
        <td>
            <a href='form.php?id={$city->getId()}'>Редактировать</a>
            <a href='delete.php?id={$city->getId()}'>Удалить</a>
        </td>
      </tr>";
}
echo "</table>";