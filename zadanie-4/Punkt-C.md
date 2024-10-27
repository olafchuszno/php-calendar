## Problem
* Problem występuje, poniewaz próbujemy wstawić w tabeli string 30B do kolumny, która przyjmuje integer-y (liczby całkowite).

## Rozwiązania

### Lepsza Walidacja i przygotowanie danych po stronie frontendu
* Musimy odpowiednio przygotować wartość do wysłania
* Zaleznie od funkcjonalności jaką ten kod ma spełniać:
  * Zastosować jakąś funkcję (np. zamienić liczby na określone wartości liczbowe)
  * Po prostu obciąć ze stringu wszystkie znaki nie-liczbowe

### Walidacja i konwersja po stronie backendu
* Przed wykonaniem query nalezy sprawdzić, czy wartość jest liczba lub czy otrzymany string po konwersji jest wartością liczbową
* Jeśli otrzymana wartość nie jest wartością liczbową - mozemy np. zwrócić status code 400 - bad request i opcjonalną wiadomość, które dane są nie poprawne