<?php

namespace App\Repositories;

use App\Models\Orden;
use App\Repositories\Interfaces\OrdenRepositoryInterface;

class OrdenRepository implements OrdenRepositoryInterface
{
    public function getAll()
    {
        return Orden::with(['cliente', 'mesa', 'producto', 'tipoPago'])->get();
    }

    public function find($id)
    {
        return Orden::with(['cliente', 'mesa', 'producto', 'tipoPago'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Orden::create($data);
    }

    public function update($id, array $data)
    {
        $orden = Orden::findOrFail($id);
        $orden->update($data);
        return $orden;
    }

    public function delete($id)
    {
        return Orden::destroy($id);
    }
}
