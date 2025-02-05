<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Posts con archivos</h3>

                    @foreach ($posts as $post)
                        <div class="mb-6 p-4 border rounded">
                            <h4 class="text-xl font-semibold">{{ $post->title }}</h4>
                            <p class="text-gray-700">{{ $post->content }}</p>

                            <h5 class="mt-4 font-bold">Archivos:</h5>
                            <div class="flex flex-wrap gap-4">
                                @foreach ($post->getMedia('images') as $media)
                                    <div class="w-32 h-32 border rounded overflow-hidden">
                                        <img src="{{ $media->getUrl() }}" alt="Imagen"
                                            class="w-full h-full object-cover">
                                    </div>
                                    <br>
                                    <a href="{{ $media->getUrl('thumb') }}" target="_blank" class="text-blue-600">Ver
                                        imagen</a>
                                    <br>
                                    <div>{{ $media->getUrl('thumb') }}</div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
