<?php
require_once '../app/models/Customer.php';

class CustomerController {
    public function index() {
        $search_lastname = $_GET['search'] ?? '';
        $customers = Customer::getAll();

        $filtered_customers = array_filter($customers, function ($customer) use ($search_lastname) {
            return empty($search_lastname) || stripos($customer['last_name'], $search_lastname) !== false;
        });

        require_once '../app/views/customers.php';
    }
}
?>
