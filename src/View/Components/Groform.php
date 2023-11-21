<?php

namespace Sauruz\Groform\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use Sauruz\Groform\Groform as GroformService;

class Groform extends Component
{

    public $buttons = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string|array $form, public $model = null, public ?string $action = null, public string $method = 'POST')
    {
        if(is_string($form)) {
            $this->form = GroformService::form($this->form);
        }

        $this->buttons = [
            'submit' => $this->form['buttons']['submit'] ?? __('Submit'),
            'save' => $this->form['buttons']['save'] ?? __('Save'),
            'cancel' => $this->form['buttons']['cancel'] ?? __('Cancel'),
            'edit' => $this->form['buttons']['edit'] ?? __('Edit'),
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(View::exists('vendor.groform.groform')) {
            return view('vendor.groform.groform');
        } else {
            return view('groform::groform.groform');
        }

    }
}
