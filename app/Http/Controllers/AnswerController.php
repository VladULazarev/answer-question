<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Margin;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Question::with('answer')
            ->latest('created_at')
            ->get()
            ->groupBy(function($date) {
                return $date->created_at->format('d-m-Y');
            });

        if (! $data->count() ) { return view('layouts.no-questions'); }

        $margins = Margin::select('mr_t', 'mr_b')->get();

        return view('layouts.home', compact('data', 'margins'));
    }

    /**
     * Store a newly created resource in storage.
     * @param AnswerRequest $request
     * @return string
     */
    public function store(AnswerRequest $request): string
    {
        $request->validated();

        Answer::create([
            'question_id' => request('question_id'),
            'answer_text' => trim(request('answer_text'))
        ]);

        return 'ok';
    }

    /**
     * Update the specified resource in storage.
     * @param AnswerRequest $request
     * @return string
     */
    public function update(AnswerRequest $request): string
    {
        $request->validated();

        Answer::where('answer_id', request('answer_id'))->update([
           'answer_text' => trim(request('answer_text'))
        ]);

        return 'ok';
    }

    /**
     * Remove the specified resource from storage.
     * @return string
     */
    public function destroy(): string
    {
        Answer::destroy( request('answer_id') );

        return 'ok';
    }
}
