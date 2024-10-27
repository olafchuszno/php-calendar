<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    // Walidacja danych
    document.getElementById('registration-form').addEventListener('submit', (event) => {
      const userType = document.getElementById('user-type').value;

      const userTypes = ['private-person', 'company'];

      if (userType === 'none') {
        alert('Wybierz rodzaj konta.');

        event.preventDefault();
        return;
      }

      const birthDateInput = document.querySelector('input[name="date_of_birth"]');

      if (!birthDateInput) {
        alert('Data urodzenia musi zostać podana.')
        event.preventDefault();
        return;
      }

      const usersBirthDate = birthDateInput.value;

      const now = new Date();

      const currentDate = now.getDate();
      const currentMonth = now.getMonth() + 1;
      const currentYear = now.getFullYear();

      const dateOfLegalAge = `${currentYear - 18}-${currentMonth}-${currentDate}`;

      if (dateOfLegalAge < usersBirthDate) {
        alert('Tylko osoby pełnoletnie mogą utworzyć konto.');
        event.preventDefault();
      }

    })
  </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h1 class="text-2xl font-bold text-center mb-5">Wybierz rodzaj konta</h1>

    <div class="flex gap-2 flex-col items-center justify-center">
      <a class="w-48 text-white text-center px-3 py-1 rounded bg-blue-400 hover:bg-blue-700" href="/individual-registration.php">Konsument</a>
      <a class="w-48 text-white text-center px-2 py-1 rounded bg-blue-400 hover:bg-blue-700" href="/company-registration.php">Firma</a>
    </div>
  </div>
</body>

</html>