<html>
<x-partials.head-info>
    <x-slot:title>{{ $title }}</x-slot:title>
</x-partials.head-info>

<body class="bg-gray-100 flex flex-row justify-center items-start">
    <x-partials.dashboard.sidebar></x-partials.dashboard.sidebar>

    <main class="w-full lg:w-[80%] lg:left-[20%] absolute ">
        {{-- Mobile Header --}}
        <x-partials.dashboard.mobile-header></x-partials.dashboard.mobile-header>
        {{-- Desktop Header --}}
        <x-partials.dashboard.desktop-header></x-partials.dashboard.desktop-header>

        <section class="section_content flex items-start gap-4 mx-8 py-[112px]">
            <div class="flex flex-col items-center bg-gray-100 min-h-screen py-2 w-full">
                <div class="w-full bg-white rounded-lg shadow p-8">
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
                        <a href="{{ route('account.info') }}"
                            class="px-4 py-2 border-b-2 border-[#007F73] text-[#007F73] font-semibold">Akun Info</a>
                        <a href="{{ route('change.password') }}" class="px-4 py-2 text-gray-600">Ubah Password</a>
                    </div>

                    {{-- Account Info Form --}}
                    <form>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium mb-1">Email</label>
                                <input type="text" class="w-full border rounded px-4 py-2 text-sm"
                                    placeholder="Example@gmail.com">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Nomor HP</label>
                                <input type="text" class="w-full border rounded px-4 py-2 text-sm"
                                    placeholder="08XX XXXX XXXX">
                            </div>
                        </div>
                        <div class="flex justify-end gap-2 pt-4 border-t">
                            <button type="button"
                                class="px-4 py-2 rounded border border-[#007F73] text-[#007F73] text-sm font-medium hover:bg-[#007F73]/10">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 rounded bg-[#007F73] text-white text-sm font-medium hover:bg-[#005f57]">Simpan
                                Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

</body>

</html>
