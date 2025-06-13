<x-layouts.admin.admin-layout>

    <x-slot:title> {{ $title }}</x-slot:title>

    <div class="flex flex-col items-center bg-gray-100 min-h-screen py-2 w-full">
        <div class="w-full bg-white rounded-lg shadow p-8">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold">Add New Product</h1>
                    <p class="text-base text-gray-500">Add a new product to youre store</p>
                </div>
                <div class="text-xs text-gray-400">
                    Dashboard / Kelola Product / <span class="text-[#007F73] font-semibold">Add Product</span>
                </div>
            </div>

            {{-- Add Product Form --}}
            <form>
                <div class="flex flex-col md:flex-row gap-4">
                    {{-- Left Column --}}
                    <div class="flex-1 space-y-6">
                        {{-- Name and Description Section --}}
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold mb-4">Name and Description</h2>
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1">Product Name</label>
                                <input type="text" class="w-full border rounded px-4 py-2 text-sm" placeholder="Premium Half Sleeve T-Shirt - Brooklyn Fleece">
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1">Product Description</label>
                                <textarea class="w-full border rounded px-4 py-2 text-sm" rows="4" placeholder="Looking for a little extra warmth? Grab this classic hoodie smooth on the outside with unbrushed loops on the inside, our mid weight French terry is comfortable enough to wear year long."></textarea>
                            </div>
                        </div>

                        {{-- Category Section --}}
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold mb-4">Category</h2>
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1">Product Category</label>
                                <select class="w-full border rounded px-4 py-2 text-sm">
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                    <option>Category 3</option>
                                </select>
                            </div>
                        </div>

                        {{-- Manage Stock Section --}}
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold mb-4">Manage Stock</h2>
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1">Stock Keeping Unit</label>
                                <input type="text" class="w-full border rounded px-4 py-2 text-sm" placeholder="SKU-BB-66-A8">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Product Stock</label>
                                    <input type="number" class="w-full border rounded px-4 py-2 text-sm" placeholder="10,120">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Minimum Stock</label>
                                    <input type="number" class="w-full border rounded px-4 py-2 text-sm" placeholder="100">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column --}}
                    <div class="flex-1 space-y-6">
                        {{-- Product Pricing Section --}}
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold mb-4">Product Pricing</h2>
                            <div class="mb-4">
                                <label class="block text-sm font-medium mb-1">Price</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">Rp</span>
                                    <input type="text" class="w-full border rounded pl-8 pr-4 py-2 text-sm" placeholder="100.000">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Minimum Order</label>
                                <div class="flex gap-4">
                                    <input type="number" class="w-2/3 border rounded px-4 py-2 text-sm" placeholder="100">
                                    <select class="w-1/3 border rounded px-4 py-2 text-sm">
                                        <option>Pcs</option>
                                        <option>Kilogram</option>
                                        <option>Gram</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Product Image Section --}}
                        <div class="bg-white rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold mb-4">Product Image</h2>
                            <div class="flex items-center space-x-4">
                                <div class="w-32 h-32 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center text-gray-500 text-sm cursor-pointer" onclick="document.getElementById('productImageInput').click();">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Click to Upload</span>
                                    <input type="file" id="productImageInput" class="hidden" accept="image/*" multiple>
                                </div>
                                {{-- Placeholder for uploaded images --}}
                                <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                </div>
                                <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 pt-4 border-t mt-6">
                    <button type="button" class="px-4 py-2 rounded border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-100">Cancel</button>
                    <button type="submit" class="px-4 py-2 rounded bg-[#007F73] text-white text-sm font-medium hover:bg-[#005f57] flex items-center gap-1">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin.admin-layout>
