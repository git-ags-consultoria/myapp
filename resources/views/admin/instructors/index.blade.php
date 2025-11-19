@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow rounded-lg p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Lista de Instrutores</h2>
            <a href="{{ route('admin.instrutores.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Novo Instrutor
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="text-left px-4 py-2 border-b">Nome</th>
                    <th class="text-left px-4 py-2 border-b">E-mail</th>
                    <th class="text-left px-4 py-2 border-b">Telefone</th>
                    <th class="text-left px-4 py-2 border-b">CPF</th>
                    <th class="text-left px-4 py-2 border-b">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($instructors as $instrutor)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $instrutor->name }}</td>
                        <td class="px-4 py-2 border-b">{{ $instrutor->email }}</td>
                        <td class="px-4 py-2 border-b">{{ $instrutor->phone ?? '—' }}</td>
                        <td class="px-4 py-2 border-b">{{ $instrutor->cpf ?? '—' }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('admin.instrutores.show', $instrutor) }}"
                               class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('admin.instrutores.edit', $instrutor) }}"
                               class="text-yellow-600 hover:underline ml-2">Editar</a>
                            <form action="{{ route('admin.instrutores.destroy', $instrutor) }}"
                                  method="POST" class="inline ml-2"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este instrutor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                            Nenhum instrutor cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $instructors->links() }}
        </div>
    </div>
@endsection
