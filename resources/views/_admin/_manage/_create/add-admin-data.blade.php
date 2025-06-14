<x-layouts.admin.admin-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-end justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Tambah Data Admin</h1>

        <div class="flex flex-col md:flex-row items-center gap-2 w-full lg:w-auto justify-between lg:justify-end">
            <a href="{{ route('admin.manage.admin') }}" class="opacity-50 hover:opacity-100 transition-all">Kelola
                Admin</a>
            <span>/</span>
            <span class="font-medium text-secondaryColors-base">Tambah data</span>
        </div>
    </div>

    <div class="p-6 bg-white w-full">
        <form action="{{ route('admin.manage.store-admin') }}" method="POST" class="flex gap-2 flex-wrap justify-between items-start">
    @csrf

            {{-- username, user_email, user_phone, user_gender, user_address, user_profile, user_role --}}

            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="username" class="font-medium text-gray-800 w-full">Username</label>
                <input type="text" name="username" id="usernameField" placeholder="Jhon Doe" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
            </div>
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="email" class="font-medium text-gray-800 w-full">Email</label>
                <input type="email" name="user_email" id="EmailField" placeholder="example@email.com" required
                class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">

            </div>
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_phone" class="font-medium text-gray-800 w-full">No. Ponsel</label>
                <input type="text" name="user_phone" id="PhoneField" placeholder="+62xxxxxxxx" maxlength="14"
                    required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
            </div>
            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_gender" class="font-medium text-gray-800 w-full">Gender</label>
                <div class="relative">
                    <select name="user_gender" id="genderFieldSelect"
                        class="block appearance-none my-2 w-full bg-white border border-gray-200 px-4 py-3 pr-8 rounded-md leading-tight focus:outline-none transition focus:border-2 focus:border-secondaryColors-40 custom-select">
                        <option value="">Pilih Gender</option>
                        <option value="M">Laki-Laki</option>
                        <option value="F">Perempuan</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_password" class="font-medium text-gray-800 w-full">Buat Password</label>
                <input type="password" name="user_password" id="passField" placeholder="••••••••" required
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2">
            </div>

            <div class="mb-4 flex flex-col w-full md:w-[48%]">
                <label for="user_role" class="font-medium text-gray-800 w-full">Role Admin</label>
                <div class="relative">
                    <select name="user_role" id="genderFieldSelect"
                        class="block appearance-none my-2 w-full bg-white border border-gray-200 px-4 py-3 pr-8 rounded-md leading-tight focus:outline-none transition focus:border-2 focus:border-secondaryColors-40 custom-select">
                        <option value="">Pilih Role</option>
                        <option value="M">Admin Event</option>
                        <option value="F">Admin Produk</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-400">
                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                            <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mb-4 flex flex-col w-full">
                <label for="user_address" class="font-medium text-gray-800 w-full">Alamat</label>
                <textarea name="user_address" id="addressField" rows="3" placeholder="Alamat lengkap"
                    class="border border-gray-200 px-4 py-3 my-2 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus;border-2 resize-none"></textarea>
            </div>
            <div class="w-full">
                <div class="flex items-center gap-4">
                    <input type="submit" value="Tambah Data"
                        class="bg-secondaryColors-base px-4 py-3 font-semibold text-white rounded-md cursor-pointer hover:bg-secondaryColors-60 transition-all">
                    <a href="{{ route('admin.manage.admin') }}"
                        class="px-4 py-3 font-medium text-dark-base border border-gray-300 rounded-md ">Kembali</a>
                </div>
            </div>
        </form>
    </div>


</x-layouts.admin.admin-layout>
