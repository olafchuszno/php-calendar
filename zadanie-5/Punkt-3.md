Proponuje stworzyć 2 tabelę, jedną dla uzytkowników, druga dla zastępstwa

# Tabela Users (użytkownicy)

## id 
* int lub uuid
* Unikalny identyfikator użytkownika

## first_name 
* string
* Imię

## last_name 
* string
* Nazwisko

## role
* ENUM Rola użytkownika
* Opcje: ("Worker", "Manager", "Director")

## is_available
BOOLEAN Czy użytkownik jest dostępny (true/false)

# Tabela Substitutions (zastępstwa)

## id
* int
* Unikalny identyfikator zastępstwa

## user_id
* int lub uuid
* id osoby na urlopie, która ma zastępcę

## substitute_id
* INT lub UUID
* id osoby, która jest zastępcą

## start_date
* DATE
* Data rozpoczęcia zastępstwa

## end_date
* DATE
* Data zakończenia zastępstwa