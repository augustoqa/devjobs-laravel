@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@5.23.2/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.6/basic.min.css" integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw==" crossorigin="anonymous" />
@endsection

@section('navegacion')
    @include('ui.adminnav')
@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form class="max-w-lg mx-auto my-10">
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
                name="titulo">
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
                <option value="{{ $categoria->id }}">
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
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
                <option value="{{ $experiencia->id }}">
                    {{ $experiencia->nombre }}
                </option>
                @endforeach
            </select>
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
                <option value="{{ $ubicacion->id }}">
                    {{ $ubicacion->nombre }}
                </option>
                @endforeach
            </select>
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
                <option value="{{ $salario->id }}">
                    {{ $salario->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >
                Descripción del Puesto:
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion">
        </div>

        <div class="mb-5">
            <label
                for="descripcion"
                class="block text-gray-700 text-sm mb-2"
            >
                Imagen Vacante:
            </label>
            <div id="dropzoneDevJobs" class="dropzone rounded bg-gray-100"></div>
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
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList', 'h2', 'h3'],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Información de la vacante'
                }
            })

            editor.subscribe('editableInput', function (eventObj, editable) {
                const contenido = editor.getContent()
                document.querySelector('#descripcion').value = contenido
            })

            // Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: '/vacantes/imagen'
            });
        })
    </script>
@endsection
