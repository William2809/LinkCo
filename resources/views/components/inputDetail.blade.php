@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'flex items-center border-[2px] text-green-100 font-normal text-heading6 bg-green-900 rounded-[12px] h-[48px] border-lime-300 focus:border-lime-400 w-[880px] h-[68px]']) !!}>
