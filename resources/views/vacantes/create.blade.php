@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@5.23.2/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form action="{{ route('vacantes.store') }}" method="post" class="max-w-lg mx-auto my-10">
        @csrf
        <div class="mb-5">
            <label
                for="titulo"
                class="block text-gray-700 text-sm mb-2"
            >
                Titulo Vacante:
            </label>

            <input
                id="titulo"
                type="text"
                class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror"
                name="titulo"
                placeholder="Título para la vacante"
                value="{{ old('titulo') }}"
            >

            @error('titulo')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="categoria"
                class="block text-gray-700 text-sm mb-2"
            >
                Categoría:
            </label>

            <select
                id="categoria"
                class="block appearance-none w-full border border-gray-700
                        rounded leading-tight focus:outline-none
                        focus:border-gray-500 p-3 bg-gray-100"
                name="categoria"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>

            @error('categoria')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="experiencia"
                class="block text-gray-700 text-sm mb-2"
            >
                Experiencia:
            </label>

            <select
                id="experiencia"
                class="block appearance-none w-full border border-gray-700
                        rounded leading-tight focus:outline-none
                        focus:border-gray-500 p-3 bg-gray-100"
                name="experiencia"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($experiencias as $experiencia)
                <option value="{{ $experiencia->id }}" {{ old('experiencia') == $experiencia->id ? 'selected' : '' }}>
                    {{ $experiencia->nombre }}
                </option>
                @endforeach
            </select>

            @error('experiencia')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="ubicacion"
                class="block text-gray-700 text-sm mb-2"
            >
                Ubicacion:
            </label>

            <select
                id="ubicacion"
                class="block appearance-none w-full border border-gray-700
                        rounded leading-tight focus:outline-none
                        focus:border-gray-500 p-3 bg-gray-100"
                name="ubicacion"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($ubicaciones as $ubicacion)
                <option value="{{ $ubicacion->id }}" {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }}>
                    {{ $ubicacion->nombre }}
                </option>
                @endforeach
            </select>

            @error('ubicacion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="salario"
                class="block text-gray-700 text-sm mb-2"
            >
                Salario:
            </label>

            <select
                id="salario"
                class="block appearance-none w-full border border-gray-700
                        rounded leading-tight focus:outline-none
                        focus:border-gray-500 p-3 bg-gray-100"
                name="salario"
            >
                <option disabled selected>- Selecciona -</option>

                @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}" {{ old('salario') == $salario->id ? 'selected' : '' }}>
                    {{ $salario->nombre }}
                </option>
                @endforeach
            </select>

            @error('salario')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >
                Descripción del Puesto:
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">

            @error('descripcion')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="mb-5">
            <label
                for="imagen"
                class="block text-gray-700 text-sm mb-2"
            >
                Imagen Vacante:
            </label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
            <input type="hidden" name="imagen" id="imagen" value="{{ old('imagen') }}">

            @error('imagen')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror

            <p id="error"></p>
        </div>

        <div class="mb-5">
            <label
                for="skills"
                class="block text-gray-700 text-sm mb-5"
            >
                Habilidades y Conocimiento:
                <span class="text-xs">(Elige al menos 3)</span>
            </label>
            @php
                $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'JQuery', 'Node', 'Angular', 'VueJS', 'ReactJS', 'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django', 'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Futter', 'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <lista-skills
                :skills="{{ json_encode($skills) }}"
                :oldskills="{{ json_encode(old('skills')) }}"
            >
            </lista-skills>

            @error('skills')
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="block">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <button
            type="submit"
            class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >
            Publicar Vacante
        </button>
    </form>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@5.23.2/dist/js/medium-editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/min/dropzone.min.js" integrity="sha512-KgeSi6qqjyihUcmxFn9Cwf8dehAB8FFZyl+2ijFEPyWu4ZM8ZOQ80c2so59rIdkkgsVsuTnlffjfgkiwDThewQ==" crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {
            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            })

            // Agrega al input hidden lo que el usuario escribe en medium editor
            editor.subscribe('editableInput', function (eventObj, editable) {
                const contenido = editor.getContent()
                document.querySelector('#descripcion').value = contenido
            })

            // llena el editor con el contenido del input hidden
            editor.setContent(document.querySelector('#descripcion').value)

            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: '/vacantes/imagen',
                dictDefaultMessage: 'Sube aquí tu archivo',
                acceptedFiles: '.png,.jpg,.jpeg,.gif,.bmp',
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar Archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                    if (document.querySelector('#imagen').value.trim()) {
                        let imagenPublicada = {};
                        imagenPublicada.size = 1234;
                        imagenPublicada.name = document.querySelector('#imagen').value

                        this.options.addedfile.call(this, imagenPublicada);
                        this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
                    }
                },
                success: function(file, response) {
                    console.log(response.correcto);
                    document.querySelector('#error').textContent = '';

                    // Colocar la respuesta del servidor en el input hidden
                    document.querySelector('#imagen').value = response.correcto;

                    // Añadir al objeto de archivo el nombre del servidor
                    file.nombreServidor = response.correcto;
                },
                maxfilesexceeded: function (file) {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]); // eliminar el archivo anterior
                        this.addFile(file); // Agrega el nuevo archivo
                    }
                },
                removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement)

                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then(respuesta => console.log(respuesta))
                }
            });
        })
    </script>
@endsection
