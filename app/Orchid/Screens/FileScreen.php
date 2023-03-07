<?php

namespace App\Orchid\Screens;

use App\Models\File;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class FileScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return ['file' => File::filters()->latest()->paginate(50)];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'File Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::table('file', [
                TD::make('id')->sort(),
                TD::make('chunks')->sort(),
                TD::make('size')->sort(),
                TD::make('duration')->sort(),
                TD::make('url')->sort()->filter(Input::make()),
                TD::make('country_code')->sort(),
                TD::make('ip')->sort(),
                TD::make('success')->sort(),
                TD::make('created_at')->sort(),
            ]),
            ];
    }
}
