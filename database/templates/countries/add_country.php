<?php
echo "
    <h1>Добавить новую страну</h1>
    <form action='' method='post'>
        <input type='hidden' name='action' value='add'>
        <label>Название</label><br>
        <input type='text' name='name' value='{$data['name']}'><br>
";

        if (array_key_exists('error', $data) && array_key_exists('name', $data['error'])) {
            echo  "<p style=\"color: red\"> {$data['error']['name']}</p>";
        }

echo   "
        <label>Код страны</label><br>
        <input type='text' name='code' value='{$data['code']}'><br>";

        if (array_key_exists('error', $data) && array_key_exists('code', $data['error'])) {
            echo  "<p style=\"color: red\"> {$data['error']['code']}</p>";
        }

echo "
        <label>Код телефона</label><br>
        <input type='text' name='phone_code' value='{$data['phone_code']}'><br>
";

        if (array_key_exists('error', $data) && array_key_exists('phone_code', $data['error'])) {
            echo  "<p style=\"color: red\"> {$data['error']['phone_code']}</p>";
        }

echo "        
        <input type='submit' value='Добавить'>
    </form>
";