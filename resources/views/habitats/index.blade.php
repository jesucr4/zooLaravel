<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Nuestros habitats') }}
        </h2>
    </x-slot>
    @section('content')

        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Hábitat</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            @foreach($habitat as $habi)
                <tr>
                    <td></td>
                    <td scope="row">{{$habi->descripcion}}</td>
                    <td><a href="{{url('habitat/'.$habi->id)}}" class="btn btn-primary">Animales</a> </td>
                    @if(Auth::user() && @Auth::user()->hasRole('admin'))
                        <td><a href="{{url('habitat/'.$habi->id.'/edit')}}" class="btn btn-warning">Editar</a> </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(Auth::user())
            <a href="{{url('habitat/create')}}" class="btn btn-primary">Crear nuevo hábitat</a>
        @endif

    @endsection
</x-app-layout>
