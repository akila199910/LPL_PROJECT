<?php
include("conn.php");
mysqli_select_db($conn,"lplsystem");

// Create playersregistation table if it doesn't exist




    //should be create photo fied in table
$sql2 = "CREATE TABLE IF NOT EXISTS playersregistation (
    id INT PRIMARY KEY AUTO_INCREMENT,
    f_name VARCHAR(255) NOT NULL,
    l_name VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL,
    country VARCHAR(50) NOT NULL,
    cap VARCHAR(5) NOT NULL,
    catogary VARCHAR(255) NOT NULL,
    dob DATE NOT NULL
)";





if (mysqli_query($conn, $sql2)) {
    echo "Player Registration Table Is Created";
} else {
    echo "Error Creating Table: " . mysqli_error($conn);
}

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $co = $_POST['co'];
    $dob = $_POST['dob'];
    $catogary = $_POST['catogary'];
    #$photo = $
    $level=$_POST['level'];

    // Insert player data into playersregistation table
    $sql3 = "INSERT INTO playersregistation (f_name, l_name, email, password, country, cap,catogary, dob) 
            VALUES ('$fname', '$lname', '$email', '$pwd', '$co','$level', '$catogary', '$dob')";

    if (mysqli_query($conn, $sql3)) {
        echo "Player Approved or Rejected";
    } else {
        echo "Error Adding or Rejecting Player: " . mysqli_error($conn);
    }

    // Redirect to another page after form submission
    if ($catogary == 'bat') {
        header("Location: Batsman.php");
    } elseif ($catogary == 'bol') {
        header("Location: Bowler.php");
    } elseif ($catogary == 'wk') {
        header("Location: Wicketkeeper.php");
    } elseif ($catogary == 'alr') {
        header("Location: Allrounder1.php");
    }
    exit; // Make sure to exit after sending the header
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>New Player Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 40px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px  #669999; 
      }
      .banner {
      position: relative;
      height: 300px;
      background-image: url("lplimg.png");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.2); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #669999;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #669999;
      color: #669999;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      .week {
      display:flex;
      justfiy-content:space-between;
      }
      .colums {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .colums div {
      width:48%;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color:  #a3c2c2;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid  #669999;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid  #669999;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .flax {
      display:flex;
      justify-content:space-around;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #669999;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background:  #a3c2c2;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form action="/">
        <div class="banner">
          <h1>New Player Registration</h1>
        </div>
        <div class="colums">
          <div class="item">
            <label for="fname"> First Name<span>*</span></label>
            <input id="fname" type="text" name="fname" required/>
          </div>
          <div class="item">
            <label for="lname"> Last Name<span>*</span></label>
            <input id="lname" type="text" name="lname" required/>
          </div>
          <div class="item">
            <label for="email">E-mail<span>*</span></label>
            <input id="email" type="text"   name="email" required/>
          </div>
          <div class="item">
            <label for="pwd">Password<span>*</span></label>
            <input id="pwd" type="password"   name="pwd" required/>
          </div>
          <div class="item">
            <label for="dob">Date of Birth<span>*</span></label>
            <input id="dob" type="date"   name="dob" required/>
          </div>
          <div class="item">
            <label for="country">Country<span>*</span></label>
            <input id="country" type="text"   name="co" required/>
          </div>
        </div>

          
        <div class="question">
          <label>are you International Player?</label>
          <div class="question-answer">
            
            <div>
              <input  type="radio" value="none" id="yes" name="level"/>
              <label for="yes" class="radio"><span>Yes</span></label>
            </div>
            <div>
              <input  type="radio" value="none" id="no" name="level"/>
              <label for="no" class="radio"><span>No</span></label>
            </div>
          </div>
        </div>
        <div class="question">
          <label for="catogary" name="catogary">Catogary </label>
          <div class="question-answer">
            <div>
              <input type="radio" value="none" id="bat" name="catogary"/>
              <label for="bat" class="radio"><span>Batsman</span></label>
            </div>
            <div>
              <input  type="radio" value="none" id="bol" name="catogary"/>
              <label for="bol" class="radio"><span>Bowler</span></label>
            </div>
            <div>
              <input  type="radio" value="none" id="wk" name="catogary"/>
              <label for="wk" class="radio"><span>Wicket-Keeper</span></label>
            </div>
            <div>
              <input  type="radio" value="none" id="alr" name="catogary"/>
              <label for="alr" class="radio"><span>Allrounder</span></label>
            </div>
          </div>
        </div>
        <h2>Terms and Conditions</h2>
        <input type="checkbox" name="checkbox1">
        <label>You consent to receive communications from us electronically. We will communicate with you by e-mail or phone. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.</label>
        <div class="btn-block">
          <button type="submit" name="submit" value="submit">Submit</button>
        </div>
      </form>
    </div>
  </body>
</html>