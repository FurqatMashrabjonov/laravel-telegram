<?php

namespace App\Repositories\Interfaces;

interface ModelInterface
{
    public function get();

    public function find($id);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
