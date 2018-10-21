<?php
    session_start();
    require_once 'function.php';
?>


<a href="stack.php?stack=clear">Очистить стек</a><br>
<a href="stack.php?stack=get">Получить елемент из стека</a><br>
<a href="/">Вернутся на главную</a><br>

<?php


    if (array_key_exists('stack', $_GET) && $_GET['stack'] === 'clear') {
        $_SESSION['stack'] = [];
    }

    if (array_key_exists('stack', $_GET) && $_GET['stack'] === 'get') {
        $value = getElementFromStack();

        printf('Элемент из стека: %s<br>', $value);
    }

    print_r($_SESSION['stack']);
?>