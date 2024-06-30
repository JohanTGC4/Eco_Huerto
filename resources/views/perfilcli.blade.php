<!DOCTYPE html>
<html lang="es">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EcoHuerto</title>
        <link rel="icon" href="{{ asset('images/logoEcoHuerto.png') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/perfilcli.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      </head>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
          <a href="#" class="imagen"><img src="{{ asset('images/logoEcoHuerto.png') }}" width="60" alt=""></a>
          <ul class="nav-menu">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"> Mi Huerto </a><i class="fa fa-home" aria-hidden="true"></i></li>
            <li class="nav-item"><a href="{{ route('comprar') }}" class="nav-link">Comprar </a><i class="fa fa-shopping-bag" aria-hidden="true"></i></li>
            <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog </a><i class="fa fa-tag" aria-hidden="true"></i></li>
            <li class="nav-item"><a href="{{ route('perfilC') }}" class="nav-link">Perfil </i></a><i class="fa fa-user-circle" aria-hidden="true"></i></li>
          </ul>
          <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
          </div>
        
        </div>
      </nav>
      <br>
      <br>
      <br>
  <div class="profile-container">
    <h2 class="h2">Perfil de Usuario</h2>
    <div class="profile-info">
      <img src="{{ asset('images/avatar1.jpg') }}" alt="Foto de Perfil" class="profile-img">
      <div class="info">
        <p><strong>Nombre:</strong> <span id="userName">Juan Pérez</span></p>
        <p><strong>Email:</strong> <span id="userEmail">juan.perez@example.com</span></p>
        <button class="edit-btn" onclick="openEditModal()">Editar Información</button>

      </div>
    </div>
  </div>

  <!-- Modal de edición -->
  <div id="editModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeEditModal()">&times;</span>
      <h2>Editar Información</h2>
      <form id="editForm">
        <label for="editImage">Imagen de Perfil:</label>
        <input type="file" id="editImage" name="editImage" accept="images/*">
        
        <label for="editName">Nombre:</label>
        <input type="text" id="editName" name="editName" value="Juan Pérez">
        
        <label for="editEmail">Email:</label>
        <input type="email" id="editEmail" name="editEmail" value="juan.perez@example.com">
        
        <button type="button" onclick="saveChanges()">Guardar Cambios</button>
      </form>
      
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>



<script>
        function openEditModal() {
    document.getElementById('editModal').style.display = 'block';
    }
    function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
    }
    function saveChanges() {
    var name = document.getElementById('editName').value;
    var email = document.getElementById('editEmail').value;
    var image = document.getElementById('editImage').files[0]; // Obtener el archivo de imagen

    // Actualizar información en el perfil
    document.getElementById('userName').innerText = name;
    document.getElementById('userEmail').innerText = email;

    // Actualizar imagen de perfil
    if (image) {
        var reader = new FileReader();
        reader.onload = function(e) {
        document.getElementById('profileImg').src = e.target.result; // Mostrar la nueva imagen en el perfil
        };
        reader.readAsDataURL(image);
    }

    closeEditModal();
    }

    // Cerrar el modal al hacer clic fuera del contenido
    window.onclick = function(event) {
    var modal = document.getElementById('editModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }

</script>