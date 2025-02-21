<?php

class Overzichten extends BaseController
{
    public function index($firstname = NULL, $infix = NULL, $lastname = NULL)
    {
        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title' => 'Overzichten',
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view
         * aangeroepen met de informatie uit het $data-array
         */
        $this->view('overzichten/index', $data);
    }
}