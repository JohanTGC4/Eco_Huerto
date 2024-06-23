<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoHuerto</title>
    <link rel="icon" href="{{ asset('images/logoEcoHuerto.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
   
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="imagen"><img src="{{ asset('images/logoEcoHuerto.png') }}" width="60" alt=""></a>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"> Mi Huerto </a><i class="fa fa-home" aria-hidden="true"></i></li>
                <li class="nav-item"><a href="{{ route('comprar') }}" class="nav-link">Comprar </a><i class="fa fa-shopping-bag" aria-hidden="true"></i></li>
                <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog </a><i class="fa fa-tag" aria-hidden="true"></i></li>
                <li class="nav-item"><a href="{{ route('perfilcli') }}" class="nav-link">Perfil </i></a><i class="fa fa-user-circle" aria-hidden="true"></i></li>
              </ul>
        </div>
    </nav>
    
    <br><br><br><br><br><br>
    
    <main class="container">
        <div class="blog-form">
            <input type="text" id="username-input" placeholder="Nombre de usuario">
            <textarea id="blog-input" placeholder="¿Qué quieres compartir hoy?"></textarea>
            <label for="image-upload" class="upload-label">
                <i class="fas fa-camera"></i> Subir foto
            </label>
            <input type="file" id="image-upload" accept="image/*">
            <div id="image-preview" class="image-preview">
                <img id="preview-image" src="#" alt="Vista previa de la imagen">
            </div>
            <button id="post-btn">Publicar</button>
        </div>
        <div class="blog-posts" id="blog-posts">
            <!-- Aquí se añadirán las publicaciones dinámicamente -->
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');

            hamburger.addEventListener('click', () => {
                navMenu.classList.toggle('active');
            });

            const blogInput = document.getElementById('blog-input');
            const imageUpload = document.getElementById('image-upload');
            const postBtn = document.getElementById('post-btn');
            const blogPosts = document.getElementById('blog-posts');
            const usernameInput = document.getElementById('username-input');
            const previewImage = document.getElementById('preview-image');
            let editingPost = null;

            // Mostrar la vista previa de la imagen seleccionada
            imageUpload.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        previewImage.src = event.target.result;
                        previewImage.style.display = 'block'; // Mostrar la vista previa
                    };
                    reader.readAsDataURL(file);
                }
            });

            postBtn.addEventListener('click', () => {
                const text = blogInput.value.trim();
                const imageFile = imageUpload.files[0]; // Obtener el archivo de imagen seleccionado
                const username = usernameInput.value.trim();
                const date = new Date().toLocaleString(); // Obtener la fecha actual en formato local

                if (editingPost) {
                    updatePost(editingPost, text, imageFile, username, date);
                } else {
                    if ((text || imageFile) && username) {
                        appendPost(text, imageFile, username, date);
                    }
                }

                blogInput.value = '';
                imageUpload.value = ''; // Limpiar el campo de carga de imagen
                usernameInput.value = ''; // Limpiar el campo de nombre de usuario
                previewImage.style.display = 'none'; // Ocultar la vista previa después de publicar
                editingPost = null;
            });

            function appendPost(text, imageFile, username, date) {
                const postElement = document.createElement('div');
                postElement.classList.add('blog-post');

                // Crear elemento de metadatos (nombre de usuario y fecha)
                const metaElement = document.createElement('div');
                metaElement.classList.add('post-meta');
                metaElement.textContent = `Publicado por ${username} el ${date}`;
                postElement.appendChild(metaElement);

                // Crear elemento de texto
                const textElement = document.createElement('p');
                textElement.textContent = text;
                textElement.classList.add('post-text');
                postElement.appendChild(textElement);

                // Si hay una imagen seleccionada, crear elemento de imagen
                if (imageFile) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        const imageElement = document.createElement('img');
                        imageElement.src = event.target.result;
                        imageElement.classList.add('uploaded-image'); // Agregar clase para estilos de imagen
                        postElement.appendChild(imageElement);
                    };
                    reader.readAsDataURL(imageFile);
                }

                // Crear botones de editar y eliminar
                const editButton = document.createElement('button');
                editButton.textContent = 'Editar';
                editButton.classList.add('edit-btn');
                editButton.addEventListener('click', () => editPost(postElement, text, username, date));

                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Eliminar';
                deleteButton.classList.add('delete-btn');
                deleteButton.addEventListener('click', () => deletePost(postElement));

                postElement.appendChild(editButton);
                postElement.appendChild(deleteButton);

                // Agregar la publicación al contenedor de publicaciones
                blogPosts.insertBefore(postElement, blogPosts.firstChild); // Insertar al principio para mostrar la última publicación primero
            }

            function editPost(postElement, currentText, username, date) {
                editingPost = postElement;
                blogInput.value = currentText;
                usernameInput.value = username;
                // Mover la vista previa de la imagen si existe
                const imageElement = postElement.querySelector('.uploaded-image');
                if (imageElement) {
                    previewImage.src = imageElement.src;
                    previewImage.style.display = 'block';
                } else {
                    previewImage.style.display = 'none';
                }
                postBtn.textContent = 'Actualizar';
            }

            function updatePost(postElement, text, imageFile, username, date) {
                const textElement = postElement.querySelector('.post-text');
                textElement.textContent = text;

                const metaElement = postElement.querySelector('.post-meta');
                metaElement.textContent = `Publicado por ${username} el ${date}`;

                const imageElement = postElement.querySelector('.uploaded-image');
                if (imageFile) {
                    const reader = new FileReader();
                    reader.onload = function(event) {
                        if (imageElement) {
                            imageElement.src = event.target.result;
                        } else {
                            const newImageElement = document.createElement('img');
                            newImageElement.src = event.target.result;
                            newImageElement.classList.add('uploaded-image');
                            postElement.appendChild(newImageElement);
                        }
                    };
                    reader.readAsDataURL(imageFile);
                } else if (imageElement) {
                    imageElement.remove();
                }

                postBtn.textContent = 'Publicar';
            }

            function deletePost(postElement) {
                if (confirm('¿Estás seguro de que quieres eliminar esta publicación?')) {
                    postElement.remove();
                }
            }
        });
    </script>
</body>
</html>

