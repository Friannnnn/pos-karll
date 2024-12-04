<?php
session_start();
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') { //if confirm is clicked this will run
    $orderItems = isset($_POST['orderItems']) ? $_POST['orderItems'] : [];
    $paymentMethod = isset($_POST['paymentMethod']) ? $_POST['paymentMethod'] : '';
    $totalPayment = isset($_POST['totalPayment']) ? $_POST['totalPayment'] : '';

    // put data into array for receipt
    $_SESSION['orderDetails'] = [
        'items' => $orderItems,
        'paymentMethod' => $paymentMethod,
        'totalPayment' => $totalPayment,
    ];

    header('Location: receipt.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&family=Varela+Round&display=swap" rel="stylesheet"/>
</head>
<style>
  body {
    font-family: Karla, Arial, sans-serif;
  }
  
  .container {
    display: flex;
    justify-content: flex-start;
  }
  
  .left {
    border-radius: 15px;
    padding-top: 20px;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    width: 300px;
    height: 92.5vh;
    color: saddlebrown;
    text-align: center;
    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
  }

  .left h2 {
    margin-bottom: 50px;
  }
  
  .img {
    border-radius: 25px;
    margin-top: 10px;
    margin-bottom: -20px;
    margin-left: 10px;
    margin-right: 10px;
    width: 190px;
    height: 130px;
    object-fit: cover;
  }

  .left h3 {
    font-size: 20px;
    font-weight: 700;
    cursor: pointer;
  }
 
  .mid {
    border-radius: 15px;
    padding-top: 10px;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    width: 70%;
    height: 93.9vh;
    color: saddlebrown;
    text-align: center;
    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
  }

  .mid::-webkit-scrollbar {
    display: none; 
  }

  .mid .header {
    margin-bottom: 50px;
  }

  .coffee-products, .bread-products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    margin: 10px;
  }

  .coffee-products h2, .bread-products h2 {
    margin: 0;
    font-size: 30px;
  }

  .coffee-products .add, .bread-products .add {
    margin-bottom: 20px;
  }

  .img2 {
    border-radius: 25px;
    margin-top: 10px;
    width: 220px;
    height: 220px;
    object-fit: cover;
  }
  
  .right {
    border-radius: 15px;
    padding-top: 10px;
    margin-top: 10px;
    margin-left: 10px;
    margin-right: 10px;
    width: 300px;
    height: 93.9vh;
    color: saddlebrown;
    text-align: center;
    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  #order-list {
    flex-grow: 1; 
    overflow-y: auto; 
  }

  .left, .mid, .right {
    background-image: url('assets/dash_bg.jpg');
    background-size: contain; 
    background-position: center bottom; 
    background-repeat: no-repeat;
  }

  .add, .cncl-btn, .cnfrm-btn, .rmv-btn {
    border-style: none;
    background-color: transparent;
    color: saddlebrown;
    border-radius: 10px;
    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
    cursor: pointer;
    transition: 0.3s;
    padding: 10px;
    text-align: center;
  }
  .cncl-btn, .cnfrm-btn {
  display: inline-block;
  width: auto;
  margin: 10px;
  padding: 12px 20px;
  border-radius: 8px;
  background-color: #d2a679;
  color: black;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0 0 6px rgba(139, 69, 19, 0.6);
  transition: all 0.3s ease;
  text-align: center;
}


.order-actions {
  margin-top: 170px;
    display: flex;
    justify-content: center; 
    gap: 20px; 
}

  .rmv-btn{
    margin: 10px 20px;
    padding: 12px 20px;
    margin-bottom: 45px;
    border: none;
    border-radius: 8px;
    background-color: #d2a679;
    color: black;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    box-shadow: 0 0 6px rgba(139, 69, 19, 0.6);
    transition: all 0.3s ease;
    width: calc(100% - 40px);
    max-width: 200px;
}

.cncl-btn:hover, .cnfrm-btn:hover, .rmv-btn:hover {
    background-color: #8b4513;
    color: white;
    box-shadow: 0 0 12px rgba(139, 69, 19, 0.8);
    transform: scale(1.05);
}



  .order-item {
    background-color: rgba(139, 69, 19, 0.1);
    padding: 10px;
    margin: 10px;
    border-radius: 10px;
    box-shadow: 0 0 4px rgba(139, 69, 19, 0.5);
  }

  .order-item p {
    margin: 0;
    font-size: 16px;
  }
