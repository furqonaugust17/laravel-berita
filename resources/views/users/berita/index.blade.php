<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-8">Daftar Berita</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($beritas as $berita)
                <div
                    class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
                    {{-- Gambar --}}
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                            class="w-full h-48 object-cover">
                    @else
                        <div
                            class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-gray-500 dark:text-gray-300">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- Konten --}}
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white truncate">{{ $berita->judul }}
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">Ditulis oleh: {{ $berita->author }}</p>
                        <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 line-clamp-3">
                            {{ \Illuminate\Support\Str::limit($berita->berita, 100) }}
                        </p>

                        <a href="{{ route('berita.detail', $berita->slug) }}"
                            class="inline-block text-indigo-600 dark:text-indigo-400 hover:underline text-sm font-medium">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center text-gray-500 dark:text-gray-300">
                    Tidak ada berita ditemukan.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
