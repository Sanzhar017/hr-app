<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'surname','email', 'phone_number', 'date_of_birth', 'nationality','job_title', 'status_id', 'department_id'];

  public function status() : BelongsTo
  {
    return $this->belongsTo(Status::class);
  }

  public function employeeOrders() :HasMany
  {
    return $this->hasMany(employeeOrder::class, 'employee_id');

  }

  public function paginateWithQueryString($perPage)
  {
    return $this->paginate($perPage)->withQueryString();
  }

  public function  createemployee(array $data)
  {
    return $this->create($data);
  }

  public function updateemployee(array $data)
  {
    $this->update($data);
  }

  public function destroyemployee($employee)
  {
    $employee = $this->findOrFail($employee);
    $employee->delete();
  }
  public function department()
  {
    return $this->belongsTo(Department::class, 'department_id');
  }

}
