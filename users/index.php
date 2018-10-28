<?php
	require_once 'User.php';
	require_once 'Employ.php';
	require_once 'Manager.php';



    $employ = new Employ('John', 'Veeck', 'lead', 3000);


    echo $employ->role;
    echo'<br>';

    $employ->role = 'administrator';

    echo $employ->role;

    echo'<br>';

    //var_dump($employ->getSettings());

    $manager1 = new Manager('Chuck', 'Norris', 'Unreal', 1000000);

    $manager1
        ->addEmploy(new Employ('John', 'Veeck', 'lead', 3000))
        ->addEmploy(new Employ('Jack', 'Swan', 'developer', 2000))
        ->addEmploy(Employ::newInstance('Tin', 'Bredy', 'Toys', 1200, 42));


    $manager2 = new Manager('Teddy', 'Bear', 'Toys', 5000);
    $manager2
        ->addEmploy(new Employ('Lane', 'Stone', 'QA', 1000))
        ->addEmploy(new Employ('Tom', 'Brown', 'Designer', 1500));

    $managers = [
        $manager1,
        $manager2,
    ];

    echo '<br>';
    echo 'Управленцы: <br>';
    echo '<ol>';
    /** @var Manager $manager */
    foreach ($managers as $manager) {
        echo "<li>{$manager->getInfo()}</li>";

        if ($manager->hasEmployees()) {
            $employees = $manager->getEmployees();
            echo 'Работники: <br>';
            echo '<ul>';
            /** @var Employ $employ */
            foreach ($employees as $employ) {
                echo "<li>{$employ->getInfo()}</li>";
            }
            echo '</ul>';
        }
    }
    echo '</ol>';
    echo '<br>';

    $userCount = User::getCountUser();

    echo "Общее число сотрудников: {$userCount}";





