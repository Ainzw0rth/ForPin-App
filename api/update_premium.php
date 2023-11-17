<?

require '../app/models/Premium_model.php';
require '../app/core/Database.php';
require_once '../app/config/config.php';

$premiumModel = new Premium_model();
$data = json_decode(file_get_contents('php://input'), true);

echo $data['creator_username'];
echo $data['status'];
$result = $premiumModel->updatePremiumStatus($data['creator_username'], $data['status']);

if ($result) {
    echo "success";
} else {
    echo "failed";
}
