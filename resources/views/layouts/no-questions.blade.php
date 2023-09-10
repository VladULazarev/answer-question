@extends('layouts.layout')

@section('content')
<div class="max-w-[600px] mx-auto">

    <h1 class="inline-block text-4xl font-semibold md:ml-8 sm:ml-4 ml-0">
        <span class="text-purple-700">Д</span>обавить вопрос</h1>

    <div class="sm:p-4 md:p-6 lg:p-8 mt-8">

        <div class="add-question-form mt-6">
            <form>
                @csrf
                <label class="block mb-2">
                    <input
                        type="text"
                        class="text-sm text-gray-500 px-2 py-1 mt-1 mb-6 block w-full
                        rounded-md bg-gray-200 border-transparent focus:border-gray-500 focus:ring-0"
                        name="question_text"
                        id="question_text"
                        maxlength="250"
                        placeholder="Добавить вопрос">
                </label>

                <div class="errors text-sm text-purple-600 mb-2 question-error"></div>

                <div class="flex">
                    <button class="add-question
                        text-white bg-sky-600 hover:transition-all duration-100 hover:bg-sky-700 duration-100
                        focus:ring-4 focus:outline-none
                        focus:ring-blue-200 font-medium rounded-lg text-sm w-full
                        px-3 py-1 text-center"
                    >
                        Добавить вопрос
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

