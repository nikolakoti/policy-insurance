<?php

require_once __DIR__ . '/models/DB.php';
require_once __DIR__ . '/models/PolicyHolder.php';
require_once __DIR__ . '/models/Insurer.php';
require_once __DIR__ . '/pdf/PDF.php';

$formData = [
    "name" => '',
    "surname" => '',
    "email" => '',
    "phone" => '',
    "policy" => '',
    "departure_date" => '',
    "return_date" => ''
];



$formErrors = [];

$successMessage = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["name"])) {

        $formData["name"] = trim($_POST["name"]);
    } else {

        $formErrors["name"][] = "First name is required!";
    }

    if (!empty($_POST["surname"])) {

        $formData["surname"] = trim($_POST["surname"]);
    } else {

        $formErrors["surname"][] = "Last name is required!";
    }

    if (!empty($_POST["email"])) {

        $formData["email"] = trim($_POST["email"]);
    } else {

        $formErrors["email"][] = "Email is required!";
    }

    if (!empty($_POST["phone"])) {

        $formData["phone"] = trim($_POST["phone"]);
    } else {

        $formErrors["phone"][] = "Phone is required!";
    }

    if (!empty($_POST["policy"])) {

        $formData["policy"] = trim($_POST["policy"]);
    } else {

        $formErrors["policy"][] = "Choose type of travel!";
    }

    if (!empty($_POST["departure_date"])) {

        $formData["departure_date"] = trim($_POST["departure_date"]);
    } else {

        $formErrors["departure_date"][] = "Departure date is required!";
    }

    if (!empty($_POST["return_date"])) {

        $formData["return_date"] = trim($_POST["return_date"]);
    } else {

        $formErrors["return_date"][] = "Return date is required!";
    }




    if (empty($formErrors)) {

        if ($formData['policy'] == 'group') {

            $policyHolder = new PolicyHolder;

            $lastId = $policyHolder->insert(
                    $formData['name'], 
                    $formData['surname'], 
                    $formData['email'], 
                    $formData['phone'], 
                    $formData['policy'], 
                    $formData['departure_date'], 
                    $formData['return_date']);

            $insurer = new Insurer;

            $insurer->update($lastId);
            
            $pdf = new PDF();

            $pdf->send($lastId, 
                    $formData['name'], 
                    $formData['surname'], 
                    $formData['email'], 
                    $formData['phone'], 
                    $formData['policy'], 
                    $formData['departure_date'], 
                    $formData['return_date']);
            
            $successMessage = 'You have successfully paid the insurance';
            
            
        } else {


            $policyHolder = new PolicyHolder;

            $lastId = $policyHolder->insert(
                    $formData['name'], 
                    $formData['surname'], 
                    $formData['email'], 
                    $formData['phone'], 
                    $formData['policy'], 
                    $formData['departure_date'], 
                    $formData['return_date']);

            $pdf = new PDF();

            $pdf->send($lastId, 
                    $formData['name'], 
                    $formData['surname'], 
                    $formData['email'], 
                    $formData['phone'], 
                    $formData['policy'], 
                    $formData['departure_date'], 
                    $formData['return_date']);
            
            $successMessage = 'You have successfully paid the insurance';
        }
    }
}




require_once __DIR__ . '/views/layout/header.php';

require_once __DIR__ . '/views/content/form-content.php';

require_once __DIR__ . '/views/layout/footer.php';

