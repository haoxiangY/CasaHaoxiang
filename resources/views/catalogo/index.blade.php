@extends("layouts.app")

@section("content")
<div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
            <h1 class="mb-5 text-5xl">{{ __("Catalogo de casas") }}</h1>
        </div>
    </div>
   <div class="flex justify-center  flex-wrap mt-16 mx-4">
     
   @foreach ($casas as $casa)
   <div class="w-4/12 p-4">
    <img  class="w-full" src="{{$casa->imagen}}">
      <p>EL precio de la casa es de {{$casa->precio}} €</p>
    </div>
    @endforeach
    </div>
@endsection