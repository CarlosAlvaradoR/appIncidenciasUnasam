<div>

    <livewire:buscar-equipo />
    @if (session()->has('mensaje'))
    <p class="text-red-600">{{session('mensaje')}}</p>
    @endif
    @if ($equipo)
    <div class="mt-5">
        {{-- @forelse ($equipos as $equipo) --}}

        <div class="bg-gray-100 border rounded-lg p-4   md:flex md:justify-between ">
            <div>
                <h2 class="font-bold text-xl">Equipo: <span class="font-normal">{{$equipo->nombre_equipo . ' ' .
                        $equipo->marca}}</span></h2>
                <p class="text-gray-500 text-sm">{{$equipo->descripcion}}</p>
            </div>
            <div class="md:mt-0 mt-3">
                <a class="flex items-center border rounded-lg  bg-blue-700 hover:bg-blue-800 transition-colors text-white text-sm  p-2 cursor-pointer  w-full md:w-auto"
                    href="{{route('equipo.create.incidentes',$equipo)}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Nuevo Incidente</a>
            </div>
        </div>

        <div class="bg-gray-100 border rounded-lg p-4 mt-2 ">
            <h2 class="font-bold text-xl">Historial</h2>
            <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
            @forelse ($equipo->incidentes as $incidente)
            <div class="mt-5 md:flex md:justify-between ">
                <div>

                    <a href="{{route('show.incidente', $incidente)}}"
                        class="font-bold text-lg ">{{$incidente->titulo}}</a>
                    <p class="text-gray-500 text-sm">{{$incidente->descripcion}}</p>
                    <span
                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                        <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        {{$incidente->created_at->diffForHumans()}}
                    </span>
                    <span
                        class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">{{$incidente->importancia->importancia}}
                    </span>
                </div>
                <div>
                    @if ( $incidente->estado === 2)
                    <a href="{{route('salida.index',$incidente )}}"
                        class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900 cursor-pointer">
                        Sin solucionar</a>
                    @else
                    <p
                        class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                        Solucionado</p>
                    @endif

                </div>

            </div>

            @forelse ($incidente->solucion as $solucion)
            <div class="mt-2 p-3 bg-green-200 border rounded-lg">
                <p><span class="font-bold text-green-800">Solucion: </span> {{$solucion->descripcion}}</p>
            </div>
            @empty
            <div class="mt-2 p-3 bg-orange-400 border rounded-lg">
                <p class="text-white">Este incidente no tiene solucion</p>
            </div>
            @endforelse


            <hr class="my-8 h-px bg-gray-200 border-0 dark:bg-gray-700">

            @empty
            <p class="text-gray-600">El equipo no tiene incidentes aún</p>
            @endforelse
        </div>


        {{-- @empty --}}

        {{-- @endforelse --}}
    </div>

    @else
    <p class="text-gray-500 mt-4">¿No encuentras el equipo?
        <a href="{{route('create.equipo')}}" class="text-blue-600 cursor-pointer underline">Crea uno
            nuevo aqui</a>
    </p>
    @endif

</div>