</style>
<body>
<div class="container">
    <div class="left">
      <h2>Category</h2>
      <img class="img" src="assets/4.jpg" alt="Coffee">
      <h3>Coffee</h3>
      <img class="img" src="assets/5.jpg" alt="Bread">
      <h3>Bread</h3>
    </div>
    <div class="mid">      
      <h2 class="header">Selection</h2>
      <div class="coffee-products">
        <?php
        $coffeeQuery = "SELECT product_name, product_price FROM products WHERE category = 'Coffee'"; //seletcs product on coffee catehory
        $coffeeResult = $conn->query($coffeeQuery);
        if ($coffeeResult && $coffeeResult->num_rows > 0) {
            while ($row = $coffeeResult->fetch_assoc()) {
                echo '
                <div class="product" data-name="' . htmlspecialchars($row['product_name']) . '" data-price="' . number_format($row['product_price'], 2) . '">
                    <img class="img2" src="assets/4.jpg" alt="Coffee">
                    <h2>' . htmlspecialchars($row['product_name']) . '</h2>
                    <div class="price">₱' . number_format($row['product_price'], 2) . '</div>
                </div>';
            }
        } else {
            echo '<p>No coffee products available.</p>';
        }
        ?>
      </div>

      <div class="bread-products">
        <?php
        $breadQuery = "SELECT product_name, product_price FROM products WHERE category = 'Bread'"; //seletcs product on bread category
        $breadResult = $conn->query($breadQuery);
        if ($breadResult && $breadResult->num_rows > 0) {
            while ($row = $breadResult->fetch_assoc()) {
                echo '
                <div class="product" data-name="' . htmlspecialchars($row['product_name']) . '" data-price="' . number_format($row['product_price'], 2) . '">
                    <img class="img2" src="assets/5.jpg" alt="Bread">
                    <h2>' . htmlspecialchars($row['product_name']) . '</h2>
                    <div class="price">₱' . number_format($row['product_price'], 2) . '</div>
                </div>';
            }
        } else {
            echo '<p>No bread products available.</p>';
        }
        ?>
      </div>

      <div class="order-actions">
        <button class="rmv-btn">Remove Order</button>
        <a href="index.php"><button class="cncl-btn">Cancel Order</button></a>
      </div>
    </div>
    <div class="right">
      <h2>Order List</h2>
      <h5><?php echo "$_SESSION[selection]"; ?></h5>
      <div id="order-list"></div>
      <div class="payment-section">
    <h3>Payment Received:</h3> 
    <input type="number" id="amount-received" class="total-input" value="0.00" step="0.01" min="0.00" />
    <h4>Select Payment Method</h4>
    <div class="payment-methods">
        <label>
            <input type="radio" name="payment-method" value="card"> Card
        </label>
        <label>
            <input type="radio" name="payment-method" value="Gcash"> Gcash
        </label>
        <label>
            <input type="radio" name="payment-method" value="cash"> Cash
        </label>
    </div>
</div>
      <form action="receipt.php" method="POST" id="orderForm">

    <input type="hidden" id="orderData" name="orderData" value="">
    <input type="hidden" id="paymentMethod" name="paymentMethod" value="">
    <input type="hidden" id="totalPayment" name="totalPayment" value="">

    <button type="submit" class="cnfrm-btn">Confirm Order</button>
</form>
    </div>
</div>

  <script>
document.addEventListener('DOMContentLoaded', () => {
    const coffeeCategoryLink = document.querySelector('.left h3:nth-of-type(1)');
    const breadCategoryLink = document.querySelector('.left h3:nth-of-type(2)');
    const coffeeProducts = document.querySelector('.coffee-products');
    const breadProducts = document.querySelector('.bread-products');
    const orderListDiv = document.getElementById('order-list');
    const confirmButton = document.querySelector('.cnfrm-btn');
    const totalPaymentInput = document.getElementById('amount-received'); 

    let totalAmount = 0;

    // display cofee as defauklt
    coffeeProducts.style.display = 'grid';
    breadProducts.style.display = 'none';

    // category toggle
    coffeeCategoryLink.addEventListener('click', () => {
        coffeeProducts.style.display = 'grid';
        breadProducts.style.display = 'none';
    });

    breadCategoryLink.addEventListener('click', () => {
        coffeeProducts.style.display = 'none';
        breadProducts.style.display = 'grid';
    });

    // add to order func
    function addToOrder(event) {
        const productContainer = event.currentTarget; // curr product div
        const productName = productContainer.dataset.name;
        const productPrice = parseFloat(productContainer.dataset.price);

        if (productName && productPrice) {
            const orderItem = document.createElement('div');
            orderItem.classList.add('order-item');
            orderItem.innerHTML = `<p>${productName} - ₱${productPrice.toFixed(2)}</p>`;
            orderListDiv.appendChild(orderItem);

            totalAmount += productPrice;
            updateTotalPaymentInput();
        }
    }

    // update payment
    function updateTotalPaymentInput() {
        totalPaymentInput.value = totalAmount.toFixed(2); // Update input to reflect total
    }

    // add click funtionality on all product class
    function initializeProductListeners() {
        const productItems = document.querySelectorAll('.product'); // Get all products
        productItems.forEach(product => {
            product.addEventListener('click', addToOrder);
        });
    }

    // make product listener work
    initializeProductListeners();

    // confirm Button Logic
    confirmButton.addEventListener('click', function (event) {
        event.preventDefault();

        const orderItems = [];
        const orderItemsDivs = orderListDiv.querySelectorAll('.order-item');
        orderItemsDivs.forEach(itemDiv => {
            orderItems.push(itemDiv.textContent.trim());
        });

        const paymentMethod = document.querySelector('input[name="payment-method"]:checked');
        const paymentMethodValue = paymentMethod ? paymentMethod.value : '';

        document.getElementById('orderData').value = JSON.stringify(orderItems);
        document.getElementById('paymentMethod').value = paymentMethodValue;
        document.getElementById('totalPayment').value = totalAmount.toFixed(2);

        document.getElementById('orderForm').submit();
    });
});





  </script>
</body>
</html>
