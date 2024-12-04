<?php 
session_start();
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

  .coffee-products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    margin: 10px;
  }

  .coffee-products h2 {
    margin: 0;
    font-size: 30px;
  }

  .coffee-products .add {
    margin-bottom: 20px;
  }

  .bread-products {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    margin: 10px;
  }

  .bread-products h2 {
    margin: 0;
    font-size: 30px;
  }

  .bread-products .add {
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

.add {
  border-style: none;
  background-color: transparent;
  color: saddlebrown;
  border-radius: 10px;
  width: 140px;
  margin-top: 12px;
  padding: 10px;
  text-align: center;
  box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
  cursor: pointer;
  transition: width 0.3s;
}

.add:hover {
  width: 160px;
}

.cncl-btn, .cnfrm-btn {
  border-radius: 15px;
  background-color: transparent;
    margin-top: 160px;
    padding: 12px;
    width: 150px;
    color: white;
    text-align: center;
    box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease; 
}

.cnfrm-btn{
  margin-left: 40px;
}

.cncl-btn:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

.cnfrm-btn:hover {
  background-color: rgba(0, 0, 0, 0.3);
}

.rmv-btn {
  background-color: transparent;
  border-radius: 10px;
  color: white;
  width: 140px;
  margin-bottom: 15px;
  padding: 10px;
  text-align: center;
  box-shadow: 0 0 8px rgba(139, 69, 19, 0.7);
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease; 
  align-self: center;
}

.rmv-btn:hover {
  background-color: rgba(0, 0, 0, 0.3);
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
        <a href="dashboard.php"><img class="img" src="assets/4.jpg" alt="image"></a>
        <h3>Coffee</h3>
        <a href="dashboard2.php"><img class="img" src="assets/5.jpg" alt="image"></a>
        <h3>Bread</h3>
      </div>
      
      <div class="mid">      
        <h2 class="header">Selection</h2>
        <div class="bread-products">
                  <div class="product">
                    <img class="img2" src="assets/5.jpg">
                    <h2>Bread 1</h2>
                    <div class="price">₱99</div>
                    <button class="add">Add to Order</button>
                  </div>
                  <div class="product">
                    <img class="img2" src="assets/5.jpg">
                    <h2>Bread 1</h2>
                    <div class="price">₱99</div>
                    <button class="add">Add to Order</button>
                  </div>
                  <div class="product">
                    <img class="img2" src="assets/5.jpg">
                    <h2>Bread 1</h2>
                    <div class="price">₱99</div>
                    <button class="add">Add to Order</button>
                  </div>


          </div>
          <a href="/1/index.html"><button class="cncl-btn">Cancel Order</button></a>
          <a href="/4/index.html"><button class="cnfrm-btn">Confirm Order</button></a>
        </div>
  
        <div class="right">
            <h2>Order List</h2>
            <h5><?php echo "$_SESSION[selection]";?></h5>
            <div id="order-list"></div>
            <button class="rmv-btn">Remove Order</button>
        </div>
  
      </div>
      <script src="script.js"></script>
</body>
</html>