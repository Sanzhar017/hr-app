<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status_id', 'department_id'];

  public function status() : BelongsTo
  {
    return $this->belongsTo(Status::class);
  }

  public function studentOrders() :HasMany
  {
    return $this->hasMany(StudentOrder::class, 'student_id');

  }

  public function paginateWithQueryString($perPage)
  {
    return $this->paginate($perPage)->withQueryString();
  }

  public function  createStudent(array $data)
  {
    return $this->create($data);
  }

  public function updateStudent(array $data)
  {
    $this->update($data);
  }

  public function destroyStudent($student)
  {
    $student = $this->findOrFail($student);
    $student->delete();
  }
  public function departments()
  {
    return $this->belongsToMany(Department::class);
  }

}
