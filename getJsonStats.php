<?php
header('Content-Type: application/json');

$file = $_GET['file'] ?? '';

switch ($file) {
    case 'Race':
        echo json_encode(['races' => json_decode(file_get_contents('./json/Race.json'), true)]);
        break;
    case 'Role':
        echo json_encode(['roles' => json_decode(file_get_contents('./json/Role.json'), true)]);
        break;
    case 'Arme':
        echo json_encode(['armes' => json_decode(file_get_contents('./json/Arme.json'), true)]);
        break;
    default:
        echo json_encode(['error' => 'Invalid file parameter']);
        break;
}
?>