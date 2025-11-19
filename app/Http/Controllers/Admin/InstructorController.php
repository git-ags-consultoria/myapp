<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Lista todos os instrutores.
     */
    public function index()
    {
        $instructors = Instructor::paginate(10);
        return view('admin.instructors.index', compact('instructors'));
    }

    /**
     * Mostra o formulário de criação de um novo instrutor.
     */
    public function create()
    {
        return view('admin.instructors.create');
    }

    /**
     * Armazena um novo instrutor no banco de dados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'nullable|string|max:20|unique:instructors,cpf',
            'email' => 'required|email|unique:instructors,email',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ]);

        Instructor::create($validated);

        return redirect()->route('admin.instrutores.index')
            ->with('success', 'Instrutor cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um instrutor.
     */
    public function show(Instructor $instrutor)
    {
        return view('admin.instructors.show', compact('instrutor'));
    }

    /**
     * Mostra o formulário de edição de um instrutor.
     */
    public function edit(Instructor $instrutor)
    {
        return view('admin.instructors.edit', compact('instrutor'));
    }

    /**
     * Atualiza os dados de um instrutor.
     */
    public function update(Request $request, Instructor $instrutor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'nullable|string|max:20|unique:instructors,cpf,' . $instrutor->id,
            'email' => 'required|email|unique:instructors,email,' . $instrutor->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
        ]);

        $instrutor->update($validated);

        return redirect()->route('admin.instrutores.index')
            ->with('success', 'Instrutor atualizado com sucesso!');
    }

    /**
     * Remove um instrutor do banco de dados.
     */
    public function destroy(Instructor $instrutor)
    {
        $instrutor->delete();

        return redirect()->route('admin.instrutores.index')
            ->with('success', 'Instrutor excluído com sucesso!');
    }
}
