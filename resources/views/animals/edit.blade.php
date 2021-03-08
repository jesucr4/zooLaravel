
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Edita tu animal') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('animal/'.$animal->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="{{$animal->nombre}}" name="nombre" value="{{old('nombre')}}" class="form-control" id="nombre" placeholder="nombre">
                @error('nombre')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" value="{{$animal->color}}" name="color" value="{{old('color')}}" class="form-control" id="color" placeholder="color">
                @error('color')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="number" value="{{$animal->edad}}" name="edad" value="{{old('edad')}}" class="form-control" id="edad" placeholder="Edad del animal">
                @error('edad')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tipo">Tipo animal</label>
                <select class="form-control" id="kind" name="kind[]" >
                    @foreach($kinds as $kind)
                        <option value="{{$kind->id}}"
                        @if($kind->id == $animal->kind_id)
                            selected
                        @endif
                        >
                            {{$kind->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="habitat">Habitat del animal</label>
                <select class="form-control" id="habitat" name="habitat[]" >
                    @foreach($habitats as $habitat)
                        <option value="{{$habitat->id}}"
                                @if($habitat->id == $animal->habitad_id)
                                selected
                                @endif
                        >{{$habitat->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="imagen">Foto del animal</label><br>
                <img src="{{asset($url.$animal->imagen)}}" class="rounded float-left" width="250px">
                <input type="file" name="imagen" class="form-control" id="imagen" placeholder="imagen">
                @error('nombre')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <button type="submit" CLASS="btn btn-primary">Editar</button>
        </form>
    @endsection
</x-app-layout>
