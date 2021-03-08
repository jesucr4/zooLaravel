<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="row">
        @foreach($users as $user)

                <div class="col-sm-5">
                    <h1>{{$user->nombre}}</h1>
                    <div class="card" style="height: 200px" >
                        <div class="card-body">
                            <h4 class="card-title">Email:<br> {{$user->email}} </h4>
                            <p class="card-text">Teléfono: {{$user->telefono}}</p>
                        </div>
                        <div class="row">
                            @if(Auth::user())
                                <a href="{{url('usuario/'.$user->id.'/edit')}}" class="btn btn-warning ml-4">Editar</a>
                                <form action="{{url('usuario/'.$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger ml-2" name="borrar">Borrar</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>


        @endforeach
        </div>

    @endsection
</x-app-layout>