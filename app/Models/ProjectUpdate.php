<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUpdate extends Model
{
    use HasFactory;

    protected $table = 'project_updates';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'project_id',
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'project_id' => 'integer',
    ];

    public static $rules = [
        'title' => 'required|max:255|unique:project_updates',
    ];

    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
