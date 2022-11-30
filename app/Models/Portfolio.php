<?php

namespace App\Models;

use App\Base\Model;

class Portfolio extends Model
{
    protected string $tableName = 'portfolios';

    /**
     * Get portfolios by status
     *
     * @param integer $status
     * @return array
     */
    public function get(int $status = 1): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        if ($status !== -1) {
            $sql .= " WHERE status = ?";
        }
        return $this->fetchAll($sql, [$status]);
    }
    
    public function findByID(int $id)
    {
        # code...
    }
}
