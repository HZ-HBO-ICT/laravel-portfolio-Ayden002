<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'test_name', 'best_grade'];

    public function path()
    {
        return route('grades.show', $this);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function addGrade($grade)
    {
        if ($this->best_grade == null || $this->best_grade < $grade) {
            $this->best_grade = $grade;
        }

        $this->save();
        $course = Course::find($this->course_id);
        $grades = Grade::where('course_id', $course->id)->get();

        foreach ($grades as $g) {
            if ($g->best_grade < $course->lowest_passing_grade) {
                dd($g->best_grade);
            }
        }
        $course->assignCredits($grade);
    }
}
