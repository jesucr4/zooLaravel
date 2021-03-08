<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
            {{ __('Edite su perfil') }}
        </h2>
    </x-slot>

    @section('content')
        <form action="{{url('usuario/'.$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" value="{{$user->email}}" name="email"  class="form-control" id="email" disabled >

            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="{{$user->nombre}}" name="nombre" value="{{old('nombre')}}" class="form-control" id="nombre" placeholder="nombre">
                @error('nombre')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" value="{{$user->apellidos}}" name="apellidos" value="{{old('apellidos')}}" class="form-control" id="apellidos" placeholder="apellidos">
                @error('apellidos')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" value="{{$user->dni}}" name="dni"  class="form-control" id="dni" disabled >
            </div>
            <div class="form-group">
                <label for="dirección">Dirección</label>
                <input type="text" value="{{$user->direccion}}" name="direccion" value="{{old('direccion')}}" class="form-control" id="direccion" placeholder="direccion">
                @error('direccion')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="dirección">Teléfono</label>
                <input type="text" value="{{$user->telefono}}" name="telefono" value="{{old('telefono')}}" class="form-control" id="telefono" placeholder="telefono">
                @error('telefono')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" value="{{$user->password}}" name="password"  class="form-control" id="password" placeholder="password">
                @error('password')
                <div class="alert alert-danger">{{ $message}}</div>
                @enderror
            </div>


            <button type="submit" CLASS="btn btn-primary">Editar</button>
        </form>
    @endsection
</x-app-layout>


