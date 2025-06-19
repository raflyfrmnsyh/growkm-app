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
                            <p class="text-base text-gray-500">Kelola informasi akun pribadimu di halaman ini.</p>
                        </div>
                        <div class="text-xs text-gray-400">
                            Dashboard / Settings / <span class="text-[#007F73] font-semibold">account settings</span>
                        </div>
                    </div>

                    {{-- Tabs --}}
                    <div class="flex border-b mb-8"></div>

                    {{-- Success/Error Messages --}}
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(session('info'))
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4">
                            {{ session('info') }}
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Profile Info Form --}}
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-20 h-20 bg-gray-300 rounded-lg flex items-center justify-center text-2xl font-bold text-gray-700">
                                @if($user->user_profile)
                                    <img src="{{ asset($user->user_profile) }}" alt="Profile" class="w-full h-full object-cover rounded-lg">
                                @else
                                    {{ substr($user->user_name, 0, 2) }}
                                @endif
                            </div>
                            <div>
                                <p class="text-base mb-2">Upload foto baru dengan ukuran kurang dari 1 MB, dan bertipe JPG atau PNG.</p>
                                <input type="file" name="user_profile" accept=".jpg,.jpeg,.png" class="px-4 py-2 border rounded text-sm">
                                @error('user_profile') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
                                <input type="text" name="user_name" value="{{ old('user_name', $user->user_name) }}" 
                                       class="w-full border rounded px-4 py-2 text-sm" placeholder="Enter your name">
                                @error('user_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Jenis Kelamin</label>
                                <select name="user_gender" class="w-full border rounded px-4 py-2 text-sm">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('user_gender', $user->user_gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('user_gender', $user->user_gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('user_gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Tempat Lahir</label>
                                <input type="text" class="w-full border rounded px-4 py-2 text-sm"
                                    placeholder="Enter your birthplace">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Tanggal Lahir</label>
                                <input type="date" class="w-full border rounded px-4 py-2 text-sm">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Status Pekerjaan</label>
                                <select class="w-full border rounded px-4 py-2 text-sm">
                                    <option>Pilih Status</option>
                                    <option>Pelajar</option>
                                    <option>Mahasiswa</option>
                                    <option>Pekerja</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Asal Kabupaten / Kota</label>
                                <input type="text" class="w-full border rounded px-4 py-2 text-sm"
                                    placeholder="Masukan Kabupaten/Kota">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-1">Alamat Lengkap</label>
                            <textarea name="user_address" class="w-full border rounded px-4 py-2 text-sm" rows="2" 
                                      placeholder="Masukan alamat lengkap anda">{{ old('user_address', $user->user_address) }}</textarea>
                            @error('user_address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block text-sm font-medium mb-1">Email</label>
                                <input type="email" name="user_email" value="{{ old('user_email', $user->user_email) }}" 
                                       class="w-full border rounded px-4 py-2 text-sm" placeholder="Example@gmail.com">
                                @error('user_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Nomor HP</label>
                                <input type="text" name="user_phone" value="{{ old('user_phone', $user->user_phone) }}" 
                                       class="w-full border rounded px-4 py-2 text-sm" placeholder="08XX XXXX XXXX">
                                @error('user_phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        {{-- Password fields --}}
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-1">Password Lama <span class="text-red-500">*</span></label>
                            <input type="password" name="old_password" class="w-full border rounded px-4 py-2 text-sm" placeholder="xxxxxxxx">
                            @error('old_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-1">Password Baru</label>
                            <input type="password" name="new_password" class="w-full border rounded px-4 py-2 text-sm" placeholder="xxxxxxxx">
                            @error('new_password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" class="w-full border rounded px-4 py-2 text-sm" placeholder="xxxxxxxx">
                        </div>

                        <div class="flex justify-end gap-2 pt-4 border-t">
                            <button type="button" class="px-4 py-2 rounded border border-[#007F73] text-[#007F73] text-sm font-medium hover:bg-[#007F73]/10">Batal</button>
                            <button type="submit" class="px-4 py-2 rounded bg-[#007F73] text-white text-sm font-medium hover:bg-[#005f57]">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
