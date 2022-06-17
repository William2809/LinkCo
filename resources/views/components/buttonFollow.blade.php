<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center px-3 py-2 text-green-700 bg-lime-300 h-[48px] text-heading6 font-medium rounded-[16px] hover:bg-lime-800 hover:text-green-200 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
