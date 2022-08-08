<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $image
 * @property string $task_description
 * @property string $time_to_completion
 * @property boolean $complete
 * @property int $repeat_type
 *
 * Class Task
 * @package App\Models
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'task_description',
        'time_to_completion',
        'complete',
        'repeat_type'
    ];

    protected $casts = [
        'repeat_type' => 'array'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'task_user');
    }
}
