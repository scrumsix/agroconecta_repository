@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    {{-- Campo Nombre --}}
    <div class="md:col-span-2">
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required>
    </div>

    {{-- Campo Descripción --}}
    <div class="md:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700">Descripción (opcional)</label>
        <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">{{ old('description', $product->description) }}</textarea>
    </div>

    {{-- Campo Precio --}}
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
        <div class="relative mt-1 rounded-md shadow-sm">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <span class="text-gray-500 sm:text-sm">$</span>
            </div>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-green-500 focus:ring-green-500" required placeholder="0.00">
        </div>
    </div>

    {{-- Campo Unidad de Venta --}}
    <div>
        <label for="unit" class="block text-sm font-medium text-gray-700">Vendido por</label>
        <select name="unit" id="unit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required>
            <option value="Kg" @if(old('unit', $product->unit) == 'Kg') selected @endif>Kilo (Kg)</option>
            <option value="Libra" @if(old('unit', $product->unit) == 'Libra') selected @endif>Libra</option>
            <option value="Paquete" @if(old('unit', $product->unit) == 'Paquete') selected @endif>Paquete</option>
            <option value="Unidad" @if(old('unit', $product->unit) == 'Unidad') selected @endif>Unidad</option>
        </select>
    </div>

    {{-- Campo Stock --}}
    <div>
        <label for="stock" class="block text-sm font-medium text-gray-700">Stock (unidades)</label>
        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required placeholder="0">
    </div>

    {{-- Campo para subir la Imagen (Con Vista Previa y "Arrastrar y Soltar") --}}
    <div class="md:col-span-2"
         x-data="{photoName: null, photoPreview: '{{ $product->image ? asset('storage/' . $product->image) : null }}'}">
        <label class="block text-sm font-medium text-gray-700">Imagen del Producto</label>
        <input type="file" name="image" id="image-upload" class="hidden"
               x-ref="photo"
               @change="
                       photoName = $refs.photo.files[0].name;
                       const reader = new FileReader();
                       reader.onload = (e) => {
                           photoPreview = e.target.result;
                       };
                       reader.readAsDataURL($refs.photo.files[0]);
               ">

        <div class="mt-2">
            <!-- Vista Previa de la Imagen -->
            <div x-show="photoPreview" class="relative">
                <span class="block w-full h-48 rounded-lg shadow-lg"
                      :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                </span>
                <button type="button" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow text-gray-500 hover:text-gray-700" @click.prevent="$refs.photo.click()" title="Cambiar imagen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.5L14.732 3.732z" /></svg>
                </button>
            </div>

            <!-- Área para Arrastrar y Soltar -->
            <div x-show="!photoPreview" @click="$refs.photo.click()" class="cursor-pointer flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6 hover:border-green-500 transition-colors">
                <div class="space-y-1 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600">
                        <span class="relative cursor-pointer rounded-md bg-white font-medium text-green-600 hover:text-green-500">
                            <span>Sube un archivo</span>
                        </span>
                        <p class="pl-1">o arrástralo aquí</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, JPEG hasta 2MB</p>
                </div>
            </div>
        </div>
    </div>
</div>

