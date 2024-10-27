# Możliwe przyczyny błędu

##  Ta schema po prostu nie istnieje, albo nie ma w tej schemy tabeli "creg".

  ### Sprawdzenie: 
  Sprawdźmy za pomocą query SELECT czy ta schema istnieje. Jeśli schema istnieje - sprawdźmy, czy jest w niej ta tablica "creg".

  ### Rozwiązanie tego błędu:
  Możliwe że po prostu wkradła się literówka. W tym przypadku poprawmy nasz kod z odpowiednimi nazwami schemy i tabeli. W przeciwnym wypadku możliwe, że będziemy musieli sami stworzyć tą tabelę.


## Możliwe ze nie mamy dostępu do tej schemy "cregisters". W takim wypadku oczywiście nie znajdziemy naszej tablicy "creg".

  ## Sprawdzenie:
  Wykonamy do tego query z u uzyciem "grantee" aby sprawdzić, czy my (nasz username) ma dostęp do tej tabeli

  ### Rozwiązanie tego błędu:
  Musimy dodać uprawnienia dostępu do tej tabeli


## Połączyliśmy się z niewłaściwą bazą danych

  ### Sprawdzenie:
  Sprawdźmy z jakią bazą danych się połączyliśmy.
  Łatwo sprawdzimy to w PHP przez wykonanie query "SELECT current_database();" na instancji pdo.

  ### Rozwiązanie tego błędu:
  Zmiana kodu, aby połączyć się z odpowiednią bazą danych.