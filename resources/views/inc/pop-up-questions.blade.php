@foreach($questions as $question)

    <div class="font-medium mb-3">Вопрос {{ $loop->iteration }}</div>

    <form class="question-form mb-4">
        @csrf
        <label class="block mb-6">
            <span class="font-medium text-sm">Вопрос</span>
            <input
                type="text"
                class="text-sm text-gray-500 px-2 py-1 mt-1
                block w-full rounded-md bg-gray-100 border-transparent
                focus:border-gray-500 focus:ring-0"
                name="question_text_{{ $question->question_id }}"
                id="question_text_{{ $question->question_id }}"
                maxlength="250"
                value="{{ $question->question_text }}"
            >
        </label>

        <div class="errors text-sm text-purple-600
            question-error-{{ $question->question_id }}">
        </div>

        <div class="flex mb-4 px-1">
            <button class="update-question
                text-white bg-sky-600 hover:transition-all duration-100
                hover:bg-sky-700 focus:ring-4 focus:outline-none
                focus:ring-blue-200 font-medium rounded-lg text-sm w-full
                px-3 py-1 text-center mr-1"
                id = "{{ $question->question_id }}"
            >
                Сохранить
            </button>

            <button class="delete-question
                text-white bg-purple-600 hover:transition-all duration-100
                hover:bg-purple-800 focus:ring-4 focus:outline-none
                focus:ring-purple-200 font-medium rounded-lg text-sm w-full
                px-3 py-1 text-center ml-1"
                id = "{{ $question->question_id }}"
            >
                Удалить
            </button>
        </div>
    </form>

<form class="answer-form mb-6 border-b border-gray-200 pb-5">
    <label class="block mb-6">
        <span class="font-medium text-sm">Ответ</span>
        <textarea
            class="text-sm text-gray-500 px-2 py-1 mt-1 block w-full rounded-md
            bg-gray-100 border-transparent focus:border-gray-300 focus:ring-0 mb-4"
            name="answer_text_{{ $question->answer->answer_id ?? $question->question_id }}"
            id="answer_text_{{ $question->answer->answer_id ?? $question->question_id }}"
            maxlength="500"
            rows="3">{{ $question->answer->answer_text ?? 'Напишите ответ и нажмите кнопку "Сохранить"' }}
        </textarea>
    </label>

    <div class="errors text-sm text-purple-600 mb-2
        answer-error-{{ $question->answer->answer_id ?? $question->question_id }}">
    </div>

    <div class="flex">
        <button class="
        {{ ! isset($question->answer->answer_id) ? 'add-answer' : 'update-answer'}}
            text-white bg-sky-600 hover:transition-all duration-100 hover:bg-sky-700
            focus:ring-4 focus:outline-none focus:ring-blue-200
            font-medium rounded-lg text-sm w-full
            px-3 py-1 text-center mr-1"
            id="{{ $question->answer->answer_id ?? $question->question_id }}"
        >
            Сохранить
        </button>

        <button class="delete-answer
            text-white bg-purple-600 hover:transition-all duration-100 hover:bg-purple-800
            focus:ring-4 focus:outline-none focus:ring-purple-200
            font-medium rounded-lg text-sm w-full
            px-3 py-1 text-center ml-1"
            {{ ! isset($question->answer->answer_id) ? 'disabled' : ''}}
            id="{{ $question->answer->answer_id ?? ''}}"
        >
            Удалить
        </button>
    </div>
</form>
@endforeach
