<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit User</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white shadow rounded p-6">
            <h1 class="text-xl font-semibold mb-4">Edit User</h1>

            <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm mb-1">Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
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
                        value="{{ old('email', $user->email) }}"
                        class="w-full border rounded px-3 py-2 text-sm"
                    >
                    @error('email')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm mb-1">Role</label>
                    <select
                        name="role"
                        class="w-full border rounded px-3 py-2 text-sm bg-white"
                    >
                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm mb-1">Password (Kosongkan jika tidak diubah)</label>
                    <input
                        type="password"
                        name="password"
                        class="w-full border rounded px-3 py-2 text-sm"
                    >
                    @error('password')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('users.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                    <button
                        type="submit"
                        class="bg-black text-white px-4 py-2 rounded text-sm hover:bg-gray-900"
                    >
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>
