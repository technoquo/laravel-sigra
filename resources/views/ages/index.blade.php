<x-app-layout>
    {{-- @auth --}}
    <div class="flex justify-center pt-5 py-5">
        <livewire:search />
    </div>
    {{-- @endauth --}}

    <div class="mt-4">
        <h2 class="text-center font-bold text-3xl mt-4">Sélectionnez votre groupe d'âge</h2>
    </div>
    <livewire:ages />
</x-app-layout>
