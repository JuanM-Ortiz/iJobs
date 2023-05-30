<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='createVacant'>
    <div>

        <x-input-label for="title" :value="__('Titulo Vacante')" />

        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')" placeholder="Titulo Vacante"/>
        
        @error('title')
            <p class="border border-red-400 font-bold text-red-700 text-xs uppercase bg-red-200 text-center mt-2">Este campo es obligatorio</p>
        @enderror

    </div>

    <div>

        <x-input-label for="salary" :value="__('Salario Mensual')" />

        <select 
            wire:model="salary" 
            id="salary" 
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 
            dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 
            dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
                
            <option value="">-- Selecciona un sueldo --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach

        </select>
        
        @error('salary')
            <p class="border border-red-400 text-red-700 text-xs uppercase bg-red-200 text-center mt-2">Debe seleccionar un sueldo</p>
        @enderror

    </div>

    <div>

        <x-input-label for="category" :value="__('Category')" />

        <select 
            wire:model="category" 
            id="category" 
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 
            dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 
            focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
                
            <option value="">-- Selecciona una categoria --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach

        </select>
        
        @error('category')
            <p class="border border-red-400 text-red-700 text-xs uppercase bg-red-200 text-center mt-2">Debe seleccionar una categoria</p>
        @enderror

    </div>

    <div>

        <x-input-label for="company" :value="__('Empresa')" />

        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" placeholder="Empresa: ej. Netflix, Spotify, etc.."/>
        
        @error('company')
            <p class="border border-red-400 text-red-700 text-xs uppercase bg-red-200 text-center mt-2">Este campo es obligatorio</p>
        @enderror

    </div>

    <div>

        <x-input-label for="lastDay" :value="__('Ultimo Dia Para Postularse')" />

        <x-text-input id="lastDay" class="block mt-1 w-full" type="date" wire:model="lastDay" :value="old('lastDay')" />
        
        @error('lastDay')
            <p class="border border-red-400 text-red-700 text-xs uppercase bg-red-200 text-center mt-2">Este campo es obligatorio</p>
        @enderror

    </div>

    <div>

        <x-input-label for="description" :value="__('Descripcion del Puesto')" />

        <textarea 
            wire:model="description" 
            id="description" 
            placeholder="Descripcion sobre el puesto de trabajo, experiencia, etc.."
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500
            dark:focus:ring-indigo-600 rounded-md shadow-sm h-72"
        ></textarea>
        
        @error('description')
            <p class="border border-red-400 text-red-700 text-xs uppercase bg-red-200 text-center mt-2">Este campo es obligatorio</p>
        @enderror

    </div>

    <div>

        <x-input-label for="image" :value="__('Imagen')" />

        <x-text-input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/jpg, image/png, image/gif" />

        <div class="my-5 w-80">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}">
            @endif
        </div>
        
        <x-input-error :messages="$errors->get('image')" class="mt-2" />

    </div>

    <x-primary-button>
        Crear Vacante
    </x-primary-button>
</form>
