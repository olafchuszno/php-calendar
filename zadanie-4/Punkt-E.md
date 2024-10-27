# Opis problemu

Jest to dosyć ogólny błąd, polegający na niepowodzeniu pobrania jakiś danych.

## Rozwiązania problemu
Zastosowałbym je po kolei w takiej kolejności (a po każdym z kroków ponowić próbę), zaczynając od najprostszych rozwiązań:

1. Sprawdzenie poprawności adresu, na który wykonujemy ządanie
2. Sprawdzenie połączenia z internetem
3. Wyczyszczenie cache przeglądarki i spróbowanie ponownie
4. Sprawdzenie, czy serwer do którego wysyłamy zadanie działa
5. Sprawdzenie, czy CORS pozwala na wykonanie tego żądania (z danego adresu)
6. Sprawdzenie, czy wtyczki w naszej przeglądarce nie powodują problemu, ewentualne wyłączenie ich i otwarcie ponownie przeglądarki