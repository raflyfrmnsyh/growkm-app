<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-dashboards.sidebar></x-dashboards.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex items-start gap-4 mx-8 py-[112px]">
        <div class="flex flex-col items-center bg-gray-100 min-h-screen py-2 w-full">
        <div class="w-full max-w-6xl bg-white rounded-lg shadow p-8">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold">Edit Profile</h1>
                    <p class="text-sm text-gray-500">Kelola informasi akun pribadimu di halaman ini.</p>
                </div>
                <div class="text-xs text-gray-400">
                    Dashboard / Settings / <span class="text-[#007F73] font-semibold">account settings</span>
                </div>
            </div>

            {{-- Tabs --}}
            <div class="flex border-b mb-8">
                <a href="{{ route('profile.info') }}" class="px-4 py-2 text-gray-600">Profile Info</a>
                <a href="{{ route('account.info') }}" class="px-4 py-2 text-gray-600">Akun Info</a>
                <a href="{{ route('change.password') }}" class="px-4 py-2 border-b-2 border-[#007F73] text-[#007F73] font-semibold">Ubah Password</a>
            </div>

            {{-- Change Password Form --}}
            <form>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">
                        Password Lama <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input id="old_password" type="password" class="w-full border rounded px-4 py-2 text-sm pr-10" placeholder="xxxxxxxx">
                        <button type="button" onclick="togglePassword('old_password', this)" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">
                            <svg id="icon_old_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Buat Password Baru</label>
                    <div class="relative">
                        <input id="new_password" type="password" class="w-full border rounded px-4 py-2 text-sm pr-10" placeholder="xxxxxxxx">
                        <button type="button" onclick="togglePassword('new_password', this)" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">
                            <svg id="icon_new_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <input id="confirm_password" type="password" class="w-full border rounded px-4 py-2 text-sm pr-10" placeholder="xxxxxxxx">
                        <button type="button" onclick="togglePassword('confirm_password', this)" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">
                            <svg id="icon_confirm_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex justify-end gap-2 pt-4 border-t">
                    <button type="button" class="px-4 py-2 rounded border border-[#007F73] text-[#007F73] text-sm font-medium hover:bg-[#007F73]/10">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded bg-[#007F73] text-white text-sm font-medium hover:bg-[#005f57]">Simpan Perubahan</button>
                </div>
            </form>

            <script>
            function togglePassword(inputId, btn) {
                const input = document.getElementById(inputId);
                const icon = btn.querySelector('svg');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.add('text-[#007F73]');
                } else {
                    input.type = 'password';
                    icon.classList.remove('text-[#007F73]');
                }
            }
            </script>
        </div>
        </div>
        </section>
    </main>

</body>

</html>
