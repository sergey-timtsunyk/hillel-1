<?php
	require_once 'User.php';
	require_once 'Employ.php';
	require_once 'Manager.php';
	require_once 'Point.php';
	require_once 'PointPrinter.php';
	require_once 'PointPrinterString.php';

    $pp = new PointPrinter();
	$point = new Point($pp,2,46);


	$str = serialize($point);

	var_dump($str);

	$pointUn = unserialize($str);

	$pointUn->printX();
	$pointUn->printY();


    $point->printX();
    $point->printy();
    echo '---------------<br/>';

	$point(56, 78);

    $point->printX();
    $point->printy();
    echo '---------------<br/>';



	$pp = new PointPrinterString();

    $points = [
        new Point($pp,2,46),
        new Point($pp,78,34),
        new Point($pp,12,49),
        new Point($pp,32,67),
        new Point($pp,1,89),
    ];

    /** @var Point $point */
    foreach ($points as $point) {
        $point->printX();
        $point->printy();
        echo '---------------<br/>';
    }


    $employ = new Employ('John', 'Veeck', 'lead', 3000);
    $employ->role = 'administrator';
    $employ->date = '2018-09-23';

    if (isset($employ->role) && $employ->role === 'administrator') {
        echo '<b>Вы вошли как Admin!</b>';
    }

    var_dump($employ->getRole());
    var_dump($employ->getLevel());
    var_dump($employ->getDate());
    var_dump($employ->getStatus());


    echo'<br>';

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
        echo "<li>{$manager}</li>";

        if ($manager->hasEmployees()) {
            $employees = $manager->getEmployees();
            echo 'Работники: <br>';
            echo '<ul>';
            /** @var Employ $employ */
            foreach ($employees as $employ) {
                echo "<li>{$employ}</li>";
            }
            echo '</ul>';
        }
    }
    echo '</ol>';
    echo '<br>';

    $userCount = User::getCountUser();

    echo "Общее число сотрудников: {$userCount}";





