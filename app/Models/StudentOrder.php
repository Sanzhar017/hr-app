<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class employeeOrder extends Model
{
  use HasFactory;
  protected $guarded = [];

  protected $fillable = [
    'employee_id',
    'order_type_id',
    'order_number',
    'order_date',
    'title',
    'old_status_id',
    's_status_id',
  ];
  protected $table = 'employees_orders';


  public function employee(): BelongsTo
  {
    return $this->belongsTo(Employee::class);
  }

  public function orderType(): BelongsTo
  {
    return $this->belongsTo(OrderType::class);
  }

  public function oldStatus(): BelongsTo
  {
    return $this->belongsTo(Status::class, 'old_status_id');
  }

  public function currentStatus(): BelongsTo
  {
    return $this->belongsTo(Status::class, 's_status_id');
  }


}
