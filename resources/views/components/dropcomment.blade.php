<div class="relative" x-data="{ open: false }" @click.outside="open = false">
    <div @click=" open=! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute  z-50 mt-2 w-full rounded-md shadow-lg -left-48" style="display: none;" @click="open = true">
        <div>
            {{ $content }}
        </div>
    </div>
</div>
