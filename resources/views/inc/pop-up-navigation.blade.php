<div class="close-pop-up-content p-2 absolute top-1 right-0 text-gray-400
cursor-pointer rounded-full hover:transition-all duration-300
hover:bg-blue-100 hover:text-purple-500">
    <svg
        class="w-5 h-5"
        fill="currentColor"
        viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg"
    >
        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
    </svg>
</div>

<div class="mb-4 border-b border-gray-200 px-4">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center"
        id="myTab"
        data-tabs-toggle="#myTabContent"
        role="tablist"
    >
        <li class="mr-2" role="presentation">
            <button
                class="inline-block p-4 border-b-2 rounded-t-lg text-slate-900"
                id="profile-tab{{ $loop->iteration }}"
                data-tabs-target="#profile{{ $loop->iteration }}"
                type="button"
                role="tab"
                aria-controls="profile{{ $loop->iteration }}"
                aria-selected="false"
            >
                Контент
            </button>
        </li>
        <li class="mr-2" role="presentation">
            <button
                class="inline-block p-4 border-b-2 border-transparent rounded-t-lg
                hover:text-gray-600 hover:border-gray-300 text-slate-900"
                id="dashboard-tab{{ $loop->iteration }}"
                data-tabs-target="#dashboard{{ $loop->iteration }}"
                type="button"
                role="tab"
                aria-controls="dashboard{{ $loop->iteration }}"
                aria-selected="false"
            >
                Дизайн
            </button>
        </li>
    </ul>
</div>
