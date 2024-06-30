<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EcoHuerto</title>
  <link rel="icon" href="{{ asset('css/images/logoEcoHuerto.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ asset('css/misplantas.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
  <div class="search-container">
    <input type="text" class="search-input" placeholder="Buscar...">
    <button class="search-button"><i class="fa fa-search"></i></button>
  </div>
    <!-- Botón para agregar plantas -->
    <div class="add-plant-container">
        <button id="open-modal-btn" class="add-plant-button"><i class="fa fa-plus"></i> Agregar Planta</button>
      </div>


  <!-- Modal -->
  <div id="plant-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Agregar Planta</h2>
      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="imagen">Imagen:</label>
          <input type="file" id="imagen" name="imagen" accept="image/*" required>
          <img id="preview-image" src="#" alt="Vista previa de la imagen seleccionada" width="100" height="100">
        </div>
        <div class="form-group">
          <label for="nombre">Nombre de la Planta:</label>
          <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
          <label for="tipo">Tipo de Planta:</label>
          <select id="tipo" name="tipo" required>
            <option value="" disabled selected>Selecciona el tipo de planta</option>
            <option value="hortaliza">Hortaliza</option>
            <option value="planta medicinal">Planta Medicinal</option>
            <option value="verdura">Verdura</option>
            <option value="legumbre">Legumbre</option>
          </select>
        </div>
        <div class="form-group">
          <label for="riego">Frecuencia de Riego:</label>
          <input type="text" id="riego" name="riego" placeholder="Ej. Cada 3 días" required>
        </div>
        <div class="form-group">
          <label for="luz">Cantidad de Luz al Día (horas):</label>
          <input type="number" id="luz" name="luz" min="1" max="24" required>
        </div>
        <button type="submit">Agregar Planta</button>
      </form>
    </div>
  </div>
   <!-- Contenedor de la tabla -->
   <div class="table-container">
    <table class="custom-table">
      <tr>
        <td><a href="home.html">Por hacer <i class="fa fa-history" aria-hidden="true"></i></a></td>
        <td><a href="misplantas.html">Mis plantas <i class="fa fa-leaf" aria-hidden="true"></i></a></td>
      </tr>
    </table>
  </div>
   <!-- Sección de tarjetas -->
   <div class="card-container">
    <div class="card" onclick="openModal('zanahoria')">
      <img src="images/zanahoria.jpg" width="150" alt="Zanahoria" class="card-img">
      <div class="card-content">
        <p>Planta de zanahoria</p>
      </div>
    </div>
    <div class="card" onclick="openModal('tomate')">
      <img src="images/tomateplanta.jpg" width="150" alt="Tomate" class="card-img">
      <div class="card-content">
        <p>Planta de tomate</p>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="plantModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <div id="modal-content" class="modal-info">
        <!-- Aquí se llenará dinámicamente la información de la planta -->
      </div>
    </div>
  </div>

  <script>
    function openModal(planta) {
      var modal = document.getElementById('plantModal');
      var modalContent = document.getElementById('modal-content');
      var modalInfo = '';

      // Lógica para llenar el modal con información de la planta seleccionada
      if (planta === 'zanahoria') {
        modalInfo = `
          <h2>Zanahoria</h2>
          <img src="images/zanahoria.jpg" width="150" alt="Zanahoria">
          <p>La zanahoria es una planta herbácea de la familia de las umbelíferas, cultivada como hortaliza por su raíz comestible, gruesa, carnosa, de sabor ligeramente dulce y color naranja.</p>
          <p>Condiciones de cultivo: Luz solar directa, suelo bien drenado y rico en nutrientes.</p>
        `;
      } else if (planta === 'tomate') {
        modalInfo = `
          <h2>Tomate</h2>
          <img src="images/tomateplanta.jpg" width="150" alt="Tomate">
          <p>El tomate es una planta herbácea perenne cultivada como anual, perteneciente a la familia de las solanáceas. Se cultiva principalmente por su fruto comestible, de sabor ácido y ampliamente utilizado en la cocina.</p>
          <p>Condiciones de cultivo: Luz solar directa, riego regular y buen drenaje.</p>
        `;
      }

      modalContent.innerHTML = modalInfo;
      modal.style.display = 'block';
    }

    function closeModal() {
      var modal = document.getElementById('plantModal');
      modal.style.display = 'none';
    }

    // Cerrar el modal haciendo clic fuera del contenido
    window.onclick = function(event) {
      var modal = document.getElementById('plantModal');
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>

</div>
</body>
</html>


<script>
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
    });
    // Obtener elementos del DOM
    const openModalBtn = document.getElementById('open-modal-btn');
    const modal = document.getElementById('plant-modal');
    const closeModalBtn = document.getElementsByClassName('close')[0];

    // Función para abrir el modal
    openModalBtn.onclick = function() {
    modal.style.display = 'block';
    }

    // Función para cerrar el modal al hacer clic en la X
    closeModalBtn.onclick = function() {
    modal.style.display = 'none';
    }

    // Función para cerrar el modal si el usuario hace clic fuera de él
    window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
    }
    //PREVISUALIZAR IMAGEN
    const fileInput = document.getElementById('imagen');
    const previewImage = document.getElementById('preview-image');

    fileInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
        previewImage.src = reader.result;
        });

        reader.readAsDataURL(file);
    }
    });

</script>
