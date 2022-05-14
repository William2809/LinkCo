@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[2px] placeholder:text-green-700 bg-green-900 rounded-[16px] h-[48px] border-green-400 focus:border-lime-300 focus:ring focus:ring-lime-300']) !!}>
