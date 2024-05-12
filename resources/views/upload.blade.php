<x-app-layout>
    @include('Layouts/aside')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="max-w-sm">
                <div class="max-w-sm">
                    <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="max-w-sm space-y-3">
                            <input type="text" name="file_name"
                                class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                placeholder="File name">

                            @error('file_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div><br>
                        <label class="block">
                            <span class="sr-only">Choose file</span>
                            <input type="file" name="file"
                                class="block w-full text-sm text-gray-500
                          file:me-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0
                          file:text-sm file:font-semibold
                          file:bg-blue-600 file:text-white
                          hover:file:bg-blue-700
                          file:disabled:opacity-50 file:disabled:pointer-events-none
                          dark:text-neutral-500
                          dark:file:bg-blue-500
                          dark:hover:file:bg-blue-400
                        ">
                            @error('file_name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <br>
                        </label>

                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Upload File
                        </button>
                    </form>
                </div>

            </div>
        </div>
        <br>
        <br><br><br><br><br>
        @include('Layouts/footer');
</x-app-layout>
