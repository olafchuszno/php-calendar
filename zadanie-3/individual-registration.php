<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formularz Rejestracyjny Konsumentów</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <button class="pb-2">
      <a
        class="text-blue-400 font-regular py-1 px-2 rounded hover:bg-blue-400 hover:text-white"
        href="/initial-registration-form.php">
        < Rodzaj konta
          </a>
    </button>

    <h1 class="text-2xl font-bold text-center mb-4">Formularz Rejestracyjny Konsumentów</h1>

    <form id="registration-form" action="" method="POST" class="space-y-4">
      <div id="private-person_fields" class="space-y-4">
        <label class="block">
          <span class="text-gray-700">Imię</span>
          <input required type="text" name="first_name" placeholder="Mateusz" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </label>

        <label class="block">
          <span class="text-gray-700">Adres e-mail</span>
          <input required type="email" name="email" placeholder="mateusz@email.com" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </label>

        <label class="block">
          <span class="text-gray-700">Data urodzenia</span>
          <input required type="date" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        </label>
      </div>

      <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Zarejestruj się
        </button>
      </div>
    </form>
  </div>

  <script>
    // Date do walidacji danych uytkownika
    const now = new Date();
    const currentDate = now.getDate();
    const currentMonth = now.getMonth() + 1;
    const currentYear = now.getFullYear();
    const dateOfLegalAge = `${currentYear - 18}-${currentMonth}-${currentDate}`;

    // Dodatkowa walidacja daty urodzenia - tylko pełnoletni uzytkownicy mogą utworzyć konto
    document.getElementById('date_of_birth').setAttribute('max', dateOfLegalAge);

    // Walidacja danych w przesłanym formularzu
    document.getElementById('registration-form').addEventListener('submit', (event) => {

      const birthDateInput = document.querySelector('input[name="date_of_birth"]');

      if (!birthDateInput) {
        alert('Data urodzenia musi zostać podana.')
        event.preventDefault();
        return;
      }

      const usersBirthDate = birthDateInput.value;

      if (dateOfLegalAge < usersBirthDate) {
        alert('Tylko osoby pełnoletnie mogą utworzyć konto.');
        event.preventDefault();
      }

    })
  </script>
</body>

</html>