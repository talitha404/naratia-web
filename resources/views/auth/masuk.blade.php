<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naratia - Masuk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black flex items-center justify-center min-h-screen">

<div class="bg-[#1c1c1f]/90 backdrop-blur-md p-10 rounded-2xl w-96 shadow-xl border border-white/5">

  <h2 class="text-white text-center text-xl mb-8 font-semibold tracking-wide">
    Masuk
  </h2>

  <form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    @if ($errors->any())
        <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-sm p-3 rounded-lg">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div>
      <label for="email" class="text-gray-400 text-sm block mb-2">Email</label>
      <input type="email" name="email" id="email" required
             class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 border border-transparent focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
    </div>

    <div>
      <label for="password" class="text-gray-400 text-sm block mb-2">Sandi</label>
      <input type="password" name="password" id="password" required
             class="w-full bg-[#2b2b30] text-white rounded-lg px-4 py-2 border border-transparent focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
    </div>

    <button type="submit" class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-medium hover:bg-indigo-700 active:scale-[0.98] transition shadow-lg shadow-indigo-500/20">
      Masuk
    </button>
  </form>

  <p class="text-gray-400 text-sm mt-6 text-center">
    Belum punya akun?
    <a href="{{ url('/daftar') }}" class="font-semibold text-white hover:underline decoration-indigo-400 underline-offset-4">
      Daftar
    </a>
  </p>

</div>
</body>
</html>