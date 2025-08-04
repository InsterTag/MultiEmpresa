<?php

namespace App\Services;

interface BranchService
{
    public function index();
    public function show($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
