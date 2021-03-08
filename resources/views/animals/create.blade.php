
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Añade tu animal favorito del zoo') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('animal.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" id="nombre" placeholder="nombre">
                @error('nombre')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input type="text" name="color" class="form-control" value="{{old('color')}}" id="color" placeholder="color">
                @error('color')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">

                <label for="edad">Edad</label>
                <input type="number" name="edad" class="form-control" value="{{old('edad')}}" id="edad" placeholder="Edad del animal">
                @error('edad')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">

                <label for="tipo">Tipo animal</label>
                <select class="form-control" id="kind" name="kind[]" >
                    @foreach($kinds as $kind)
                        <option value="{{$kind->id}}">{{$kind->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">

                <label for="habitat">Habitat del animal</label>
                <select class="form-control" id="habitat" name="habitat[]" >
                    @foreach($habitats as $habitat)
                        <option value="{{$habitat->id}}">{{$habitat->descripcion}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">

                <label for="imagen">Foto del animal</label><br>
                <input type="file" name="imagen" class="form-control" id="imagen" placeholder="imagen">
                @error('imagen')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>

            <button type="submit" CLASS="btn btn-primary">Insertar</button>
        </form>
    @endsection
</x-app-layout>