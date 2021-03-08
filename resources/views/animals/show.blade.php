<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Detalle del animal') }}
        </h2>
    </x-slot>

    @section('content')
        <h1>{{$animal->nombre}}</h1>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="{{asset($url.$animal->imagen)}}" class="rounded float-left mr-1" width="450px" >
            <div class="card-body">
                <h4 class="card-title"> {{$animal->edad}} años</h4>
                <p class="card-text">Vive en {{$habitat->descripcion}}, es un animal {{$kind->descripcion}} y es de color {{$animal->color}}</p>
            </div>
        <div class="row">
            @if(Auth::user())
            <a href="{{url('animal/'.$animal->id.'/edit')}}" class="btn btn-warning ml-4">Editar</a>
            <form action="{{url('animal/'.$animal->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ml-2" name="borrar">Borrar</button>
            </form>
            @endif
                <a href="{{route('animal.index') }}" class="btn btn-success
                @if(Auth::user()) ml-2
                @else ml-4
                @endif
">Volver</a>
        </div>
        </div>


    @endsection
</x-app-layout>
