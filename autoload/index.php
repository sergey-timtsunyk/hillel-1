<?php

    require_once 'autoload_custom.php';

    use User\Employ;
    use Files\Xml\Reader as XmlRead;
    use Files\Json\Reader as JsonRead;


    $reader = new XmlRead(__DIR__ . '/files/employes.xml');
    $xml = $reader->getXml();

    $convertToEmploy = new \Convert\EmployFromXml($xml);

    $convertToEmploy->convert();
    $employes = $convertToEmploy->getArrayEmploy();



/*    $reader = new JsonRead(__DIR__ . '/files/employes.json');

    $json = $reader->getJson();


    $convertToEmploy = new \Convert\EmployFromJson($json);

    $convertToEmploy->convert();
    $employes = $convertToEmploy->getArrayEmploy();*/


    echo "<h1>Employ</h1> <table border=\"1\" style=\"width:100%\">
  <tr>
    <th>First name</th>
    <th>Last name</th> 
    <th>Position</th>
  </tr>";

    /** @var Employ $employ */
    foreach ($employes as $employ) {
        echo "<tr>
            <td>{$employ->getFirstName()}</td>
            <td>{$employ->getLastName()}</td>
            <td>{$employ->getPosition()}</td>
          </tr>";
    }
   echo "</table>";
   echo "<h1>Manager</h1>";
