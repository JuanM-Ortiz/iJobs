<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

    @if (count($vacants) > 0)

        @foreach ($vacants as $vacant)
            <div class="p-6 bg-white border-b border-gray-200 text-black md:flex md:justify-between md:items-center">
                <div class="space-y-3"> 

                    <a href="" class="text-xl font-bold ">
                        {{ $vacant->title }}
                    </a>

                    <p class="text-sm text-gray-600 font-bold">
                        {{ $vacant->company }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Ultimo dia: {{ $vacant->lastDay->format('d/m/Y') }}
                    </p>

                    <div class="flex flex-col md:flex-row items-stretch gap-3">

                        <a href="" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Postularse
                        </a>

                        <a href="{{ route('vacants.edit', $vacant->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Editar
                        </a>

                        <a href="" class="bg-red-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                            Eliminar
                        </a>

                    </div>

                </div>
            </div>
        @endforeach

    @else

        <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>

    @endif

</div>

<div class="mt-10">
    {{ $vacants->links() }}
</div>