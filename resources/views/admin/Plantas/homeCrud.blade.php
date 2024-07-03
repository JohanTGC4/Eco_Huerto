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
                        <button id="open-modal-btn" class="add"><i class='bx bx-plus-medical'></i>Agregar planta</button>
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
                                        <button id="open-modal-btn" class="actions view" onclick="window.location='{{ route('admin.Plantas.plantaShow', $plant->id_planta) }}'"
                                        data-toggle="show" data-target="#ModalShow"><i class="fa-regular fa-eye"></i></button>
                                        <button class="actions edit" ><i class="fa-solid fa-pen-to-square"></i></button>
                                        <form action="{{ route('admin.Plantas.plantaDestroy', $plant->id_planta) }}" method="post">
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
    <!-- :::::::::::::::::::: MODAL AGREGAR :::::::::::::::::: -->
    {{-- <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{ route('admin.Plantas.plantaStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Imagen</label>
                    <textarea type="textarea" class="form-control" id="descripcion" name="descripcion" required></textarea>
                </div>
                <div class="form-group">
                    <label for="seleccion">ID Categoría</label>
                    <select class="form-control" id="seleccion" name="seleccion" required>
                        <option value="Seleccion" disabled selected>Selecciona ID Categoría</option>
                        <option value="1">1 - Hortalizas</option>
                        <option value="2">2 - Legumbres</option>
                        <option value="3">3 - Medicinal</option>
                        <option value="4">4 - Verduras</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div> --}}
    @include('admin.Plantas.plantaCreate')
    @include('admin.Plantas.plantaShow')
    {{-- @endsection --}}
</body>
</html>