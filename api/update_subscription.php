<?

require '../app/models/Subscription_model.php';
require '../app/core/Database.php';
require_once '../app/config/config.php';

$data = json_decode(file_get_contents('php://input'), true);
$subscriptionModel = new Subscription_model();

try {
    $subscriptionModel->updateSubscriptionStatus($data['creator_id'], $data['subscriber_id'], $data['$status']);
} catch (Exception $e) {
    http_response_code($e->getCode());
}