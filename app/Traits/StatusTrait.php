<?php
namespace App\Traits;

use App\Enum\Status;

trait StatusTrait {
    /**
     * check active 
     */
    public function scopeIsActive($query) {
        return $query->where('status', Status::Active);
    }
    
    /**
     * check inactive 
     */
    public function scopeIsInactive($query) {
        return $query->where('status', Status::Inactive);
    }
}