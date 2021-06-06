<?php

/* @var object $body */

echo($body);
$body = \GuzzleHttp\json_decode($body);
?>

<table>
    <tr>
        <?php
        foreach ($body[0] as $key => $property) {
            echo('<th>' . $key . '</th>');
        }
        ?>
    </tr>
</table>
