<div class="show-add-question-form flex mt-8 cursor-pointer">
    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 0 50 50" xml:space="preserve"
         width="24px" height="24px" fill="#000000">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.3"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#4aa2d9;" cx="25" cy="25" r="25"></circle> <line style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" x1="25" y1="13" x2="25" y2="38"></line> <line style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" x1="37.5" y1="25" x2="12.5" y2="25"></line> </g>
    </svg>
    <div class="group text-sm text-sky-500 font-medium ml-4
        hover:transition-all duration-100 hover:text-gray-800"
    >
        Добавить вопрос
        <i class="fa fa-angle-down align-middle text-sky-400 ml-2
        hover:transition-all duration-100 group-hover:text-gray-800"></i>
    </div>
</div>

<div class="add-question-form hidden mt-6">
    <form>
        <label class="block mb-2">
            <span class="font-medium text-sm">
                Вопрос
            </span>
            <input
                type="text"
                class="text-sm text-gray-500 px-2 py-1 mt-1 mb-6 block w-full
                rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:ring-0"
                name="question_text"
                id="question_text"
                maxlength="250"
                placeholder="Добавить вопрос">
        </label>

        <div class="errors text-sm text-purple-600 question-error mb-2"></div>

        <div class="flex">
            <button class="add-question
                text-white bg-sky-600 hover:transition-all duration-100
                hover:bg-sky-700 focus:ring-4 focus:outline-none
                focus:ring-blue-200 font-medium rounded-lg text-sm w-full
                px-3 py-1 text-center mr-1"
            >
                Добавить вопрос
            </button>
        </div>
    </form>
</div>

