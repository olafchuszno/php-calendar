Mozna to zrobić zarówno z dwoma osobnymi tabelami dla firm (Companies) i osób prywatnych (Consumers), jak i z jedną wspólną tabelą.

Proponuje rozdzielić te tabelę, z uwagi na rózne prawa przysługujące firmą i łatwość w tworzeniu bazy danych.

# Tabela Consumers

## id
Automatycznie wypełniany
PK - jest głównym indexem

## email
string(255)
Jest unikatowy
Nie jest null-em

## first_name
string(50)
Nie jest null-em

## birth_date
Data
Nie jest null-em

## created_at
timestamp
Automatycznie wypełniany


# Tabela Companies

## id
Automatycznie wypełniany
PK - jest głównym indexem

## email
string(255)
Jest unikatowy
Nie jest null-em

## company_name
string(100) - dłuzszy niz imie czy nazwisko
Nie jest null-em

## nip
string(10)
Nie jest null-em
Jest unikatowy

## created_at
timestamp
Automatycznie wypełniany

