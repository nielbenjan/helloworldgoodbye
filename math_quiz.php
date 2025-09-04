<?php
session_start();

// Always generate new question if any session variable is missing
if (!isset($_SESSION['num1']) || !isset($_SESSION['num2']) || !isset($_SESSION['op'])) {
    $_SESSION['num1'] = rand(1, 10);
    $_SESSION['num2'] = rand(1, 10);
    $operators = ['+', '-', '*'];
    $_SESSION['op'] = $operators[array_rand($operators)];
}

// Calculate correct answer
switch ($_SESSION['op']) {
    case '+':
        $correct = $_SESSION['num1'] + $_SESSION['num2'];
        break;
    case '-':
        $correct = $_SESSION['num1'] - $_SESSION['num2'];
        break;
    case '*':
        $correct = $_SESSION['num1'] * $_SESSION['num2'];
        break;
}

// Check answer if form submitted
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_answer = intval($_POST['answer']);
    if ($user_answer === $correct) {
        $message = "Correct! Well done.";
        // Generate new question
        unset($_SESSION['num1'], $_SESSION['num2'], $_SESSION['op']);
        header("Refresh:1");
        exit; // Stop further execution to prevent errors
    } else {
        $message = "Incorrect. Try again!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Math Quiz</title>
</head>
<body>
    <h2>Math Quiz</h2>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <form method="post">
        <label>
            What is <?php echo $_SESSION['num1'] . " " . $_SESSION['op'] . " " . $_SESSION['num2']; ?>?
            <input type="number" name="answer" required>
        </label>
        <button type="submit">Submit</button>
    </form>
</body>
</html>