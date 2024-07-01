{{-- @extends('layout.app')
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
                    <Strong><p>Categoría de plantas</p></Strong>
                    <div>
                        {{-- @can('planta-create') --}}
                        <button class="add" onclick="window.location='{{route('admin.Categorias.categoryCreate')}}'"
                        data-toggle="modal" data-target="#ModalCreate"><i class='bx bx-plus-medical'></i>Agregar categoría</button>
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
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <!----- Columnas por Id ----->
                            <tbody>
                                @foreach($cats as $cat)
                                <tr>
                                    <td>{{$cat->id_categoriaplanta}}</td>
                                    <td>{{$cat->nombre}}</td>
                                    <td>
                                        {{-- <button class="actions view"><i class="fa-regular fa-eye"></i></button> --}}
                                        <button class="actions edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions delete"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>2</td>
                                    <td>Frijoles</td>
                                    <td>
                                        <button class="actions"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Brócoli</td>
                                    <td>
                                        <button class="actions"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Tomate</td>
                                    <td>
                                        <button class="actions"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="actions"><i class="fa-solid fa-trash"></i></button>
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
    @include('admin.Categorias.categoryCreate')
    {{-- @endsection --}}
</body>
</html>