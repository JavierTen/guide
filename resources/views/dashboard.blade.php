<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Estilos de FilePond -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Formulario para enviar el archivo -->
                    <form action="{{ route('post.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="title">Título</label>
                        <input type="text" name="title" required class="border p-2 w-full mb-4">

                        <label for="content">Contenido</label>
                        <textarea name="content" required class="border p-2 w-full mb-4"></textarea>

                        <label for="file">Imagen</label>
                        <input type="file" class="filepond" name="file" accept="image/*" required />

                        <button type="submit" class="btn btn-primary p-2 mt-4 rounded">Crear Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            FilePond.registerPlugin(
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType,
                FilePondPluginImagePreview
            );

            FilePond.setOptions({
                storeAsFile: true
            });

            FilePond.create(document.querySelector('.filepond'), {
                acceptedFileTypes: ['image/*'],
                maxFileSize: '2MB',
                instantUpload: false // Desactiva la subida automática
            });
        });
    </script>
</x-app-layout>
