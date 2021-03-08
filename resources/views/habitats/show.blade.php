<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Bienvenido a: ' . $habitat->descripcion  )}}
        </h2>
    </x-slot>
    @section('content')
        @if(count($animal)==0)
            <div class="alert alert-warning">No hay ningún animal en este habitat. <a href="{{route('habitat.index')}}"><span> Ir a habitats</span></a> </div>
           @else
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Color</th>
                <th scope="col">Edad</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($animal as $ani)
                <tr>
                    <td><img src="{{asset($url.$ani->imagen)}}" height="100px" width="150px"></td>
                    <td scope="row">{{$ani->nombre}}</td>
                    <td scope="row">{{$ani->color}}</td>
                    <td scope="row">{{$ani->edad}} años</td>
                    <td><a href="{{url('animal/'.$ani->id)}}" class="btn btn-primary">Detalle</a> </td>
                    @if(Auth::user())
                        <td><a href="{{url('animal/'.$ani->id.'/edit')}}" class="btn btn-warning">Editar</a> </td>
                        <td>
                            <form action="{{url('animal/'.$ani->id)}}" method="POST">
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
        @endif
    @endsection
</x-app-layout>
