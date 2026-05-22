<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Naratia - Daftar Akun</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/js/app.js')
</head>

<body class="bg-black flex items-center justify-center min-h-screen">

  <div class="bg-[#1c1c1f]/90 backdrop-blur-md p-10 rounded-2xl w-96 shadow-xl">

    <!-- Judul -->
    <h2 class="text-white text-center text-xl mb-8 font-medium">
      Daftar
    </h2>

    <!-- Form -->
    <form id="signupForm" class="space-y-6" method="POST" action="{{ url('/register') }}">
      @csrf
      <!-- Email -->
      <div>
        <label for="email" class="text-gray-300 text-sm block mb-2">Email</label>
        <input
          type="email"
          name="email"
          id="email"
          required
          class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <p id="emailError" class="text-red-400 text-sm mt-1 hidden"></p>
      </div>

      <div>
        <label for="password" class="text-gray-300 text-sm block mb-2">Sandi</label>
        <input
          type="password"
          name="password"
          id="password"
          required
          minlength="6"
          class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 hover:ring-2 hover:ring-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <p id="passwordError" class="text-red-400 text-sm mt-1 hidden"></p>
      </div>

      <!-- Username -->
      <div>
        <label for="username" class="text-gray-300 text-sm block mb-2">Username</label>
        <input
          type="text"
          id="username"
          name="username"
          required
          class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <p id="usernameError" class="text-red-500 text-xs mt-1 hidden"></p>
      </div>

      <!-- Nama -->
      <div>
        <label for="nama" class="text-gray-300 text-sm block mb-2">Nama</label>
        <input
          type="text"
          id="nama"
          name="nama"
          required
          class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 border border-transparent focus:outline-none focus:ring-2 focus:ring-blue-500"
        >
        <p id="namaError" class="text-red-500 text-xs mt-1 hidden"></p>
      </div>

      <!-- Button -->
      <button
        id="submitBtn"
        type="submit"
        class="w-full bg-gray-500 text-white py-2 rounded-lg hover:bg-violet-700 transition">
        Daftar
      </button>

      <p id="formMessage" class="text-yellow-400 text-sm mt-2 text-center hidden">
        Silakan isi kolom yang ada terlebih dahulu
      </p>

    </form>

    <!-- Link -->
    <p class="text-gray-300 text-sm mt-6 text-center">
      Sudah punya akun?
      <a
        href="{{ url('/masuk') }}"
        id="masukLink"
        class="font-semibold text-white hover:underline">
        Masuk
      </a>
    </p>

  </div>
</body>

</html>