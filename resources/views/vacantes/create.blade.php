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

        {{ $categorias }}

        <button
            type="submit"
            class="bg-green-500 w-full hover:bg-green-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase"
        >
            Publicar Vacante
        </button>
    </form>
@endsection
