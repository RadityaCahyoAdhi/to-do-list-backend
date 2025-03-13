<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    // Show all tasks
    public function index()
    {
        $response = tasks::orderBy('created_at', 'DESC')->get();

        return response()->json($response, 200);
    }

    // Save a new task
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'task' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $task = tasks::create([
                'task' => $request->task,
                'completed' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return response()->json([
                'message' => 'Task created successfully',
                'item' => $task
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to create task',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Update the task completion status
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'completed' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $task = tasks::find($id);

            if ($task) {
                $task->update([
                    'completed' => $request->completed,
                    'completed_at' => $request->completed ? now() : null,
                    'updated_at' => now()
                ]);

                return response()->json([
                    'message' => 'Task completion status updated successfully',
                    'item' => $task
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Task not found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to update task completion status',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Delete the task
    public function destroy($id)
    {
        try {
            $task = tasks::find($id);

            if ($task) {
                $task->delete();

                return response()->json([
                    'message' => 'Task deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'error' => 'Task not found'
                ], 404);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Failed to delete task',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
