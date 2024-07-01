<div class="main-content" id="ModalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container">
        Información de planta
        <div class="show">
            {{-- @foreach($plants as $plant) --}}
                <h2>ID: {{$plant->id_planta}}</h2>
                <div class="imagen">
                    <h1>Nombre: {{$plant->nombre}}</h1>
                    <img src="{{ asset('storage/' . $plant->imagen)}}">
                </div>
                <div class="inf">
                    <p>Descripción: {{$plant->descripcion}}</p>
                    <p>ID de categoría: {{$plant->categoria_planta_id_categoriaplanta}}</p>
                </div>
            {{-- @endforeach --}}
        </div>
        <button class="btn btn-primary" onclick="window.location='{{route('homeCrud')}}'">Volver</button>
    </div>
</div>