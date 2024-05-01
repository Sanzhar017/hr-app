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

  public function employees() : HasMany
  {
    return $this->hasMany(Employee::class, 'status_id');
  }

  public function employeeOrdersOldStatus() : HasMany
  {
    return $this->hasMany(employeeOrder::class, 'old_status_id');
  }

  public function employeeOrdersCurrentStatus() :HasMany
  {
    return $this->hasMany(employeeOrder::class, 'status_id');
  }

}
