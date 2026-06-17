<?php
error_reporting(0);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$api_key = "AIzaSyBMtYxXxFjtDuFoo1PX31z8JvKY3C2kPck"; 
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent?key=" . $api_key;

$input = json_decode(file_get_contents("php://input"), true);
$user_message = isset($input['message']) ? trim($input['message']) : '';

if (empty($user_message)) {
    echo json_encode(['response' => 'Pesan tidak boleh kosong.']);
    exit;
}

$system_prompt = <<<EOT
Kamu adalah chatbot resmi SDN 145 Maluku Tengah.

Jawab dengan ramah, singkat, dan jelas.
Gunakan bahasa yang mudah dipahami siswa.

Jika user menyapa, cukup jawab:
"Halo! 👋 Saya asisten SDN 145 Maluku Tengah. 

Silakan tanya 😊"

Jangan tampilkan menu atau daftar pilihan dalam jawaban.
EOT;

$full_text = $system_prompt . "\n\nPertanyaan: " . $user_message;

// Struktur JSON untuk Gemini
$data = [
    "contents" => [
        [
            "parts" => [
                ["text" => $full_text]
            ]
        ]
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200) {
    echo json_encode(['response' => "Gagal (Error $http_code). Cek API Key atau kuota."]);
    exit;
}

$response_data = json_decode($response, true);
$ai_response = $response_data['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf, sedang tidak bisa menjawab.";

echo json_encode(['response' => trim($ai_response)]);