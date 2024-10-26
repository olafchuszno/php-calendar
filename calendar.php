<?php

$days_of_week = ['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'SO', 'N'];

$calendar = [[]];

$days_in_month = 30;

$start_day_index = 1;

$current_day_of_month = 1;
$current_day_of_week = 1;
$current_week_of_month = 0;

for ($i = 0; $i < $days_in_month + $start_day_index; $i++) {
  if ($i < $start_day_index) {
    $calendar[$current_week_of_month][] = null;

    // Dodaliśmy dzień, więc uzupełniamy counter
    $current_day_of_week++;
    continue;
  }

  // Jeśli jest miejsce w tym tygodniu
  if ($current_day_of_week > 7) {
    // Przejdź do kolejnego tygodnia
    $current_week_of_month++;

    // Dodaj tablicę nowego tygodnia
    $calendar[] = [];

    // Wyzeruj dzień tygodnia na 1 (poniedziałek)
    $current_day_of_week = 1;
  }

  // Wypełnij dzień w kalendarzu
  $calendar[$current_week_of_month][] = $current_day_of_month;

  // Odświez countery
  $current_day_of_week++;
  $current_day_of_month++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <table>
    <thead>
      <?php
        foreach ($days_of_week as $day) {
          $class = $day === 'N' ? "text-white bg-red-700" : 'text-white bg-gray-700';

          echo isset($day) ? "<th class='$class'>$day</th>" : '<th></th>';
        }
      ?>
    </thead>
    <tbody>
      <?php
      foreach ($calendar as $week) {
        echo "<tr>";

        foreach ($week as $day) {
          echo isset($day) ? "<td class='p-2'>$day</td>" : '<td></td>';
        }

        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>

</html>