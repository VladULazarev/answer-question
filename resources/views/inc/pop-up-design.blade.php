<div class="hidden py-4 px-1 w-full rounded-lg"
     id="dashboard{{ $loop->iteration }}"
     role="tabpanel"
     aria-labelledby="dashboard-tab{{ $loop->iteration }}">

    <div class="text-sm font-semibold leading-6">

        <div class="flex items-stretch w-full text-center">
            <div class="flex-1 flex p-2 items-center justify-center">
                Отступ сверху
            </div>
            <div class="flex-1 flex items-center justify-center">
                Отступ снизу
            </div>
        </div>

        <div class="flex items-stretch w-full text-center">

            <div class="flex-1 flex gap-1 p-1 items-center justify-center">
                @for($i = 1; $i < 5; $i++)
                    <div class="margin-top flex-1 flex p-2 items-center
                    justify-center border-t-2
                    @if( $margins[0]->mr_t ==  $i) {{ 'border-blue-400 text-blue-400' }}
                    @else {{ 'border-gray-400' }}
                    @endif
                    hover:transition-all duration-100 hover:border-blue-400
                    hover:text-blue-400 cursor-pointer">
                        {{ $i }}
                    </div>
                @endfor
            </div>

            <div class="flex-1 flex gap-1 p-1 items-center justify-center">
                @for($i = 1; $i < 5; $i++)
                    <div class="margin-bottom flex-1 flex p-2 items-center
                    justify-center border-t-2
                    @if( $margins[0]->mr_b ==  $i) {{ 'border-blue-400 text-blue-400' }}
                    @else {{ 'border-gray-400' }}
                    @endif
                    hover:transition-all duration-100 hover:border-blue-400
                    hover:text-blue-400 cursor-pointer">
                        {{ $i }}
                    </div>
                @endfor
            </div>

        </div>
    </div>
</div>


