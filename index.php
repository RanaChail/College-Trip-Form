<?php
    $insert = false;
    if(isset($_POST['name'])){
      //Set connection variables:
        $server = "localhost";
        $username = "root";
        $password = "";
      
      //Create a conncetion:
        $con = mysqli_connect($server, $username, $password);
      
      //Check for connection success:
        if(!$con){
            die("Connection to this database failed duo to". mysqli_connect_error());
        }
        // echo "Success connecting to the DB";

      //Collect post variables:
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $desc = $_POST['desc'];

        $sql = "INSERT INTO `puri_trip`.`hetc_puritrip` (`name`, `age`, `email`, `mobile`, `gender`, `desc`, `date`) VALUES ('$name', '$age', '$email', '$mobile', '$gender', '$desc', current_timestamp());";
        
      
      //Execute Query:
        if($con->query($sql) == true){
            // echo "Successfully inserted";
            //Flag for successfull insertion:
            $insert = true;
        }else{
            echo "ERROR: $sql <br> $con->error";
        }

      //Close the database connection:
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to Travel Form</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <!-- In xammp external css not working -->
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Inter", sans-serif;
      }

      body {
        height: 100vh;
        width: 100vw;
      }

      .bg {
        width: 100%;
        height: 100vh;
        position: absolute;
        z-index: -1;
        opacity: 0.5;
      }

      .container {
        max-width: fit-content;
        margin: 0 auto;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        background-color: #11111100;
        background-image: linear-gradient(
          180deg,
          #111111 0%,
          #ffffff00 50%,
          #000000 100%
        );
        border-radius: 0.3rem;
      }

      h3 {
        font-size: 2.2rem;
        font-weight: 700;
        color: white;
      }

      .heading {
        font-size: 1.2rem;
        font-weight: 700;
        color: wheat;
      }

      .container h3,
      .heading {
        text-align: center;
      }

      #form {
        display: flex;
        flex-direction: column;
        align-content: center;
        padding: 1rem;
        gap: 1rem;
      }

      input {
        width: 50%;
        margin: auto;
        padding: 0.5rem 1.2rem;
        border: none;
        border-radius: 0.325rem;
        outline: none;
        font-size: 1rem;
        font-weight: 500;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      }

      #gender {
        width: 50%;
        margin: auto;
      }

      #gender {
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      }

      textarea {
        border: none;
        border-radius: 0.325rem;
        padding: 1rem;
        font-size: 1rem;
        width: 50%;
        margin: auto;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.3);
      }

      .button {
        display: flex;
        gap: 1rem;
        margin: auto;
      }

      .btn {
        border: none;
        border-radius: 2rem;
        padding: 0.5rem 1rem;
        color: white;
        font-size: 0.75rem;
        font-weight: 600;
        cursor: pointer;
        background-color: rgb(26, 116, 26);
      }
      .submit-msg {
        width: fit-content;
        font-size: 1rem;
        font-weight: 600;
        color: rgb(67, 255, 67);
        margin: 0 auto;
      }
    </style>
  </head>
  <body>
    <img class="bg" src="hetc.jpg" alt="hetc" />
    <div class="container">
      <h3>Welcome to HETC - Puri Trip Form</h3>
      <p class="heading">
        Enter your details and submit this form to confirm your perticipation to
        the trip
      </p>
      <?php
        if($insert == true){
          echo "<p class='submit-msg' id='submit-msg'>Thanks for submitting the form</p>";
        }
      ?>
      <form action="index.php" method="post" id="form">
        <input
          type="text"
          name="name"
          id="name" required
          placeholder="Enter Your Name"
        />
        <input type="number" name="age" id="age" required placeholder="Enter Your Age" />
        <input
          type="email"
          name="email"
          id="email" required
          placeholder="Enter EmailID"
        />
        <input
          type="number"
          name="mobile"
          id="mobile" required
          placeholder="Enter Mobile No"
        />
        <input type="text" name="gender" id="gender" required placeholder="Gender" />
        <textarea
          name="desc"
          id="desc"
          cols="30"
          rows="8" required
          placeholder="Enter any other information here..."
        ></textarea>
        <div class="button">
          <button class="btn" id="reset" type="reset" style="background-color: rgb(192, 138, 45);"  onClick="resetAll()">Reset</button>
          <button class="btn" id="submit" >Submit</button>
        </div>
      </form>
    </div>
    <script>
      const reset = document.getElementById('reset');
      const submitMsg = document.getElementById('submit-msg');

      function resetAll(){
        submitMsg.style.display = 'none';
      }
    </script>
  </body>
</html>