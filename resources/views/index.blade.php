<!DOCTYPE html>
<html lang="en">

@include('layouts\header')

<body class=" bg-sky-900">


    @include('layouts\navbar')

    <main class="">
        <div class="sm:w-[1280px] justify-center mx-auto h-full">
            <div class=" mt-24 flex grid-cols-2 justify-between">
                {{-- <img class="" src="{{ asset('Images/image5.jpg') }}" alt=""> --}}
                <div class="bg-transparent flex flex-col justify-between p-4 leading-normal">
                    <h5 class=" text-4xl font-bold tracking-tight text-gray-900 dark:text-white">Focus on
                        Transferring across Clouds</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Transfer and manage your multiple
                        cloud files with one app.</p>
                </div>


                <div class=" hover:ease-in duration-300 hover:animate-pulse  shadow-inner cursor-pointer rounded-[10px]">
                    <img class="rounded-[10px]"
                        src="https://img.freepik.com/free-photo/hologram-projector-screen-with-cloud-system-technology_53876-108502.jpg?size=626&ext=jpg&ga=GA1.1.1872098703.1710368872&semt=ais"
                        alt="">
                </div>
            </div>
        </div>
        <hr
            class="w-[1280px] ml-28 justify-center items-center my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
        <div class="sm:w-[1280px] justify-center mx-auto h-full">

            <div class=" mt-24 pt-8 flex grid-cols-2 justify-between rounded-[10px] bg-white">
                <img class="hover:animate-pulse rounded-lg shadow-inner cursor-pointer"
                    src="https://www.multcloud.com/resource/images/index/MC-home-transfer-ct-1.svg" alt="">
                <div class=" justify-start items-center pl-[-32] w-2/4 h-auto">
                    <h2 class=" p-4 text-2xl font-bold justify-start  text-blue-800 ">Cloud Transfer</h2>
                    <p class="p-4 text-4xl ">Transfer Files between Cloud Drives</p>
                    <p class=" p-4">MultCloud can transfer files from one cloud service to another directly without
                        downloading and re-uploading, such as transferring files from Dropbox to Google Drive or
                        migrating files from one Google Drive to another.
                    </p>
                    <a class="p-4 text-blue-700">Learn more >></a>

                </div>
            </div>

        </div>
        <hr class="ml-28   w-[1280px] my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
        <div class="sm:w-[1280px] justify-center mx-auto  h-full">

            <div class=" mt-24 pt-8 flex grid-cols-2 rounded-[10px] justify-between bg-white">
                <div class=" justify-start items-center pl-[-32] w-2/4 h-auto">
                    <h2 class=" p-4 text-2xl font-bold justify-start  text-blue-800 ">Cloud Sync</h2>
                    <p class="p-4 text-4xl ">Keep Two Cloud Services Synced</p>
                    <p class=" p-4">With MultCloud, you can easily sync two folders between different cloud services
                        in real-time. One-way and two-way synchronization are both supported. You can also set a timed
                        sync to automatically sync data between clouds at a certain interval.
                    </p>
                    <a class="p-4 text-blue-700">Learn more >></a>

                </div>
                <img class="hover:animate-pulse rounded-lg shadow-inner cursor-pointer"
                    src="https://www.multcloud.com/resource/images/index/MC-home-sync-ct-2.svg" alt="">
            </div>

        </div>
        <hr class="ml-28  w-[1280px] my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
        <div class="sm:w-[1280px] flex justify-center mx-auto h-full bg-black border mt-24 rounded-[30px]">
            <div class="  p-8 flex grid-cols-2 justify-between">
                <img src="https://www.multcloud.com/resource/images/index/MC-home-explorer-ct-5.svg" alt="">
            </div>
            <div class="justify-start items-center pl-[-32] w-2/4 h-auto">
                <h2 class=" p-4 text-2xl font-bold justify-start  text-blue-800 ">Cloud Explorer</h2>
                <p class="p-4 text-4xl text-white ">Manage all cloud accounts in one place</p>
                <p class=" p-4 text-white">Connect all your clouds to MultCloud and you'll find it so easy to access and
                    manage multiple cloud storage files with a single login. Easily upload, download, copy/cut, paste,
                    preview, and rename your online files just like in Windows Explorer. So, if you connect all your
                    free cloud accounts to MultCloud, you would "expand" your free cloud storage to some extent.
                </p>
                <a class="p-4 text-blue-700">Learn more >></a>
            </div>

        </div>
    </main>

    @include('layouts\footer')

</body>

</html>
