<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable = ['name','active','layout','photo','created_by'];

     /**
     * The pages that belong to the Page
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_blocks','block_id' ,'page_id')->withTimeStamps();
    }

    public function createdBy()
    {
        return $this->hasOne(User::class,'id','created_by');
    }
}
