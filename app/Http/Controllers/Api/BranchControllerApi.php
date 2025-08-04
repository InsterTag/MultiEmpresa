<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Services\BranchService;
use App\Http\Requests\Branch\StoreBranchRequest;
use App\Http\Requests\Branch\UpdateBranchRequest;

class BranchControllerApi extends \App\Http\Controllers\Controller
{
    protected $branchService;

    public function __construct(BranchService $branchService)
    {
        $this->branchService = $branchService;
    }
    

    public function index()
    {
        $branches = $this->branchService->index();
        return response()->json($branches);
    }
    public function show($id)
    {
        $branch = $this->branchService->show($id);
        if (!$branch) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json($branch);
    }

    public function store(StoreBranchRequest $request)
    {
        $branch = $this->branchService->create($request->validated());
        return response()->json(['message' => 'Producto agregado a solicitud.', 'data' => $branch], 201);
    }

    public function update(UpdateBranchRequest $request, $id)
    {
        $branch = $this->branchService->update($id, $request->validated());
        if (!$branch) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json(['message' => 'Actualizado correctamente', 'data' => $branch]);
    }

    public function destroy($id)
    {
        $branch = $this->branchService->delete($id);
        if (!$branch) {
            return response()->json(['message' => 'No encontrado'], 404);
        }

        return response()->json(['message' => 'Eliminado correctamente']);
    }
} 