<?php
$s='{ "data": { "resource_owner_id": "604156810", "resource_owner_type": "customer", "access_token": "97a7a863-9ad3-4deb-ae09-3c51f4eed757", "expires_in": 2592000, "refresh_token": "9599c7a4-042f-4df6-866d-5a7ba557e842", "scopes": [ "gojek:customer:transaction", "gojek:customer:readonly" ], "customer": { "id": "604156810", "name": "Gilang K", "phone": "+6281329441756", "signed_up_country": "ID", "country_code": "+62", "number": "81329441756", "email": "gilangkurniawant@gmail.com", "email_verified": true, "locale": "id", "facebook_connected": true, "chat_id": "8357ece3-e97a-4483-b32f-dc3351a3835f", "chat_token": "e24fc0d27d8d47ae54c5a1ae54a2e1c40b354a05" } }, "success": true, "errors": null }';

$x = json_encode($s);

echo json_decode($x);
?>