
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container mx-auto max-w-md mt-10 p-6">
        <h1 class="text-2xl font-bold mb-6">Iniciar Sessió</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="username" class="block mb-2">User:</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    value="{{ old('username') }}"
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2"
                >
                @error('username')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-2">Password:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                    class="w-full border border-gray-300 rounded px-3 py-2"
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit"
                class="w-full bg-blue-500 text-white rounded px-4 py-2 hover:bg-blue-600"
            >
                Entrar
            </button>
        </form>
    </div>
</body>
</html>