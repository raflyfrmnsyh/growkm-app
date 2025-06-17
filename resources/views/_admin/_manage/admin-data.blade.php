@php
use Illuminate\Support\Arr;
@endphp
<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    <div
        class="p-6 bg-white w-full gap-8 rounded-t-md flex lg:flex-row flex-col items-center justify-between border-b border-gray-200">
        <h1 class="font-semibold text-lg">Data Admin</h1>

        <div class="flex flex-col md:flex-row items-center gap-4 w-full lg:w-auto justify-between lg:justify-end">

            <form action="{{ route('admin.manage.admin') }}" method="get">
                @csrf
                <div
                    class="input-bx border border-gray-200 py-2 px-4 rounded-md w-[320px] flex items-center justify-between gap-2">
                    <input type="text" name="searchBox" id="searchBox" placeholder="Cari admin"
                    value="{{request('searchBox')}}"
                        class="border border-gray-200 px-2 py-1 rounded-md w-full focus:outline-none focus:border-secondaryColors-base focus:border-2">
                        <button type="submit">
                            <x-icons.searach-01 class="size-5 stroke-gray-200">
                            </x-icons.searach-01>
                        </button> 
                    
                    
                </div>
            </form>

            <div class="flex gap-4">
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <div>
                        <button type="button" @click="open = !open"
                            class="inline-flex w-full items-center justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-md font-semibold text-gray-800 border border-gray-200 hover:bg-gray-50"
                            id="menu-button" aria-expanded="true" aria-haspopup="true">
                            {{ request('role') ?? 'Semua Role' }}
                            <x-icons.arrow-down class="stroke-dark-base size-5"></x-icons.arrow-down>
                        </button>
                    </div>

                    


                    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-[164px] origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                        style="display: none;">
                        <div class="py-1" role="none">
                            <a href="{{ route('admin.manage.admin', Arr::except(request()->query(), ['role'])) }}"
                                class="block px-4 py-3 text-md text-secondaryColors-base bg-secondaryColors-10 hover:bg-gray-50 hover:text-gray-800 active"
                                role="menuitem" tabindex="-1" id="menu-item-0">Semua Role</a>
                            <a href="{{ route('admin.manage.admin', array_merge(request()->query(), ['role' => 'Event Admin'])) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-2">Event Admin</a>
                            <a href="{{ route('admin.manage.admin', array_merge(request()->query(), ['role' => 'Product Admin'])) }}"
                                class="block px-4 py-3 text-md text-gray-700 hover:bg-gray-50 hover:text-gray-800"
                                role="menuitem" tabindex="-1" id="menu-item-3">Product Admin</a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('admin.manage.add-admin') }}"
                    class="inline-flex px-4 py-2 text-md font-semibold rounded-md border border-gray-200 bg-secondaryColors-base text-white hover:bg-secondaryColors-60 transition-all">Tambah
                    Data</a>
            </div>

        </div>
    </div>

    <div class="overflow-x-auto w-full">
        <table class="w-full bg-white text-left min-w-[700px]">
            <thead class="text-sm uppercase bg-gray-50">
                <tr>
                    <th class="py-4 px-2 w-12 h-12 text-center">#</th>
                    <th class="py-4 px-2">ID Admin</th>
                    <th class="py-4 px-2">Tanggal bergabung</th>
                    <th class="py-4 px-2">Nama Admin</th>
                    <th class="py-4 px-2 text-start">No. Phone</th>
                    <th class="py-4 px-2 text-center">Admin role</th>
                    <th class="text-center p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($admins as $index => $admin)
                    <tr class="border-b border-gray-200">
                        <td class="text-center">{{ $admins->firstItem() + $index }}</td>
                        <td class="py-4 px-2">{{ '#ADM' . str_pad($admin->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="py-4 px-2">{{ $admin->created_at->format('d/m/y - H:i') }}</td>
                        <td class="py-4 px-2">{{ $admin->username }}</td>
                        <td class="py-4 px-2 text-start">{{ $admin->user_phone }}</td>
                        <td class="py-4 px-2 text-center">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $admin->user_role === 'M' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $admin->user_role === 'M' ? 'Event Admin' : 'Product Admin' }}
                            </span>
                        <td class="py-4 px-2 text-center align-middle">
                            <div class="flex items-center justify-center gap-2">
                                {{-- Tombol Edit / Lihat --}}
                                <a href="{{ route('admin.manage.edit-admin', $admin->id) }}"
                                    class="bg-secondaryColors-10 flex items-center justify-center w-8 h-8 rounded-md hover:bg-secondaryColors-20">
                                    <x-icons.eye-01 class="size-5 stroke-secondaryColors-base" />
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('admin.manage.delete-admin', $admin->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this admin?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-100 flex items-center justify-center w-8 h-8 rounded-md hover:bg-red-200">
                                        <x-icons.delete-01 class="size-5 stroke-red-600" />
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center gap-4">
                                <x-icons.user-group class="w-12 h-12 stroke-gray-300" />
                                @if(request()->has('searchBox') || request()->has('role'))
                                    <p class="text-lg font-medium">Tidak ada admin yang sesuai dengan filter.</p>
                                @else
                                    <p class="text-lg font-medium">Belum ada data admin.</p>
                                @endif
                                <p class="text-sm text-gray-400">Klik tombol "Tambah Data" untuk menambahkan admin pertama.</p>
                            </div>
                        </td>
                    </tr>

                @endforelse

            </tbody>
        </table>


    <div class="p-6 bg-white w-full rounded-b-lg flex flex-col md:flex-row items-center justify-between gap-4">
        <span class="text-sm text-gray-600">
            Menampilkan {{ $admins->firstItem() }} sampai {{ $admins->lastItem() }} dari total {{ $admins->total() }} data
        </span>

        <div class="flex justify-center md:justify-end w-full md:w-auto">
            {{ $admins->withQueryString()->links() }}
        </div>
    </div>

</x-layouts.admin.admin-layout>
