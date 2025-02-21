<?php
session_start();

class Homepages {
    public function __construct() {
        // Constructor kan leeg blijven
    }

    public function index() {
        $customers = [
            ["first_name" => "Jan", "last_name" => "Jansen", "contact" => "jan@mail.com", "purchase_history" => "Parijs, Rome"],
            ["first_name" => "Piet", "last_name" => "Peters", "contact" => "piet@mail.com", "purchase_history" => "New York"],
            ["first_name" => "Lisa", "last_name" => "Smit", "contact" => "lisa@mail.com", "purchase_history" => "Berlijn, Londen"]
        ];

        $destinations = ["Parijs", "Rome", "New York", "Berlijn", "Londen", "Amsterdam", "Barcelona", "Tokyo", "Madrid", "Dubai", "Sydney", "Kaapstad"];

        $visitors = [
            ["name" => "Kees", "destination" => "Parijs"],
            ["name" => "Anne", "destination" => "Rome"],
            ["name" => "Bram", "destination" => "New York"],
            ["name" => "Emma", "destination" => "Berlijn"],
            ["name" => "Sander", "destination" => "Londen"],
            ["name" => "Tessa", "destination" => "Amsterdam"],
            ["name" => "Johan", "destination" => "Barcelona"],
            ["name" => "Fleur", "destination" => "Tokyo"],
            ["name" => "Bas", "destination" => "Madrid"]
        ];

        // Landen zonder bezoekers (Unhappy scenario)
        $excluded_destinations = ["Dubai", "Sydney", "Kaapstad"];

        $search_lastname = $_GET['search'] ?? '';
        $filter_destination = $_GET['destination'] ?? '';

        $filtered_customers = array_filter($customers, function ($customer) use ($search_lastname) {
            return empty($search_lastname) || stripos($customer['last_name'], $search_lastname) !== false;
        });

        $filtered_visitors = array_filter($visitors, function ($visitor) use ($filter_destination) {
            return empty($filter_destination) || $visitor['destination'] === $filter_destination;
        });

        require_once '../app/views/homepages/index.php';
    }
}
?>
