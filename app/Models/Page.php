<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','url','created_by'];


    public function createdBy()
    {
        return $this->hasOne(User::class,'id','created_by');
    }

    /**
     * The blocks that belong to the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blocks()
    {
        return $this->belongsToMany(PageBlocks::class, 'page_blocks', 'page_id', 'block_id')
        ->withTimeStamps();
    }

    /**
     * Get all of the manyblocks for the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manyblocks()
    {
        return $this->hasMany(PageBlocks::class, 'block_id');
    }
}
