<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formularz Rejestracyjny Firm</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <button class="pb-2">
      <a 
        class="text-blue-400 font-regular py-1 px-2 rounded hover:bg-blue-400 hover:text-white"
        href="/initial-registration-form.php"
      >
        < Rodzaj konta
      </a>
    </button>

    <h1 class="text-2xl font-bold text-center mb-4">Formularz Rejestracyjny Firm</h1>

    <form id="registration-form" action="" method="POST" class="space-y-4">
      <div id="company_fields" class="space-y-4">
        <label class="block">
          <span class="text-gray-700">Nazwa firmy</span>
          <input
            required
            type="text" 
            name="company_name"
            placeholder="Nazwa Firmy sp. z o.o."
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
          >
        </label>

        <label class="block">
          <span class="text-gray-700">Adres e-mail</span>
          <input
            required
            type="email"
            name="email"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
            placeholder="firma@example.com"
          >
        </label>

        <label class="block">
          <span class="text-gray-700">NIP</span>
          <input
            required
            minlength="10"
            maxlength="10"
            type="text"
            name="nip"
            placeholder="1234567890"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
          >
        </label>
      </div>

      <div class="flex justify-center">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Zarejestruj się
        </button>
      </div>
    </form>
  </div>
</body>

</html>