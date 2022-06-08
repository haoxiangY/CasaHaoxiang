@extends("layouts.app")

@section("content")
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5">{{ __("Listado de casas") }}</h1>
            <a href="{{ route('casas.create') }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                {{ __("Crear casa") }}
            </a>
        </div>
    </div>

    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
        <tr>
        <th class="px-4 py-2">{{ __("Nombre de la Casa") }}</th>
        <th class="px-4 py-2">{{ __("Propiedario") }}</th>
            <th class="px-4 py-2">{{ __("Precio") }}</th>
            <th class="px-4 py-2">{{ __("Espacio") }}</th>
            <th class="px-4 py-2">{{ __("Imagen") }}</th>
            <th class="px-4 py-2">{{ __("Descripción") }}</th>
            <th class="px-4 py-2">{{ __("Fecha") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($casas as $casa)
                <tr>
                    <td class="border px-4 py-2">{{ $casa->nombre }}</td>
                    <td class="border px-4 py-2">{{ $casa->user->name }}</td>
                    <td class="border px-4 py-2">{{ $casa->precio }}</td>
                    <td class="border px-4 py-2">{{ $casa->espacio }}</td>
                    <td class="border px-4 py-2 img-fluid">
                       <img src="{{ $casa->imagen }}" width="20%"> </td>
                    <td class="border px-4 py-2">{{ $casa->description }}</td>
                    <td class="border px-4 py-2">{{ date_format($casa->created_at, "d/m/Y") }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('casas.edit', ['casa' => $casa]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-casa-{{ $casa->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-casa-{{ $casa->id }}-form" action="{{ route('casas.destroy', ['casa' => $casa]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ __("No hay casas") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
 
  @if($casas->count(10))
        <div class="mt-3">
            {{ $casas->links() }}
           
        </div>
    @endif

@endsection
