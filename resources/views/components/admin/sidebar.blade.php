<aside class="w-64 bg-white shadow-md border-r">
    <div class="p-4 border-b">
        <h2 class="text-xl font-semibold text-gray-700">Administração</h2>
    </div>

    <nav class="mt-4">
        <ul>
            <li>
                <a href="{{ route('admin.instrutores.index') }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.instrutores.*') ? 'bg-gray-100 font-semibold' : '' }}">
                    👨‍🏫 Instrutores
                </a>
            </li>
            <li>
                <a href="{{ route('admin.modalities.index') }}"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100 {{ request()->routeIs('admin.modalities.*') ? 'bg-gray-100 font-semibold' : '' }}">
                    🥋 Modalidades
                </a>
            </li>
            {{-- Exemplo de novos links futuros --}}
            <li>
                <a href="#"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    👨‍🎓 Alunos
                </a>
            </li>
        </ul>
    </nav>
</aside>
