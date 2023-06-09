<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center border-[1.5px] border-gold px-5 py-2 bg-gold hover:text-gold rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-transparent transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
