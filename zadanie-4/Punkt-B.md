# Zadanie 4 Punkt B

## Opis błędu

* Ze screena rozumiem ze błąd dotyczy błędu przy walidacji danych.
* Błąd występuje kiedy próbujemy stworzyć wniosek dla osoby, która pracowała tylko jeden dzień, a w formularzu wpisujemy tą samą datę w polach "od" i "do"

## Zaproponowane rozwiązania

### Rozwiązanie 1
* Dodać dodatkową walidację, która nie pozwala na wpisanie tej samej daty w oba pola.
* Mozna dodać do tego rozwiązania dodać dodatkową informację dla uzytkownika, np: "Okres zatrudnienia musi być wynisić minimum 1 dzień"
* Wtedy przy wpisywaniu wniosku dla osoby, która pracowała 1 dzień - wpisujemy np. "od": 2022-09-30 "do" 2022-09-31.
* Nalezaloby do tego rozwiązania dodać jeszczę np. zółtą ikonę "i", która po najechaniu pokazuje instrukcję wpisywania czasu zatrudnienia.

### Rozwiązanie 2
* Zmienić obecną walidację i traktować pole "od" jako datę dnia rozpoczynającego się od "00:01", a pole "do" jako datę dnia kończącego o 23:59.
* Wtedy zamiast sprawdzać, czy ilość przepracowanych dni to przynajmniej 1, mozemy sprawdzać, czy ilość przepracowanych godzin jest większa od 0.

