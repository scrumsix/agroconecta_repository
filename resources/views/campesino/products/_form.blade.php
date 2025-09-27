@csrf

{{-- Campo Nombre --}}
<div class="mb-4">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

{{-- Campo Descripción --}}
<div class="mb-4">
    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción (opcional):</label>
    <textarea name="description" id="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">{{ old('description', $product->description) }}</textarea>
</div>

{{-- Campo Precio --}}
<div class="mb-4">
    <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

{{-- Campo Stock --}}
<div class="mb-4">
    <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">Stock (unidades):</label>
    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" required>
</div>

{{-- CAMPO PARA SUBIR LA IMAGEN --}}
<div class="mb-4">
    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen del Producto:</label>
    <input type="file" name="image" id="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
    @if ($product->image)
        <p class="mt-2 text-sm text-gray-600">Imagen actual:</p>
        <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" class="mt-2 h-32 w-auto rounded">
    @endif
</div>