<div>
    <div class="flex justify-center items-center">
        <div class="hamburguer-menu" wire:click="toggleMenu">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="64"
                height="64" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="4" y1="6" x2="20" y2="6"></line>
                <line x1="4" y1="12" x2="20" y2="12"></line>
                <line x1="4" y1="18" x2="20" y2="18"></line>
            </svg>
        </div>
    </div>
    <div class="{{ $mostrar ? 'container-menu-m' : 'container-menu' }}">
        <nav class="menu-principal">
            <ul class="menu">
                <li class="{{ Route::is('') ? 'current_page_item' : '' }}">
                    <a wire:navigate href="/" aria-current="page">Accueil</a>
                </li>
                <li class="{{ Route::is('ages.index') ? 'current_page_item' : '' }}">
                    <a wire:navigate href="{{ route('ages.index') }}">Vidéothèque</a>
                </li>
                <li class="{{ Route::is('laboutique.index') ? 'current_page_item' : '' }}">
                    <a href="{{ route('laboutique.index') }}">La boutique</a>
                </li>
                {{-- <li class="{{ Route::is('monsigra.index') ? 'current_page_item' : '' }}">
                    <a wire:navigate href="{{ route('monsigra.index') }}">Mon Sigra</a>
                </li>
                <li class="{{ Route::is('abonnements.index') ? 'current_page_item' : '' }}">
                    <a wire:navigate href="{{ route('abonnements.index') }}">Abonnements</a>
                </li> --}}
                <li class="">
                    <a wire:navigate href="{{ route('send-email') }}">Contact</a>
                </li>
            </ul>
        </nav>
    </div>

</div>
