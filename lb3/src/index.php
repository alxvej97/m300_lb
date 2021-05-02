<?php

echo "Sie befinden sich nun auf meinem Docker lb3 container";

$mysqli = new mysqli("db", "root", "example", "LB3");

$sql = "INSERT INTO Checkliste (Handlung, Status) VALUES('PHP-Container', 'Erledigt')";
$result = $mysqli->query($sql);
$sql = "INSERT INTO Checkliste (Handlung, Status) VALUES('Adminer-Container', 'Erledigt')";
$result = $mysqli->query($sql);
$sql = "INSERT INTO Checkliste (Handlung, Status) VALUES('MySQL-Container', 'Erledigt')";
$result = $mysqli->query($sql);
$sql = "INSERT INTO Checkliste (Handlung, Status) VALUES('Dokumentation', 'Erledigt')";
$result = $mysqli->query($sql);


$sql = 'SELECT * FROM Checkliste';

if ($result = $mysqli->query($sql)) {
    while ($data = $result->fetch_object()) {
        $users[] = $data;
    }
}

foreach ($users as $user) {
    echo "<br>";
    echo $user->Handlung . " " . $user->Status;
    echo "<br>";
}
