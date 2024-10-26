<?php

$days_of_week = ['Pn', 'Wt', 'Śr', 'Cz', 'Pt', 'SO', 'N'];

$monthNamesInPolish = [
  'Styczeń',
  'Luty',
  'Marzec',
  'Kwiecień',
  'Maj',
  'Czerwiec',
  'Lipiec',
  'Sierpień',
  'Wrzesień',
  'Październik',
  'Listopad',
  'Grudzień'
];

$YEAR = 'year';
$MONTH = 'month';

$date_for_calendar = isset($_GET['date_for_calendar'])
? $_GET['date_for_calendar']
: '2024-10';


[$year, $month] = explode('-', $date_for_calendar);

$year = (int)$year;
$month = (int)$month;

$calendar = createCalendar($year, $month);

$hasError = false;

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
        Rok i miesiąc
        <input
          class="border-4 pl-2"
          name="date_for_calendar"
          type="month"
          placeholder="np. Luty"
          value="<?= $month ?>">
      </label>

    </div>

    <button
      class="bg-gray-400 text-white px-2 py-1 rounded-l hover:bg-gray-700"
      type="submit">
      Stwórz kalendarz
    </button>
  </form>

  <?php

  if ($hasError || !is_array($calendar)) {
    echo "<p>$calendar</p>";

    echo "</body></html>";
    return;
  }

  echo "<section><table><thead>";

  echo "<div class='pb-2 px-1 items-center flex w-100% justify-between'>
        <span class='text-xl text-red-500 font-bold'>
          $monthNamesInPolish[$month]
        </span>

        <span class='text-l font-bold'>$year</span>
      </div>
    ";

  foreach ($days_of_week as $day) {
    $class = $day === 'N' ? "text-white bg-red-700" : 'text-white bg-gray-700';

    echo isset($day) ? "<th class='$class'>$day</th>" : '<th></th>';
  }

  foreach ($calendar as $week) {
    echo "<tr class='border-b-1 border-red'>";

    foreach ($week as $day) {
      echo isset($day) ? "<td class='p-2 font-bold'>$day</td>" : '<td></td>';
    }

    echo "</tr>";
  }

  echo "</tbody></table></section>";
  ?>

</body>

</html>

<?php

function createCalendar(int $year, int $month)
{
  if ($year < 0 || $year > 3000) {
    return 'Proszę podać prawidłowy rok (między 0 a 3000)';
  }

  if ($month < 1 || $month > 12) {
    return 'Proszę parwidłowy miesiąc (między 1 a 12)';
  }

  // Ustaw strefę czasową dla ułatwienia formatu daty
  date_default_timezone_set('Europe/Warsaw');

  $firstDayOfMonth = new DateTime("$year-$month-01");

  $days_in_month = $firstDayOfMonth->format('t');

  $start_day_of_the_week = (int)$firstDayOfMonth->format('N');

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