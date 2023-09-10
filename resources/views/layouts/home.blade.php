@extends('layouts.layout')

@section('content')

<h1 class="inline-block
    text-4xl font-semibold
    max-w-[1140px] mx-auto
    md:ml-8 sm:ml-4 ml-0"><span class="text-purple-700">О</span>тветы на вопросы</h1>

<div class="grid md:grid-cols-2 sm:grid-cols-1 gap-12 sm:p-4 md:p-6 lg:p-8 mt-8 mb-24">

    @foreach($data as $date => $questions)

        <div class="relative">

            {{-- Дата --}}
            <div class="date text-gray-500 font-semibold mb-2">
                {{ $date }}
            </div>

            {{-- Блок с вопросами --}}
            <div class="relative grey-box bg-white pt-6 pb-4 lg:px-12
                sm:px-8 px-6 rounded-xl shadow-lg"
            >

                <h3 class="font-semibold text-2xl mb-4"><span class="text-purple-700">О</span>тветы на вопросы</h3>
                @foreach($questions as $question)

                    <div class="question-text group font-medium
                        hover:transition-all duration-300
                        xl:hover:text-sky-500
                        transform xl:hover:translate-x-1

                        mt-{{ $margins[0]->mr_t * 4 }}
                        mb-{{ $margins[0]->mr_b * 4 }}
                        cursor-pointer"
                    >
                        {{ $question->question_text }}
                        <i class="fa fa-angle-down align-middle text-sky-400
                        ml-2 hover:transition-all duration-100 transform
                        group-hover:text-emerald-500"></i>
                    </div>

                    <div class="answer-text hidden mb-4">
                        <p class="text-sm text-gray-500 px-3 py-2 mt-1 rounded-md bg-gray-100">
                            {{ $question->answer->answer_text ?? 'Ответа пока нет.' }}
                        </p>
                    </div>
                @endforeach
            </div>

            {{-- Точки серого блока --}}
            <div class="show-pop-up-content absolute top-10 right-2 w-6
                opacity-70 rounded-full hover:bg-blue-200 hover:transition-all
                duration-300 transform hover:scale-110
                cursor-pointer" title="Редактировать или добавить вопрос"
            >
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <g><path d="M3 12c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm9 2c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm7 0c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"></path></g>
                </svg>
            </div>

            {{--  Pop Up Блок --}}
            <div class="pop-up-content hidden absolute max-h-[25rem]
                w-full top-0 right-0 z-10 bg-white shadow:sm rounded-xl
                overflow-auto overscroll-contain rounded-md shadow-md"
            >
                {{--  Навигация Pop Up --}}
                @include('inc.pop-up-navigation')

                {{-- Pop Up 'Контент' --}}
                <div id="myTabContent">
                    <div class="px-4 pb-4 mb-4 rounded-lg"
                         id="profile{{ $loop->iteration }}"
                         role="tabpanel"
                         aria-labelledby="profile-tab{{ $loop->iteration }}"
                    >
                        @include('inc.pop-up-questions')
                        @include('inc.add-question-form')
                    </div>

                    {{-- Pop Up 'Дизайн' --}}
                    @include('inc.pop-up-design')
                </div>
            </div>

        </div>
    @endforeach
</div>
@endsection

<style>
    * {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        -moz-tap-highlight-color: transparent;
    }
/* Полоса прокрутки для Pop Up контента */

    /* Для Mozilla */
    .pop-up-content, textarea {
        scrollbar-width: thin;
        scrollbar-color: #efefef;
    }

    /* Для всех остальных */
    .pop-up-content::-webkit-scrollbar {
        width: 4px;
    }

    .pop-up-content::-webkit-scrollbar-track {
        background: #efefef;
    }

    .pop-up-content::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 20px;
        border: 3px solid #ccc;
    }

    textarea::-webkit-scrollbar {
        width: 4px;
    }

    textarea::-webkit-scrollbar {
        background: #efefef;
    }

    textarea::-webkit-scrollbar {
        background-color: #ccc;
        border-radius: 20px;
        border: 3px solid #ccc;
    }
</style>
