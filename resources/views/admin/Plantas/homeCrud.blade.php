{{-- @extends('layouts.sidebar')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Huerto - Admin</title>
    <link rel="icon" href="{{ asset('images/logoEcoHuerto.png') }}" type="image/x-icon">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/Crud.css')}}">
    <link rel="stylesheet" href="{{ asset('css/modalForm.css')}}">
</head>
<body>
    @include('layouts.sidebar')
    <!----- Panel de administración ----->
    <div class="main-content">
        <div class="container">
            <h1>Panel de administración</h1>
            <!----- Aquí empieza el div de las tablas ----->
            <div class="table">
                <div class="table-header">
                    <Strong><p>Plantas</p></Strong>
                    <div>
                        {{-- @can('planta-create') --}}
                        <button class="add" onclick="window.location='{{route('admin.Plantas.plantaCreate')}}'"
                        data-toggle="modal" data-target="#ModalCreate"><i class='bx bx-plus-medical'></i>Agregar planta</button>
                        {{-- @endcan --}}
                        <input class="Inp" type="search" placeholder="Buscar">
                    </div>
                    <!----- Aquí empieza la tabla general ----->
                    <div class="table-body">
                        <table>
                            <!---- Encabezado de la tabla ----->
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <!----- Columnas por Id ----->
                            <tbody>
                                @foreach($plants as $plant)
                                <tr>
                                    <td>{{$plant->id_planta}}</td>
                                    <td>{{$plant->nombre}}</td>
                                    <td><img src="{{ asset('storage/' . $plant->imagen)}}"></td>
                                    <td>{{$plant->descripcion}}</td>
                                    <td>{{$plant->categoria_planta_id_categoriaplanta}}</td>
                                    <td>
                                        <button class="actions view" onclick="window.location='{{ route('admin.Plantas.plantaShow', $plant->id_planta) }}'"
                                        data-toggle="show" data-target="#ModalShow"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions edit" ><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions delete"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>2</td>
                                    <td>Frijoles</td>
                                    <td><img src="{{ asset('images/Planta-frijol.jpg')}}"></td>
                                    <td>Los frijoles son una vaina suavemente curvada y dehiscente, lo que significa que se abre naturalmente cuando está madura.</td>
                                    <td>
                                        <button class="actions"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Brócoli</td>
                                    <td><img src="{{ asset('images/Planta-brocoli.jpg')}}"></td>
                                    <td>Es una verdura perteneciente a la familia de las crusiferas, suele desarrollar una cabeza central y varias menores dentro de la misma planta.</td>
                                    <td>
                                        <button class="actions"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Tomate</td>
                                    <td><img src="{{ asset('images/Planta-tomate.jpg')}}"></td>
                                    <td>Los tomates son frutos de planta de la familia de las solanáceas, son plantas amantes del sol y el calor, para que crezcan sanos es esencial que reciban pleno sol.</td>
                                    <td>
                                        <button class="actions" {{--onclick="window.location='{{route('Plantas.plantaShow')}}'"--><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions" {{--onclick="window.location='{{route('Plantas.plantaEdit')}}'"--><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Sidebar.js')}}"></script>
    <script src="{{ asset('js/Modal.js')}}"></script>
    @include('admin.Plantas.plantaCreate')
    @include('admin.Plantas.plantaShow')
    {{-- @endsection --}}
</body>
</html>