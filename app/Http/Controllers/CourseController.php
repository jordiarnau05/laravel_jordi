<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::withCount('students')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Curs creat correctament.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load('students');
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Curs actualitzat correctament.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Curs eliminat correctament.');
    }

  
    public function exportCsv()
    {
        $courses = Course::with('students')->get();
        
        $filename = 'cursos_' . date('Y-m-d_H-i-s') . '.csv';
        $handle = fopen('php://output', 'w');
        
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        fprintf($handle, chr(0xEF).chr(0xBB).chr(0xBF));
        
        fputcsv($handle, ['ID Curs', 'Nom Curs', 'Descripció', 'Data Inici', 'Data Fi', 'ID Estudiant', 'Nom Estudiant']);
        
        foreach ($courses as $course) {
            if ($course->students->count() > 0) {
                foreach ($course->students as $student) {
                    fputcsv($handle, [
                        $course->id,
                        $course->name,
                        $course->description,
                        $course->start_date,
                        $course->end_date,
                        $student->id,
                        $student->name
                    ]);
                }
            } else {
                fputcsv($handle, [
                    $course->id,
                    $course->name,
                    $course->description,
                    $course->start_date,
                    $course->end_date,
                    '',
                    ''
                ]);
            }
        }
        
        fclose($handle);
        exit;
    }
}
