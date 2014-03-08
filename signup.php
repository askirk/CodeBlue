<!DOCTYPE HTML>
<html>
<body>
			  <?php
                // define variables and set to empty values
                $nameErr = $emailErr = $genderErr = "";
                $name = $email = $team = $regist = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    if (empty($_POST["name"]))
                      {$nameErr = "Name is required";}
                    else
                      {$name = test_input($_POST["name"]);}

                    if (empty($_POST["email"]))
                      {$emailErr = "Email is required";}
                    else
                      {$email = test_input($_POST["email"]);}

                    if (empty($_POST["team"]))
                      {$team = "";}
                    else
                      {$team = test_input($_POST["team"]);}

                    if (empty($_POST["regist"]))
                      {$registErr = "Must choose one";}
                    else
                      {$regist = test_input($_POST["regist"]);}
                }

                function test_input($data)
                {
                   $data = trim($data);
                   $data = stripslashes($data);
                   $data = htmlspecialchars($data);
                   return $data;
                }
              ?>

              <h2>Dodgeball Sign Up</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
                   Name: <input type="text" name="name"  value="<?php echo $name;?>">
                   <span class="error">* <?php echo $nameErr;?></span>
                   <br><br>
                   Email: <input type="text" name="email"  value="<?php echo $email;?>">
                   <span class="error">* <?php echo $emailErr;?></span>
                   <br><br>
                   Team Name: <input type="text" name="team"  value="<?php echo $team;?>">
                   <br><br>
                   Registering as:
                   <input type="radio" name="regist"
      					<?php if (isset($regist) && $regist=="Team") echo "checked";?>
      					value="Team">Team
      					<input type="radio" name="regist"
      					<?php if (isset($regist) && $regist=="Single Player") echo "checked";?>
      					value="Single Player">Single
                   <span class="error">* <?php echo $registErr;?></span>
                   <br><br>
                   <input type="submit" name="submit" value="Submit"> 
                </form>

               <?php
	              if(!empty($_POST['name']) && !empty($_POST['email']) && isset($_POST['regist'])) {
				        $email_to = "akirk301@aol.com";
     
   						$email_subject = "Dodgeball Submissions";

				        $email_message = "Form details below.\n\n";
					     
					    $email_message .= "Name: ".$name."\n";
					    $email_message .= "Email: ".$email."\n";
					    $email_message .= "Team: ".$team."\n";
					    $email_message .= "Registering as: ".$regist."\n";

					    if(mail($email_to,$email_subject,$email_message))
					    	echo "\nThanks for signing up! Remember to bring your $10 entrance fee to the tournament!";
					    else
					    	echo "Try again";
				  }
			   ?>

</body>
</html>