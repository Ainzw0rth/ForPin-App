<?

// echo "hai";
require '../app/models/Premium_model.php';
require '../app/core/Database.php';
require_once '../app/config/config.php';


$data = json_decode(file_get_contents('php://input'), true);
$premiumModel = new Premium_model();    

try {
    $premiumModel->updatePremiumStatus($data['creator_id'], $data['$status']);
    http_response_code(201);
} catch (Exception $e) {
    http_response_code($e->getCode());
}