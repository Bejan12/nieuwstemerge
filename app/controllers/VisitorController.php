<?php
require_once '../app/models/Visitor.php';

class VisitorController {
    public function index() {
        $filter_destination = $_GET['destination'] ?? '';
        $destinations = ["Parijs", "Rome", "New York", "Berlijn", "Londen", "Amsterdam", "Barcelona", "Tokyo", "Madrid", "Dubai", "Sydney"];

        $visitors = Visitor::getAll();
        $filtered_visitors = array_filter($visitors, function ($visitor) use ($filter_destination) {
            return empty($filter_destination) || $visitor['destination'] === $filter_destination;
        });

        require_once '../app/views/visitors.php';
    }
}
?>
