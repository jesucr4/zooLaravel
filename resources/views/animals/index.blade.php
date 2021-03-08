<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Está usted en la entrada de nuestro zoológico') }}
        </h2>
    </x-slot>
    @section('content')

        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Color</th>
                <th scope="col">Edad</th>
                <th scope="col">Tipo</th>
                <th scope="col">Hábitat</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($animals as $animal)
                <tr>
                    <td><img src="{{asset($url.$animal->imagen)}}" height="100px" width="150px"></td>
                    <td scope="row">{{$animal->nombre}}</td>
                    <td scope="row">{{$animal->color}}</td>
                    <td scope="row">{{$animal->edad}} años</td>
                    <td scope="row">
                        @foreach($kinds as $kind)
                        @if($animal->kind_id == $kind->id )
                            {{$kind->descripcion}}</td>
                        @endif
                        @endforeach
                    <td scope="row">
                        @foreach($habitats as $habitat)
                            @if($animal->habitad_id == $habitat->id)
                                {{$habitat->descripcion}}
                            @endif
                        @endforeach
                        </td>
                    <td><a href="{{url('animal/'.$animal->id)}}" class="btn btn-primary">Detalle</a> </td>
                    @if(Auth::user())
                    <td><a href="{{url('animal/'.$animal->id.'/edit')}}" class="btn btn-warning">Editar</a> </td>
                    <td>
                        <form action="{{url('animal/'.$animal->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" name="borrar">Borrar</button>
                        </form>
                    </td>
                     @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(Auth::user())
        <a href="{{url('animal/create')}}" class="btn btn-primary">Añadir animal</a>
        @endif
    @endsection
</x-app-layout>