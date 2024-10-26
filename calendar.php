<?php

$days_of_week = ['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'SO', 'N'];

$calendar = [[]];

$days_in_month = 30;

$start_day_index = 0;

$current_day_of_month = 1;
$current_day_of_week = 0;
$current_week_of_month = 0;

for ($i = 0; $i < $days_in_month; $i++) {
  if ($i < $start_day_index) {
    $calendar[$current_week_of_month][] = null;
    continue;
  }

  // Jeśli jest miejsce w tym tygodniu
  if (true) {
    $calendar[$current_week_of_month][] = $current_day_of_month;
  } else {
    // Przejdź do kolejnego tygodnia i dodaj dzień
    $current_week_of_month++;
    $calendar[$current_week_of_month][] = $current_day_of_month;
  }

  $current_day_of_month++;
}

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
