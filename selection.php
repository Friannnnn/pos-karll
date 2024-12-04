<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['dine-in'])) {
      $_SESSION['selection'] = "Dine-In";
      header("location: dashboard.php");
    } elseif (isset($_POST['take-out'])) {
      $_SESSION['selection'] = "Take-Out";
      header("location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Varela+Round&display=swap" rel="stylesheet"/>
</head>
<style>
    body {
    font-family: Karla, Arial, sans-serif;
  }

  .selection-container {
    border-radius: 10px;
    background-image: url(assets/2.jpg);
    background-position: center bottom;
    background-size: contain;
    background-repeat: no-repeat;
    margin-top: 15px;
    margin-left: 10px;
    margin-right: 10px;
    padding-top: 3px;
    padding-bottom: 3px;
    height: 95vh;
    text-align: center;

    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
  }

  .selection-buttons {
    display:flex;
  }

  .question {
    margin-top: 50px;
    margin-bottom: 50px;
    font-size: 45px;
    font-weight: 800;
    letter-spacing: -1px;
    color: saddlebrown;
  }

  .selection {
    display: flex;
    justify-content: center;
  }
  
  .dine-in,
  .take-out {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 15px;
    color: rgb(178, 137, 107);
    font-size: 25px;
    width: 40vh;
    height: 60vh;
    text-align: center;
    text-decoration: none;
    box-shadow: 0 -2px 8px rgba(139, 69, 19, 0.7);
    transition: opacity 0.5s ease;
  }

  .dine-in:hover {
      background-color: rgba(0, 0, 0, 0.3);
  }

  .take-out:hover {
      background-color: rgba(0, 0, 0, 0.3);
  }

  .or {
    margin: 10px;
    padding: 10px;
    margin-top: 195px;
    font-size: 30px;
    color: rgb(178, 137, 107);
  }
</style>
<body>
    <div class="selection-container">
        <h2 class="question">Would you like to</h2>
        <div class="selection">
            <form action="selection.php" method="post">
              <div class="selection-buttons">
                <button name="dine-in" class="dine-in"  type="submit">
                    <h2>Dine-In</h2>
                </button>
                <h3 class="or">or</h3>
                <button name="take-out" class="take-out" type="submit">
                    <h2>Take-Out</h2>
                </button>
              </div>
            </form>
        </div>
    </div>
</body>
</html>