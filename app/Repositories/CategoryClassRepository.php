<?php
namespace App\Repositories;

interface CategoryClassRepository {
    public function getAll();
    public function createAt(array $data);
    public function updates(int $id,array $data);
    public function deletes(int $id);
}
