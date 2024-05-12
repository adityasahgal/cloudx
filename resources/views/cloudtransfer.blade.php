<x-app-layout>
    @include('Layouts/aside')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <div class="flex flex-col items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <a href="{{ url('/dashboard/google_drive') }}">
                    <img data-tooltip-target="tooltip-jese" class="  w-10 h-10 rounded"
                        src="{{ asset('Images/png/drive.jpg') }}" alt="Medium avatar">

                </a>
                <label class="block">
                    <a href="{{ url('/dashboard/google_drive') }}">
                        <span class="sr-only">Choose file</span>
                    </a>
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


            </div>

            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <a href="{{ url('https://www.dropbox.com/login') }}">

                    <img data-tooltip-target="tooltip-roberta" class=" space-x-6 w-10 h-10 rounded"
                        src="{{ asset('Images/png/dropbox.jpg') }}" alt="Medium avatar">
                </a>
            </div>
            <button type="button"
                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                Transfer Files
            </button>
            {{-- <div class="max-w-sm">

            </div> --}}


        </div>
        @include('Layouts/footer');
    </div>
</x-app-layout>
