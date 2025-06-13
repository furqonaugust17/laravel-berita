<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">

            @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="w-full h-64 object-cover">
            @else
                <div
                    class="w-full h-64 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300">
                    Tidak ada gambar
                </div>
            @endif

            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">{{ $berita->judul }}</h1>

                <div class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                    Ditulis oleh <strong>{{ $berita->author }}</strong> • {{ $berita->created_at->format('d M Y') }}
                </div>

                <p class="text-gray-700 dark:text-gray-200 leading-relaxed whitespace-pre-line">
                    {{ $berita->berita }}
                </p>

                <div class="mt-8">
                    <a href="{{ route('berita') }}"
                        class="inline-block text-indigo-600 dark:text-indigo-400 hover:underline text-sm">
                        ← Kembali ke daftar berita
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
