<div class="p-10">
    <div class="mb-5">

        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacant->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-100 rounded p-4">

            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: 
                <span class="normal-case font-normal">{{ $vacant->company }}</span>  
            </p>
    
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Ultimo dia para postularse: 
                <span class="normal-case font-normal">{{ $vacant->lastDay->toFormattedDateString() }}</span>  
            </p>
    
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Categoria: 
                <span class="normal-case font-normal">{{ $vacant->category->category }}</span>  
            </p>
    
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salario: 
                <span class="normal-case font-normal">{{ $vacant->salary->salary }}</span>  
            </p>
    
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">

        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacants/' . $vacant->image) }}" alt="{{ 'Vacant Image' . $vacant->title }}">
        </div>

        <div class="md:col-span-4">

            <h2 class="text-2xl font-bold mb-5">
                Descripcion del puesto
            </h2>

            <p>
                {{ $vacant->description }}
            </p>

        </div>

    </div>

    @guest
        <div class="mt-5 bg-gray-300 border border-dashed p-5 text-center">
            <p>
                ¿Deseas postularte a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Registrate para aplicar a esta u otras vacantes</a>
            </p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacant::class)
        <livewire:postulate-vacant /> 
    @endcannot
    
</div>
