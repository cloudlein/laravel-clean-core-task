<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white shadow rounded p-6">
            <h1 class="text-xl font-semibold mb-4">Register</h1>

            @if (session('status'))
                <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-3 py-2 rounded text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('users.register.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm mb-1">Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border rounded px-3 py-2 text-sm"
                    >
                    @error('name')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm mb-1">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded px-3 py-2 text-sm"
                    >
                    @error('email')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm mb-1">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded px-3 py-2 text-sm"
                    >
                    @error('password')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full bg-black text-white py-2 rounded text-sm hover:bg-gray-900"
                >
                    Register
                </button>
            </form>
        </div>
    </body>
</html>

