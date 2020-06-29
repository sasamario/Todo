<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'task_id';

    /**
     * @var array
     * データ登録を許可するフィールド
     */
    protected $fillable = ['name', 'detail', 'limit', 'status'];

    const STATUS_NOT_END = 0;

    const STATUS_END = 1;
}
