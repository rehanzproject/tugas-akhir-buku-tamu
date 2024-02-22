<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $signatureData = $_POST['signature']; // Assuming it's base64-encoded image data
  // Decode base64 data
  $decodedSignature = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));
  // Save the image to a file
  $filename = 'signature_' . uniqid() . '.png'; // Generate a unique filename
  file_put_contents('signatures/' . $filename, $decodedSignature);
  echo 'Signature saved successfully';
} else {
  http_response_code(405); // Method Not Allowed
  echo 'Only POST requests are allowed';
}
?>
