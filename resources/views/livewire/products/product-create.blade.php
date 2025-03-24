<section>
    <div class="mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a New Product</h2>
        <form wire:submit="productSave" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <!-- Product Name -->
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Product Name <span class="text-xs text-red-600">*</span>
                    </label>
                    <input type="text" name="name" id="name" wire:model="form.name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Type product name" required>
                    @error('form.name')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Brand -->
                <div>
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Brand
                    </label>
                    <input type="text" name="brand" id="brand" wire:model="form.brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Product brand">
                    @error('form.brand')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Return Policy -->
                <div>
                    <label for="return-policy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Return Policy <span class="text-xs text-gray-600">(Optional)</span>
                    </label>
                    <input type="text" name="return-policy" id="return-policy" wire:model="form.returnPolicy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="E.g. 30 Days, 14 Days">
                    @error('form.returnPolicy')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Price <span class="text-xs text-red-500">*</span>
                    </label>
                    <input type="text" name="price" id="price" wire:model="form.price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="E.g. 10, 200, 122.50" required>
                    @error('form.price')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Product Category
                    </label>
                    <input type="text" name="category" id="category" wire:model="form.category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ex. Fashion, Electronics, Phones">
                    @error('form.category')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock Quantity -->
                <div>
                    <label for="stock-quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Stock Quantity <span class="text-xs text-gray-600">(Optional)</span>
                    </label>
                    <input type="number" name="stock-quantity" id="stock-quantity" wire:model="form.stockQuantity"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Products in stock, e.g. 12">
                    @error('form.stockQuantity')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Shipped From -->
                <div>
                    <label for="shipped-from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Shipped From <span class="text-xs text-gray-600">(Optional)</span>
                    </label>
                    <input type="text" name="shipped-from" id="shipped-from" wire:model="form.shippedFrom"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ex. Nairobi, Abroad, China">
                    @error('form.shippedFrom')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Color -->
                <div>
                    <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Color <span class="text-xs text-gray-600">(Optional)</span>
                    </label>
                    <input type="text" name="color" id="color" wire:model="form.color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ex. Red, Blue, Green">
                    @error('form.color')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Gender <span class="text-xs text-gray-600">(Optional)</span>
                    </label>

                    <select name="gender" id="gender" wire:model="form.gender"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unisex">Unisex</option>
                    </select>

                    @error('form.gender')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Size -->
                <div>
                    <label for="size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Size <span class="text-xs text-gray-600">(Optional)</span>
                    </label>
                    <input type="text" name="size" id="size" wire:model="form.size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Ex. S, M, L, XL">
                    @error('form.size')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Main Product Image -->
                <div class="sm:col-span-2">
                    <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Upload 1 Main Product Image <span class="text-xs text-gray-600">(Optional)</span>
                    </label>
                    <input id="file_input" type="file" wire:model="productImage"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                    <p class="mt-1 text-xs text-slate-500">(You can upload additional images after the product is
                        added.)</p>
                    @error('productImage')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Description <span class="text-xs text-red-500">*</span>
                    </label>
                    <textarea id="description" rows="8" wire:model="form.description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Your description here"></textarea>
                    @error('form.description')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 text-sm font-medium text-white bg-orange-700 rounded-lg hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-orange-500">
                Add Product
            </button>
        </form>
    </div>
</section>
