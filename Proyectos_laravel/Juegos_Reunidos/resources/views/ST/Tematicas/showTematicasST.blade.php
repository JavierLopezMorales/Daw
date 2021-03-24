@extends('layouts.masterST')
<link rel="stylesheet" href="{{ asset('css/cssST/CSS.css') }}" />
@section('Titulo', 'Tabla de Tematicas')

@section('sidebar')


@endsection
<!--Vista de tematicas -->
@section('content')
<div class="container2">
    <table border="3px solid black">
      <thead>

        <tr>
            <!--<th>Tipo</th> -->
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen de fondo</th>
            <th>Imagen de puzzle</th>

            <th colspan="2"><a href="{{route('TematicasST.create')}}"><input type="button"class="button" value="Crear"></a></th>
        </tr>
      </thead>

        @foreach($tematicasList as $tematicas)
        <tbody>
        <tr>
            <!--<td>{{$tematicas -> type}}</td>-->
            <td>{{$tematicas -> name}}</td>
            <td>{{$tematicas -> description}}</td>
            <!--Coge las imagenes de servidor por su variable para mostrarlo en chiquitito -->
            <td><img src="images/imagesST/{{$tematicas -> img_fondo}}"width="150px"height="100px"></td>
            <td><img src="images/imagesST/{{$tematicas -> img_puzzle}}"width="150px"height="100px"></td>



            <td><a href="{{route('TematicasST.edit', $tematicas->id)}}"><input type="button"class="button" value="Modificar"></a></td>

            {{--
                Boton para borrar una tematica
                --}}

            <td>
                <form action = "{{route('TematicasST.destroy', $tematicas->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input class="button"type="submit" value="Borrar">
                </form>
            </td>

        </tr>
      </tbody>
        @endforeach

    </table>
  </div>
@endsection
