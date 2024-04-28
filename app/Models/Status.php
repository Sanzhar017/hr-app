<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

  public function orderTypes() : HasMany
  {
    return $this->hasMany(OrderType::class, 'status_id');
  }

  public function students() : HasMany
  {
    return $this->hasMany(Student::class, 'status_id');
  }

  public function studentOrdersOldStatus() : HasMany
  {
    return $this->hasMany(StudentOrder::class, 'old_status_id');
  }

  public function studentOrdersCurrentStatus() :HasMany
  {
    return $this->hasMany(StudentOrder::class, 'status_id');
  }

}
