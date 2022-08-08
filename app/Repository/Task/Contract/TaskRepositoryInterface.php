<?php


namespace App\Repository\Task\Contract;


use Illuminate\Http\Request;

interface TaskRepositoryInterface
{
    public function index();

    public function store(Request $request);

    public function update(int $id, Request $request);

    public function delete(int $id);
}
