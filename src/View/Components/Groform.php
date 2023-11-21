<?php

namespace Gromatics\Groform\View\Components;

use Illuminate\View\Component;
use Gromatics\Groform\Groform as GroformService;

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
        return view('groform::groform.groform');
    }
}
