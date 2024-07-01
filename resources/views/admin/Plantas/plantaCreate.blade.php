<div class="modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Planta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Creación de Categoría -->
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
        </div>
    </div>
</div>