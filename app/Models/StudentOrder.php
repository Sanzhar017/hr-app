<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentOrder extends Model
{
  use HasFactory;
  protected $guarded = [];

  protected $fillable = [
    'student_id',
    'order_type_id',
    'order_number',
    'order_date',
    'title',
    'old_status_id',
    's_status_id',
  ];
  protected $table = 'students_orders';


  public function student(): BelongsTo
  {
    return $this->belongsTo(Student::class);
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
