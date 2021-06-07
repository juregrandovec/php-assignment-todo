<?php

/* @var View $view */

/* @var object $todoObjects */

use lib\View;

?>

<table>
    <tr>
        <?php
        foreach ($todoObjects[0] as $key => $property) {
            echo('<th>' . $key . '</th>');
        }
        ?>
    </tr>
    <?php
    $currentValueInFirstCollumn = 0;
    $color = null;
    foreach ($todoObjects as $todoObject) {
        if (current($todoObject) !== $currentValueInFirstCollumn) {
            $currentValueInFirstCollumn = current($todoObject);
            $view->setNextColor();
        }

        echo('<tr style="background-color: ' . $view->currentColor . '">');
        foreach ($todoObject as $property) {
            $fontColor = gettype($property) === 'boolean' ? ($property ? '#09b829' : '#eb4034') : '';
            echo('<td style="color: ' . $fontColor . '">' . $view->parseStringFromVariable($property) . '</td>');
        }
        echo('</tr>');
    }
    ?>
</table>
