<?php
require_once 'ContactController.php';

class DashboardController
{
    private $contactController;

    public function __construct()
    {
        $this->contactController = new ContactController(); 
    }

    public function getContacts()
    {
        return $this->contactController->getAllContacts();
    }

    public function showDashboard()
    {
        $contacts = $this->getContacts();


        if (!is_array($contacts)) {
            $contacts = [];
        }

        include 'DashboardView.php';
    }
}

$dashboard = new DashboardController();
$dashboard->showDashboard();
?>
