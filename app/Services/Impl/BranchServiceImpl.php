<?php

namespace App\Services\Impl;

use App\Services\BranchService;
use App\Models\Branch;

class BranchServiceImpl implements BranchService
{
    public function index()
    {
        $branches=Branch::included()->filter()->sort()->getOrPaginate();
        return response()->json($branches);
    }

    public function show($id)
    {
        return Branch::with(['company'])->find($id);
    }

    public function create(array $data)
    {
        return Branch::create($data);
    }

    public function update($id, array $data)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return null;
        }

        $branch->update($data);
        return $branch;
    }

    public function delete($id)
    {
        $branch = Branch::find($id);
        if (!$branch) {
            return false;
        }

        return $branch->delete();
    }
}
