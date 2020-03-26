<?php

namespace App\Admin\Forms\Category;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Encore\Admin\Widgets\StepForm;

class CatergoryFr extends StepForm
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = 'Français';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        return $this->next($request->all());
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->html('Francais', __('Language'));
        $this->hidden('locale')
        ->default("fr")
        ->value("fr");
        $this->hidden('id');
        $this->text('name', __('Name'))->required()->rules('required|min:3');
        $this->text('slug', __('Slug'));
        $this->summernote("description", __('Description'));
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return parent::data();
    }
}
