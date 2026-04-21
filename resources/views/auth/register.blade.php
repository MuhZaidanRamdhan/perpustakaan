<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4 bg-gray-100">

        <div
            class="w-full max-w-5xl bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100
                    flex flex-col md:flex-row">

            {{-- LEFT --}}
            <div
                class="hidden md:flex md:w-1/2 bg-gradient-to-br from-blue-600 to-blue-700 
                        p-12 flex-col justify-center text-white relative overflow-hidden">

                <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-500 rounded-full opacity-30"></div>
                <div class="absolute -bottom-10 -right-10 w-60 h-60 bg-blue-800 rounded-full opacity-30"></div>

                <div class="relative z-10 max-w-md">
                    <h2 class="text-4xl font-bold mb-6 leading-tight">
                        Buat Akun Admin Perpus
                    </h2>
                    <p class="text-blue-100 leading-relaxed">
                        Daftar untuk mulai mengelola buku dan memantau peminjaman dengan mudah.
                    </p>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="w-full md:w-1/2 p-6 md:p-12 flex flex-col justify-center">

                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800">Register</h3>
                    <p class="text-gray-500 text-sm">
                        Lengkapi data di bawah untuk membuat akun baru.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- NAME --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkap"
                            class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-white
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                            required autofocus>
                        <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
                    </div>

                    {{-- EMAIL --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com"
                            class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-white
                                   focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none"
                            required>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
                    </div>

                    {{-- PASSWORD --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700">Password</label>

                        <div class="relative">
                            <input id="password" type="password" name="password" placeholder="••••••••"
                                class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-white
                                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none pr-14"
                                required>

                            <button type="button" onclick="togglePassword('password', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">

                                <span class="eye-open">
                                    <!-- eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" stroke-width="2" />
                                    </svg>
                                </span>

                                <span class="eye-off hidden">
                                    <!-- eye-off -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2"
                                            d="M17.94 17.94A10.94 10.94 0 0112 19c-7 0-11-7-11-7a21.77 21.77 0 015.06-6.94M9.9 4.24A10.94 10.94 0 0112 5c7 0 11 7 11 7a21.77 21.77 0 01-4.06 5.94M1 1l22 22" />
                                    </svg>
                                </span>

                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
                    </div>

                    {{-- CONFIRM PASSWORD --}}
                    <div>
                        <label class="text-sm font-medium text-gray-700">Konfirmasi Password</label>

                        <div class="relative">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="••••••••"
                                class="w-full mt-1 px-4 py-3 rounded-xl border border-gray-300 bg-white
                                       focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none pr-14"
                                required>

                            <button type="button" onclick="togglePassword('password_confirmation', this)"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500">

                                <span class="eye-open">
                                    <!-- eye -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2" d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" stroke-width="2" />
                                    </svg>
                                </span>

                                <span class="eye-off hidden">
                                    <!-- eye-off -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-width="2"
                                            d="M17.94 17.94A10.94 10.94 0 0112 19c-7 0-11-7-11-7a21.77 21.77 0 015.06-6.94M9.9 4.24A10.94 10.94 0 0112 5c7 0 11 7 11 7a21.77 21.77 0 01-4.06 5.94M1 1l22 22" />
                                    </svg>
                                </span>

                            </button>
                        </div>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs" />
                    </div>

                    {{-- BUTTON --}}
                    <button
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl
                               shadow-md hover:shadow-lg transition active:scale-[0.97]">
                        Daftar Sekarang
                    </button>

                    {{-- LOGIN LINK --}}
                    <p class="text-sm text-center text-gray-600">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                            Login di sini
                        </a>
                    </p>
                </form>

                {{-- FOOTER --}}
                <p class="text-center text-xs text-gray-400 mt-6">
                    © {{ date('Y') }} Admin Perpus
                </p>

            </div>

        </div>

    </div>

    {{-- SCRIPT --}}
    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const open = el.querySelector('.eye-open');
            const off = el.querySelector('.eye-off');

            if (input.type === "password") {
                input.type = "text";
                open.classList.add('hidden');
                off.classList.remove('hidden');
            } else {
                input.type = "password";
                open.classList.remove('hidden');
                off.classList.add('hidden');
            }
        }
    </script>
</x-guest-layout>
