<?php
    session_start();
    require_once 'function.php';
?>
<html>
    <body>
        <form action="" method="post">
            <input type="text" name="value">
            <p style="color: red">
                <?php
                    if (array_key_exists('massageError', $_SESSION)) {
                        echo $_SESSION['massageError'];
                        unset($_SESSION['massageError']);
                    }
                ?>
            </p>
            <br>
            <input type="submit" name="add" value="Добавить">
        </form>

        <a href="stack.php">Посмотреть стек</a>
    </body>
</html>
<?php
    initSession();

    if (array_key_exists('value', $_POST)) {

        $value = $_POST['value'];

        if (is_numeric($value)) {
            $value = (int)$value;
            addElementToStack($value);
        } else {
            $massage = 'Необходимо ввести целочисленное число!';
            setSession('massageError', $massage);
            redirect();
        }
    }
?>
