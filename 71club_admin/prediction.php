<?php
include("conn.php");  // Database connection (@DEVELOPERHARSHIL)

$botToken = "7598291183:AAHyW2-EIxjVb2d9PdbOHNNGdAA8A46OuyA";  
$chatId = "@autoprediction";  

// Fetch the latest Period ID (@DEVELOPERHARSHIL)
$query = "SELECT atadaaidi FROM gelluonduhogu_drei ORDER BY kramasankhye DESC LIMIT 1";
$result = $conn->query($query);
$periodData = mysqli_fetch_assoc($result);
$periodId = $periodData['atadaaidi'] ?? "Not Found";

// Investment multipliers (1x to 10x) (@DEVELOPERHARSHIL)
$investmentMultipliers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$investment = $investmentMultipliers[array_rand($investmentMultipliers)] * 100; // Convert to amount

// Load session tracking (@DEVELOPERHARSHIL)
$sessionFile = "prediction_session.json";
$sessionData = file_exists($sessionFile) ? json_decode(file_get_contents($sessionFile), true) : ['total' => 0, 'wins' => 0, 'losses' => 0];

// Get current round within 10 rounds cycle (@DEVELOPERHARSHIL)
$gameRound = $sessionData['total'] % 10;

// Ensure exactly 2 wins per 10 rounds (@DEVELOPERHARSHIL)
$winRounds = [rand(3, 6), rand(7, 9)]; // Choose two random rounds for wins
$shouldWin = in_array($gameRound, $winRounds);

// Generate a prediction (@DEVELOPERHARSHIL)
$randomNumbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
$prediction = $randomNumbers[array_rand($randomNumbers)]; // Predict a random number

// Convert prediction to a color (@DEVELOPERHARSHIL)
$predictedColor = ($prediction % 2 == 0) ? "🟥 *Red*" : "🟩 *Green*";

// Ensure the result is **opposite** of the prediction (to make it a loss) (@DEVELOPERHARSHIL)
if (!$shouldWin) {  
    // Opposite color for loss (@DEVELOPERHARSHIL)
    $resultColor = ($predictedColor == "🟥 *Red*") ? "🟩 *Green*" : "🟥 *Red*";  
} else {  
    // Match prediction for a win (@DEVELOPERHARSHIL)  
    $resultColor = $predictedColor;
}

// Update win/loss tracking (@DEVELOPERHARSHIL)
$sessionData['total']++;
if ($shouldWin) {
    $sessionData['wins']++;
} else {
    $sessionData['losses']++;
}
file_put_contents($sessionFile, json_encode($sessionData));

// Save result internally (without showing it to users) (@DEVELOPERHARSHIL)
$checkQuery = "SELECT * FROM hastacalita_phalitansa_drei WHERE sthiti='1'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    $updateQuery = "UPDATE hastacalita_phalitansa_drei SET sankhye='$prediction', sthiti='1' WHERE sthiti='1'";
} else {
    $updateQuery = "INSERT INTO hastacalita_phalitansa_drei (sankhye, sthiti) VALUES ('$prediction', '1')";
}
$conn->query($updateQuery);

// Construct message with **ONLY prediction & investment** (@DEVELOPERHARSHIL)
$message = "🎯 *WinGo 3 Minute Game Prediction*  (@DEVELOPERHARSHIL)\n"
         . "📅 *Period:* $periodId  (@DEVELOPERHARSHIL)\n"
         . "🔮 *Prediction:* $predictedColor  (@DEVELOPERHARSHIL)\n"
         . "💰 *Investment:* ${investment}₹  (@DEVELOPERHARSHIL)\n"
         . "⏳ *Next Prediction in 3 Minutes!*\n"
         . "📢 *Powered by* @DEVELOPERHARSHIL 🚀";

// Send to Telegram (@DEVELOPERHARSHIL)
$message = urlencode($message);
$url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message&parse_mode=Markdown";
$response = file_get_contents($url);

// Status message (@DEVELOPERHARSHIL)
if ($response) {
    echo "Message sent successfully! (@DEVELOPERHARSHIL)";
} else {
    echo "Failed to send message! (@DEVELOPERHARSHIL)";
}
?>
