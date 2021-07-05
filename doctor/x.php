<?php
$names = array("Seb", "Ginna", "Shane", "Guy", "Jackie", "Frances", "John", "Alec", "Jon", "Sam", "Chris", "Paula");
foreach (range(1, 10) as $i) {
    foreach ($names as $name) {
        echo $name . ', ';
    }
    echo '<br />' . PHP_EOL;
}
?>