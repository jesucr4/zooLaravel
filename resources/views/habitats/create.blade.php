<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Añade habitat') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{route('habitat.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="descripcion">Habitat del animal</label>
                <input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" id="descripcion" placeholder="Hábitat">
                @error('descripcion')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <button type="submit" CLASS="btn btn-primary">Insertar</button>
        </form>
    @endsection
</x-app-layout>