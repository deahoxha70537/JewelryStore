<?php
// DashboardController.php
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

        // Sigurohemi që `$contacts` nuk është null
        if (!is_array($contacts)) {
            $contacts = [];
        }

        include 'DashboardView.php';
    }
}

// Inicimi i DashboardController
$dashboard = new DashboardController();
$dashboard->showDashboard();
?>
