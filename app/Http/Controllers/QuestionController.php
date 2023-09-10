<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * @param QuestionRequest $request
     * @return string
     */
    public function store(QuestionRequest $request): string
    {
        $request->validated();

        Question::create([
            'question_text' => trim(request('question_text'))
        ]);

        return 'ok';
    }

    /**
     * Update the specified resource in storage.
     * @param QuestionRequest $request
     * @return string
     */
    public function update(QuestionRequest $request): string
    {
        $request->validated();

        Question::where('question_id', request('question_id'))->update([
            'question_text' => trim(request('question_text'))
        ]);

        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     * @return string
     */
    public function destroy(): string
    {
        Question::destroy( request('question_id') );
        return 'ok';
    }
}
