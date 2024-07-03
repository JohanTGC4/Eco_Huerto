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
                        <button id="open-modal-btn" class="add"><i class='bx bx-plus-medical'></i>Agregar categoría</button>
                        {{-- @endcan --}}
                        <input class="Inp" type="search" placeholder="Buscar"><i class='bx bx-search-alt-2'></i>
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
                                        <button class="actions edit" id="open-modal-btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <form action="{{ route('admin.Categorias.category', $cat->id_categoriaplanta) }}" method="post">
                                            @csrf
                                            <button class="actions delete" ><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
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
    @include('admin.Categorias.categoryEdit')
    {{-- @endsection --}}
</body>
</html>