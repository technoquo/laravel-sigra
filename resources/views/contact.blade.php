<x-app-layout>
    <main class="container seccion contenido-centrado">
        <h1 class="text-7xl font-semibold mb-4 text-center">Formulaire de contact</h1>
        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre nom
                (obligatoire)</label>
            <input type="text" id="nom-input"
                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre e-mail
                (obligatoire)</label>
            <input type="email" id="email-input"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sujet
                (obligatoire)</label>
            <textarea id="nom-input"
                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </textarea>
        </div>
        <div class="mb-6">
            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Votre vidéo
                (YouTube) en LSFB</label>
            <input type="text" id="video-input"
                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        </div>
    </main>
</x-app-layout>
