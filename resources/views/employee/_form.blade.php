    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- First Name -->
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Primer Nombre</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $employee->first_name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required>
            @error('first_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Last Name -->
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Apellido</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $employee->last_name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required>
            @error('last_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Email -->
        <div class="md:col-span-2">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email', $employee->email ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required>
            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Job Title -->
        <div>
            <label for="job_title" class="block mb-2 text-sm font-medium text-gray-900">Cargo</label>
            <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $employee->job_title ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Desarrollador">
            @error('job_title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <!-- Salary -->
        <div>
            <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salario</label>
            <input type="number" id="salary" name="salary" step="0.01" value="{{ old('salary', $employee->salary ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="6000.00">
            @error('salary')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
    </div>
    
