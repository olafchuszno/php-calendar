<?php

$days_of_week = ['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'SO', 'N'];

$START_DAY_OF_THE_WEEK = 'start_day_of_the_week';
$DAYS_IN_MONTH = 'days_in_month';

$start_day_of_the_week = isset($_GET[$START_DAY_OF_THE_WEEK])
  ? (int)$_GET[$START_DAY_OF_THE_WEEK]
  : 3;

$days_in_month = isset($_GET[$DAYS_IN_MONTH])
  ? (int)$_GET[$DAYS_IN_MONTH]
  : 30;

$hasError = false;


$calendar = createCalendar((int)$start_day_of_the_week, (int)$days_in_month);

if (is_string($calendar)) {
  $hasError = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalendarz</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center gap-6 pt-8">
  <h1 class="text-2xl font-regular">Wpisz dane, zeby stworzyć kalendarz</h1>

  <form class="flex flex-col gap-4 p-6 bg-gray-200 rounded-xl" action="/" method="GET">
    <div class="flex gap-2">
      <label class="flex flex-col">
        Pierwszy dzień
        <input
          class="border-4 pl-2"
          name="<?= $START_DAY_OF_THE_WEEK ?>"
          type="number"
          placeholder="Poniedziałek=1"
          value="<?= $start_day_of_the_week ?>"
        >
      </label>

      <label class="flex flex-col">
        Dni w miesiącu
        <input 
          class="border-4 pl-2" 
          name="<?= $DAYS_IN_MONTH ?>" 
          type="number" 
          placeholder="np. 30"
          value="<?= $days_in_month ?>"
        >
      </label>
    </div>

    <button
      class="bg-gray-400 text-white px-2 py-1 rounded-l hover:bg-gray-700"
      type="submit"
    >
      Stwórz kalendarz
    </button>
  </form>

  <?php

  if ($hasError) {
    echo "<p>$calendar</p>";
    echo 'ERROR';
  } else {
    echo "<table><thead>";

    foreach ($days_of_week as $day) {
      $class = $day === 'N' ? "text-white bg-red-700" : 'text-white bg-gray-700';

      echo isset($day) ? "<th class='$class'>$day</th>" : '<th></th>';
    }

    echo "</thead><tbody>";

    if (is_array($calendar)) {
      foreach ($calendar as $week) {
        echo "<tr>";

        foreach ($week as $day) {
          echo isset($day) ? "<td class='p-2'>$day</td>" : '<td></td>';
        }

        echo "</tr>";
      }
    }

    echo "</tbody></table>";
  }
  ?>

</body>

</html>

<?php
// Wpisz dzień początkowy: Poniedziałek=1 ... Niedziela=7
function createCalendar(int $start_day_of_the_week, int $days_in_month)
{
  if ($start_day_of_the_week < 0 || $start_day_of_the_week > 7) {
    return 'Proszę podać dzień początkowy między 1 a 7' . ' podany dzień to: ' . $start_day_of_the_week;
  }

  if ($days_in_month < 0 || $start_day_of_the_week > 31) {
    return 'Proszę podać ilość dni w miesiącu między 1 a 31';
  }

  $calendar = [[]];

  $start_day_index = $start_day_of_the_week - 1;

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

  return $calendar;
}
?>