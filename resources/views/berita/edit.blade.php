<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('berita.update', ['berita' => $berita->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-1">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Judul <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="judul"
                                    value="{{ $errors->any() ? old('judul') : $berita->judul }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                @error('judul')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Penulis <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="author"
                                    value="{{ $errors->any() ? old('author') : $berita->author }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>
                                @error('author')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Berita <span class="text-red-500">*</span>
                                </label>
                                <textarea name="berita" id="" cols="30"
                                    rows="10"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                                    required>{{ $errors->any() ? old('berita') : $berita->berita }}</textarea>
                                @error('berita')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Gambar Saat Ini
                                </label>
                                @if ($berita->gambar)
                                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Foto Profil"
                                        class="mb-4 max-w-[200px] max-h-[200px] object-cover rounded">
                                @else
                                    <p class="text-gray-400 dark:text-gray-500">Tidak ada foto</p>
                                @endif

                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    Upload File (PDF/JPG/PNG)
                                </label>
                                <input type="file" name="gambar" accept=".pdf,.jpg,.jpeg,.png"
                                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600">
                                @error('gambar')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Format: PDF, JPG, JPEG, PNG
                                    (Maks. 2MB)</p>
                            </div>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit"
                            class="text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
