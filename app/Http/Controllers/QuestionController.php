<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $query = Question::query();

        if ($category) {
            $query->where('category', $category);
        }

        $questions = $query->paginate(10);


        $categories = Question::select('category')->distinct()->pluck('category');
        return view('admin.Question.index', compact('questions', 'categories'));
    }

    public function create()
    {
        $parentQuestions = Question::all();
        return view('admin.Question.create', compact('parentQuestions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'type' => 'required|string|in:Dropdown,Checkbox,Radio,Textbox,Scale Table',
            'category' => 'required|string|in:Universal,Bekerja,Wiraswasta,Melanjutkan Pendidikan,Tidak Bekerja,Mencari Pekerjaan',
            'scale_min' => 'nullable|integer',
            'scale_max' => 'nullable|integer',
            'choices' => 'nullable|array',
            'scale_questions' => 'nullable|array',
            'parent_question_id' => 'nullable|exists:questions,id'
        ]);
    
        $formattedChoices = $request->choices
            ? collect($request->choices)->mapWithKeys(fn($item) => [$item => $item])->toArray()
            : null;
    
        Question::create([
            'question' => $request->question,
            'type' => $request->type,
            'category' => $request->category,
            'scale_min' => $request->scale_min,
            'scale_max' => $request->scale_max,
            'choices' => $formattedChoices ? json_encode($formattedChoices) : null,
            'scale_questions' => $request->scale_questions ? json_encode($request->scale_questions) : null,
            'parent_question_id' => $request->parent_question_id
        ]);
    
        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dibuat!');
    }
    

    public function edit(Question $question)
    {
        $parentQuestions = Question::where('id', '!=', $question->id)->get();
        return view('admin.Question.edit', compact('question', 'parentQuestions'));
    }

    public function update(Request $request, Question $question)
{
    $request->validate([
        'question' => 'required|string',
        'type' => 'required|string|in:Dropdown,Checkbox,Radio,Textbox,Scale Table',
        'category' => 'required|string|in:Universal,Bekerja,Wiraswasta,Melanjutkan Pendidikan,Tidak Bekerja,Mencari Pekerjaan',
        'scale_min' => 'nullable|integer',
        'scale_max' => 'nullable|integer',
        'choices' => 'nullable|array',
        'scale_questions' => 'nullable|array',
        'parent_question_id' => 'nullable|exists:questions,id'
    ]);

    $formattedChoices = $request->choices
        ? collect($request->choices)->mapWithKeys(fn($item) => [$item => $item])->toArray()
        : null;

    $question->update([
        'question' => $request->question,
        'type' => $request->type,
        'category' => $request->category,
        'scale_min' => $request->scale_min,
        'scale_max' => $request->scale_max,
        'choices' => $formattedChoices ? json_encode($formattedChoices) : null,
        'scale_questions' => $request->scale_questions ? json_encode($request->scale_questions) : null,
        'parent_question_id' => $request->parent_question_id
    ]);

    return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil diperbarui!');
}


    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
