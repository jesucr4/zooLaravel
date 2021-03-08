<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Edita habitat') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('habitat/'.$habitat->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="descripcion">Habitat del animal</label>
                <input type="text" value="{{$habitat->descripcion}}" name="descripcion" class="form-control" id="descripcion" placeholder="Hábitat">
                @error('descripcion')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <button type="submit" CLASS="btn btn-primary">Editar</button>
        </form>
    @endsection
</x-app-layout>