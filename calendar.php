<?php

$days_of_week = ['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'SO', 'N'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <?php 
          foreach ($days_of_week as $day) {
            echo "<th>$day</th>";
          }
        ?>
      </tr>
    </thead>
    <tbody>
      <tr></tr>
    </tbody>
  </table>
</body>
</html>
