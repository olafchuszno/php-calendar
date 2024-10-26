<?php

function getCellAddress($cell)
{
  // String liter (wielkich)
  $column = '';

  // String liczb
  $row = '';

  // Dodaj znaki z adresu komórki do odpowiednich grup
  for ($i = 0; $i < strlen($cell); $i++) {

    // Dodaj znak do odpowiedniej grupy
    if (ctype_alpha($cell[$i])) {
      $column .= strtoupper($cell[$i]);
    } elseif (ctype_digit($cell[$i])) {
      $row .= $cell[$i];
    }
  }

  // Zamień wartość ascii na indeks alfabetu - numer kolumny
  $columnNumber = ord($column[0]) - ord('A') + 1;

  return "$columnNumber.$row";
}

// Przykłady uzycia z przykładu
echo "A2: " . getCellAddress("A2") . "\n";
echo "B2: " . getCellAddress("B2") . "\n";
echo "A500: " . getCellAddress("A500") . "\n";

// Dodatkowy przykład
echo "C20: " . getCellAddress("C20") . "\n";
