<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-700 rounded-3xl hover:bg-blue-800 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50']) }}>
    {{ $slot }}
</button>
