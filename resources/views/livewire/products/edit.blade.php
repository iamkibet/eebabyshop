<div x-data="{ showUpdateForm: false }" class="grid lg:grid-cols-2 text-slate-800 dark:text-slate-200">
    <div class="mb-10 lg:mb-0 p-3">
        <x-primary-button @click="showUpdateForm=!showUpdateForm" class="hidden lg:block">Edit This
            Product</x-primary-button>
        <!--title-->
        <h2 class="py-2 lg:mt-5 text-xl text-gray-800 font-semibold xl:text-3xl dark:text-neutral-200">
            {{ $product->name }}
        </h2>

        <div class="py-2 mt-3 grid md:grid-cols-2 gap-2 items-center">
            <div class="lg:mt-2 flex-shrink-0">
                <img class="w-full h-auto rounded-xl" src="/storage/{{ $product->image }}"
                    alt="{{ $product->name }} image">
            </div>

            <!--price-->
            <div class="my-3 md:pl-3">
                <p class="py-2 text-gray-900 dark:text-white">
                    <span class="line-through text-sm text-slate-600 dark:text-slate-400">
                        {{ config('app.currency_symbol') }} {{ number_format($product->price * 1.29, 2) }} </span>
                </p>
                <p
                    class="text-lg md:text-xl lg:text-2xl font-medium leading-tight text-orange-600 dark:text-orange-500">
                    {{ config('app.currency_symbol') . ' ' . number_format($product->price, 2) }} </p>

                <div class="mt-4 py-3 sm:items-center md:gap-4 md:flex">
                    <div class="flex items-center gap-2 mt-2 sm:mt-0">
                        <div class="flex items-center gap-1">
                            @for ($rt = 1; $rt <= $product->productRatings()->average('rating') + 0.5; $rt++)
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                            @endfor
                        </div>

                        <p class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">
                            ({{ number_format($product->productRatings()->average('rating'), 1) }})
                        </p>

                        <a href="#reviews"
                            class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white">
                            {{ $product->productReviews()->count() }} Reviews
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <!--properties-->
        <div class="py-2 space-y-2">
            <div class="py-2 grid md:grid-cols-2 gap-2 items-center">
                <p class="py-1">Brand: <span class="text-orange-700 dark:text-orange-300">{{ $product->brand }}</span>
                </p>
                <p class="py-1">Category: <span
                        class="text-orange-700 dark:text-orange-300">{{ $product->category }}</span> </p>
                <p class="py-1">Remaining items: <span
                        class="text-orange-700 dark:text-orange-300">{{ $product->stock_quantity }}</span> </p>
                <p class="py-1">Shipped from: <span
                        class="text-orange-700 dark:text-orange-300">{{ $product->shipped_from }}</span> </p>
                <p class="py-1">Return Policy: <span
                        class="text-orange-700 dark:text-orange-300">{{ $product->return_policy }}</span> </p>
            </div>

            <!--product features-->
            <h4 class="py-1 text-sm sm:text-lg font-semibold">
                Key Features
            </h4>

            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @foreach ($product->productFeatures as $ft)
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>{{ $ft->title }}</span>
                    </li>
                @endforeach
            </ul>

            <x-primary-button wire:click="$dispatch('open-modal', 'product-feature')">Add Feature</x-primary-button>
        </div>

        <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

        <p class="mb-6 text-gray-500 dark:text-gray-400">
            <span class="block font-bold">Product Description:</span>
            {{ $product->description }}
        </p>

        <div class="py-3 mb-4">
            <x-secondary-button wire:click="$dispatch('open-modal', 'upload-product-images')">Upload Extra
                Images</x-secondary-button>
        </div>

        <x-primary-button class="lg:hidden" wire:click="showUpdateForm=!showUpdateForm">Show Product Update
            Form</x-primary-button>
    </div>

    <div class="py-1 p-2">
        <form class="mt-3" x-show="showUpdateForm" wire:submit="productUpdate" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        Name <span class="text-xs text-red-600">*</label>
                    <input type="text" name="name" id="name" wire:model="form.name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type product name" required>
                    @error('form.name')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="brand"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <input type="text" name="brand" wire:model="form.brand" id="brand"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Product brand">
                    @error('form.brand')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="return-policy"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return Policy <span
                            class="text-xs text-gray-600">Optional</span></label>
                    <input type="text" name="return-policy" id="return-policy" wire:model="form.returnPolicy"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="E.g. 30 Days, 14 Days">
                    @error('form.returnPolicy')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price
                        <span class="text-xs text-red-500">*</label>
                    <input type="text" name="price" id="price" wire:model="form.price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="E.g. 10, 200, 122.50" required>
                    @error('form.price')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                        Category</label>
                    <input type="text" name="category" wire:model="form.category" id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Ex. Fashion, Fitness, Electronics, Phones...">
                    @error('form.category')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="stock-quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Stock Quantity - <span class="text-xs text-gray-600">Optional</span>
                    </label>
                    <input type="number" name="stock-quantity" id="stock-quantity" wire:model="form.stockQuantity"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Products in stock e.g. 12, 10">
                    @error('form.stockQuantity')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="shipped-from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Shipped From - <span class="text-xs text-gray-600">Optional</span>
                    </label>
                    <input type="text" name="shipped-from" id="shipped-from" wire:model="form.shippedFrom"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Shipping location e.g. Nairobi, Abroad, China">
                    @error('form.shippedFrom')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        for="file_input">Upload 1 main product Image <span
                            class="text-xs text-gray-600">Optional</span></label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="productImage" id="file_input" type="file">
                    <p class="text-xs text-slate-500">(You will upload more after the product is added.)</p>
                    @error('productImage')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span
                            class="text-xs text-red-500">*</span> </label>
                    <textarea id="description" rows="8" wire:model="form.description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your description here"></textarea>
                    @error('form.description')
                        <p class="text-red-600 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit"
                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800">
                Update product
            </button>
        </form>
    </div>

    <div class="py-2">
        <x-primary-button class="bg-red-600 dark:bg-red-500 text-slate-50"
            wire:click="deleteProduct({{ $product->id }})"
            wire:confirm="Are you sure you want to delete this product?">
            Delete This Product
        </x-primary-button>
    </div>

    <x-modal name="product-feature">
        <div class="p-5 py-10">
            <p class="font-semibold">Add A Product Feature</p>

            <p class="py-1">Product Name: <span
                    class="text-orange-700 dark:text-orange-300">{{ $product->name }}</span> </p>


            <h4 class="py-1 text-sm sm:text-lg font-semibold">
                Key Features
            </h4>

            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @foreach ($product->productFeatures as $ft)
                    <li class="flex items-center space-x-3 rtl:space-x-reverse">
                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                        </svg>
                        <span>{{ $ft->title }}</span>
                    </li>
                @endforeach
            </ul>

            <div class="max-w-sm mx-auto mt-6 p-3 rounded-lg bg-slate-50 dark:bg-slate-950">
                <div class="">
                    <div class="mb-5">
                        <label for="productFeatureTitle"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feature Title/Name
                            <span class="text-orange-400 dark:text-orange-600">(required)</span></label>
                        <input type="productFeatureTitle" id="productFeatureTitle" wire:model="productFeatureTitle"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Feature title..." required />
                    </div>
                    <label for="productFeatureDescription"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Feature Description <span
                            class="text-slate-400 dark:text-slate-600">(optional)</span> </label>
                    <textarea id="productFeatureDescription" rows="4" wire:model="productFeatureDescription"
                        class="block mb-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Describe the feature..."></textarea>

                    <x-primary-button wire:click="addProductFeature">Add Feature</x-primary-button>
                </div>
            </div>
        </div>
    </x-modal>

    <x-modal name="upload-product-images">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-neutral-200">
                    Upload Additional Images
                </h2>
                <button type="button" wire:click="$dispatch('close-modal', 'upload-product-images')"
                    class="w-6 h-6 text-gray-400 hover:text-gray-600 dark:hover:text-neutral-300">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                </button>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                {{-- Current Product Image --}}
                <div class="space-y-2">
                    <h3 class="text-md font-semibold">Current Main Image</h3>
                    <div class="rounded-xl overflow-hidden shadow-md">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover">
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        {{ $product->name }}
                    </p>
                </div>

                {{-- Additional Images --}}
                <div class="space-y-2">
                    <h3 class="text-md font-semibold">Additional Images</h3>
                    <div class="grid grid-cols-3 gap-2">
                        @forelse($product->productImages as $img)
                            <div class="relative group">
                                <img src="{{ Storage::url($img->image_location) }}" alt="{{ $img->title }}"
                                    class="w-full h-24 object-cover rounded-md">
                                <button wire:click="deleteProductImage({{ $img->id }})"
                                    wire:confirm="Are you sure you want to delete this image?"
                                    class="absolute inset-0 bg-red-500/50 text-white opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>


                                </button>
                            </div>
                        @empty
                            <p class="col-span-3 text-sm text-gray-500 text-center">
                                No additional images uploaded
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Image Upload Section --}}
            <div class="mt-6">
                <form wire:submit.prevent="uploadProductImages" class="space-y-4">
                    <div x-data="{ isDragging: false }" x-on:dragover.prevent="isDragging = true"
                        x-on:dragleave.prevent="isDragging = false" x-on:drop.prevent="isDragging = false"
                        class="relative">
                        <input type="file" wire:model="productImages" multiple
                            accept="image/png,image/jpeg,image/gif,image/svg"
                            class="absolute inset-0 z-50 opacity-0 cursor-pointer"
                            x-on:change="isProcessing = true" />

                        <div class="p-6 border-2 border-dashed rounded-lg text-center transition-colors duration-300"
                            :class="{
                                'border-blue-500 bg-blue-50': isDragging,
                                'border-gray-300 bg-gray-50': !isDragging
                            }">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>


                            <p class="mt-2 text-sm text-gray-600">
                                <span class="font-semibold">Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-gray-500">
                                SVG, PNG, JPG or GIF (MAX. 10MB)
                            </p>
                        </div>
                    </div>

                    @error('productImages.*')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    @if ($productImages)
                        <div class="mt-4">
                            <p class="text-sm text-gray-600">
                                {{ count($productImages) }} file(s) selected
                            </p>
                        </div>
                    @endif

                    <div class="flex justify-end">
                        <x-primary-button type="submit" :disabled="!$productImages">
                            Upload Images
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </x-modal>

    @script
        <script>
            Livewire.on('product-updated', () => {
                Swal.fire({
                    title: 'Success',
                    text: 'Product Updated',
                    icon: 'success'
                });
            });

            Livewire.on('feature-added', () => {
                Swal.fire({
                    title: 'Success',
                    text: 'Feature Added',
                    icon: 'success'
                });
            });

            Livewire.on('image-deleted', () => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Deleted!',
                    text: 'Image Deleted Permanently!'
                });
            });
        </script>
    @endscript
</div>
