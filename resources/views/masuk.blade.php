<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/js/app.js')
</head>

<body class="bg-black flex items-center justify-center min-h-screen">

<!-- Card -->
<div class="bg-[#1c1c1f]/90 backdrop-blur-md p-10 rounded-2xl w-96 shadow-xl">

  <!-- Judul -->
  <h2 class="text-white text-center text-xl mb-8 font-medium">
    Masuk
  </h2>

  <!-- FORM LOGIN -->
  <form id="loginForm" method="POST" action="{{ url('/login') }}" class="space-y-6">
    @csrf
    <!-- Email -->
    <div>
      <label for="email" class="text-gray-300 text-sm block mb-2">Email</label>

      <input
        type="email"
        name="email"
        id="email"
        required
        class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 border border-transparent hover:ring-2 hover:ring-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >

      <p id="emailError" class="text-red-400 text-sm mt-1 hidden"></p>
    </div>

    <!-- Password -->
    <div>
      <label for="password" class="text-gray-300 text-sm block mb-2">Sandi</label>

      <input
        type="password"
        name="password"
        id="password"
        required
        class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 border border-transparent hover:ring-2 hover:ring-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
      >

      <p id="passwordError" class="text-red-400 text-sm mt-1 hidden"></p>
    </div>

    <!-- Lupa sandi -->
    <div class="text-right">
      <a
        href="#"
        class="text-gray-400 text-sm hover:text-white"
      >
        Lupa sandi?
      </a>
    </div>

    <!-- Button -->
    <button
      id="loginBtn"
      type="submit"
      class="w-full bg-gray-500 text-white py-2 rounded-lg hover:bg-violet-700 transition">
      Masuk
    </button>

    <!-- Pesan form -->
    <p id="formMessage" class="text-yellow-400 text-sm mt-2 text-center hidden">
      Silakan isi email dan sandi terlebih dahulu
    </p>

  </form>

  <!-- Link daftar -->
  <p class="text-gray-300 text-sm mt-6 text-center">
    Belum punya akun?
    <a
      href="{{ url('/daftar') }}"
      class="font-semibold text-white hover:underline"
    >
      Daftar
    </a>
  </p>

</div>

</body>
</html>