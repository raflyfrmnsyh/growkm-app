<header
    class=" desktop_header fixed w-[80%] hidden px-8 py-3 border-b-[1px] border-gray-300 bg-white lg:flex gap-4 justify-end items-center h-[80px] z-50">

    <div class="profile-menu flex items-center gap-2 cursor-pointer" @click="isOpen = !isOpen">
        <div class="profile-img w-[44px] h-[44px] rounded-[4px] bg-gray-300 overflow-hidden">
            <img src="{{ asset('image/dummy-profile.png') }}" alt="profile" class="w-full h-full object-cover">
        </div>
        <div class="profile-name">
            <div class="flex items-center gap-1">
                <h5 class="_name font-medium">{{ Auth::user()->user_name }}</h5>
                <x-icons.verify-icon></x-icons.verify-icon>
            </div>
            <span class="text-sm text-gray-600">Basic Member</span>
        </div>
    </div>
</header>
