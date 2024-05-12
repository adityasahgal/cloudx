<x-app-layout>

    @include('Layouts/aside')

    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                <p class=" flex space-x-10 text-2xl text-gray-400 dark:text-gray-500">



                    <img data-tooltip-target="tooltip-jese" class="  w-10 h-10 rounded"
                        src="{{ asset('Images/png/drive.jpg') }}" alt="Medium avatar">


                    <img data-tooltip-target="tooltip-roberta" class=" space-x-6 w-10 h-10 rounded"
                        src="{{ asset('Images/png/dropbox.jpg') }}" alt="Medium avatar">


                    <img data-tooltip-target="tooltip-bonnie" class="w-10 h-10 rounded"
                        src="{{ asset('Images/png/onedrive.jpg') }}" alt="Medium avatar">
                </p>

            </div>


        </div>
        @include('Layouts/footer');
    </div>
</x-app-layout>
