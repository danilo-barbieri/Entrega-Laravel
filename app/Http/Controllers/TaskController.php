<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;


class TaskController extends Controller
{
    //Lista de Tarefas
    public function index()
    {
        $tasks=Task::all();
        return response()->json($tasks);
    }

    //Detalhes 
    public function show($id)
    {
        $tasks = Task::findOrFail($id);
        return response()->json($tasks);
    }

    //Criação de Tarefas
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Titulo' => 'required',
            'Descrição' => 'required',
            'status' => 'required|in:concluída,não concluída',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    // Atualizar
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Titulo' => 'required',
            'Descrição' => 'required',
            'status' => 'required|in:concluída,não concluída',
        ]);

        if ($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $request->validate([
            'Titulo' => 'required',
            'Descrição' => 'required',
            'status' => 'required|in:concluída,não concluída',
        ]);

        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }

    //excluir tarefa
    public function destroy($id){
            $task = Task::findOrFail($id);
            $task->delete();
            return response()->json(null, 204);//204 não tem nada
        }
}
