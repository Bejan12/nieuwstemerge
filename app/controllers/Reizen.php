<?php

class Reizen extends BaseController
{
    private $reisModel;

    public function __construct()
    {
        $this->reisModel = $this->model('Reis');
    }

    public function index()
    {
        $bestemming = isset($_GET['bestemming']) ? trim($_GET['bestemming']) : '';
        $vertrekdatum = isset($_GET['vertrekdatum']) ? trim($_GET['vertrekdatum']) : '';

        if ($bestemming) {
            $reizen = $this->reisModel->zoekReizenOpBestemming($bestemming);
        } elseif ($vertrekdatum) {
            $reizen = $this->reisModel->zoekReizenOpVertrekdatum($vertrekdatum);
        } else {
            $reizen = $this->reisModel->getReizen();
        }

        $bestemmingen = $this->reisModel->getBestemmingen();
        $vertrekdatums = $this->reisModel->getVertrekdatums();

        $data = [
            'title' => 'Reizen overzicht',
            'reizen' => $reizen,
            'bestemming' => $bestemming,
            'vertrekdatum' => $vertrekdatum,
            'bestemmingen' => $bestemmingen,
            'vertrekdatums' => $vertrekdatums
        ];

        $this->view('reizen/index', $data);
    }
}