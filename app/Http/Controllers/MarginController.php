<?php

namespace App\Http\Controllers;

use App\Models\Margin;

class MarginController extends Controller
{
    /**
     * Обновить отступ сверху для эелемента '.question-text'
     * @see 'resources/views/layouts/home.blade.php' line 29
     * @return string
     */
    public function updateTop(): string
    {
        request()->validate([
            'top' => 'bail|required|string|min:1|max:1'
        ]);

        Margin::where('id', 1)->update(['mr_t' => request('top')]);

        return 'ok';
    }

    /**
     * Обновить отступ снизу для эелемента '.question-text'
     * @see 'resources/views/layouts/home.blade.php' line 29
     * @return string
     */
    public function updateBottom(): string
    {
        request()->validate([
            'bottom' => 'bail|required|string|min:1|max:1'
        ]);

        Margin::where('id', 1)->update(['mr_b' => request('bottom')]);

        return 'ok';
    }
}
