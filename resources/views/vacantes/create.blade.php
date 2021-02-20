@extends('layouts.app')

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

        <button
            type="submit"
            class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >
            Publicar Vacante
        </button>
    </form>
@endsection