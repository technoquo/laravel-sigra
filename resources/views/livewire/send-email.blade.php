<main class="container seccion contenido-centrado">
    <h1 class="text-7xl font-semibold mb-4 text-center">Formulaire de contact</h1>
    @if (session()->has('success'))
        <div class="flex justify-center">
            <div id="successMessage"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-auto"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M6.293 6.293a1 1 0 011.414 0L10 10.586l2.293-2.293a1 1 0 111.414 1.414L11.414 12l2.293 2.293a1 1 0 01-1.414 1.414L10 13.414l-2.293 2.293a1 1 0 01-1.414-1.414L8.586 12 6.293 9.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" fill-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <script>
                setTimeout(function() {
                    var element = document.getElementById('successMessage');
                    element.parentNode.removeChild(element);
                }, 5000); // Adjust the time (in milliseconds) as needed
            </script>
        </div>
    @endif

    <div class="mb-6">
        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre nom
            (obligatoire)</label>
        <input type="text" wire:model="nom" id="nom-input"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-6">
        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre e-mail
            (obligatoire)</label>
        <input wire:model="emailAddress" type="email" id="email-input"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="mb-6">
        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sujet
            (obligatoire)</label>
        <textarea id="nom-input" wire:model="subject"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </textarea>
    </div>
    <div class="mb-6">
        <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre vidéo
            (YouTube) en LSFB</label>
        <input type="text" id="video-input" wire:model="video"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    <div class="flex justify-between">
        <button wire:click="sendEmail" class="mx-auto bg-blue-500 text-white font-bold py-2 px-4 rounded">
            envoyer
        </button>
    </div>


</main>
