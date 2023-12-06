<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style13.css">
    <title>Payment</title>
    <link rel="shorcut icon" type="image" href="./IMG/Logo.png" />
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
              $conn = mysqli_connect("localhost", "root", "", "foundationforge", 8111);

              include("./php/config.php");

              function cart($data)
            {
                global $conn;
                $email = $data["email"];
                $phone = $data["phone"];
                $class = $data["class"];
                $payment_method = $data["payment_method"];

                mysqli_query($conn, "INSERT INTO cart (id, email, phone, class, payment_method) VALUES (NULL, '$email', '$phone', '$class', '$payment_method')");

                return mysqli_affected_rows($conn);
            }


            if (isset($_POST["submit"])) {
                    if (cart($_POST) > 0) {
                        echo "<script>
                        alert('Thank you for your purchase.');
                        document.location.href='Index.php';
                        </script>";
                    } else {
                        echo mysqli_error($conn);
                    }
            }
            
            ?>
        <header>Payment</header>
        <form action="cart1.php" method="post">
        <div class="payment">
            <div class="container">
            <div class="content">
                <form action="cart.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-box">
                    <span class="details">Phone</span>
                    <input type="text" name="phone" placeholder="Phone number" required>
                    </div>
                </div>
                <div class="class-details">
                    <span class="class-title">Class</span>
                    <div class="category">
                    <input type="radio" name="class" value="1" id="dot-1">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="class">Python</span>
                    </label>
                    <input type="radio" name="class" value="2" id="dot-2">
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="class">Machine Learning</span>
                    </label>
                    <input type="radio" name="class" value="3" id="dot-3">
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="class">Data Visualization</span>
                    </label>
                    <br>
                    <input type="radio" name="class" value="4" id="dot-4">
                    <label for="dot-4">
                        <span class="dot four"></span>
                        <span class="class">Computer Vision</span>
                    </label>
                    <input type="radio" name="class" value="5" id="dot-5">
                    <label for="dot-5">
                        <span class="dot five"></span>
                        <span class="class">Deep Learning</span>
                    </label>
                    <input type="radio" name="class" value="6" id="dot-6">
                    <label for="dot-6">
                        <span class="dot six"></span>
                        <span class="class">SQL</span>
                    </label>
                    </div>
                </div>

                <div class="payment-details">
                    <span class="payment-title">Payment</span>
                    <div class="category">
                    <input type="radio" name="payment_method" value="1" id="dot-12">
                    <label for="dot-12">
                        <span class="dot twelve"></span>
                        <span class="payment">Mandiri</span>
                    </label>
                    <input type="radio" name="payment_method" value="2" id="dot-13">
                    <label for="dot-13">
                        <span class="dot thirteen"></span>
                        <span class="payment">Gopay</span>
                    </label>
                    <input type="radio" name="payment_method" value="3" id="dot-14">
                    <label for="dot-14">
                        <span class="dot fourteen"></span>
                        <span class="payment">Dana</span>
                    </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Checkout">
                </div>
                </form>
            </div>
            </div>
            </div>
                </form>
            </div>
        </div>
</body>
</html>