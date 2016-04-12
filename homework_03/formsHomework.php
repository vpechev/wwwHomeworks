<!DOCTYPE HTML> 
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <style>
        div{
            margin-top: 10px;
            margin-bottom: 10px;
        }

        label{
            font-size: 20px;
            font-weight: bold;
            margin-right: 10px;
        }
        
        .error { color: #FF0000; }
    </style>
</head>

<script>
    $('.programCheckbox').click(function() {
        $(this).siblings('input:checkbox').prop('checked', false);
});
</script>

<body>
<?php
        $title = $description = $lecturerName = $type = $course = $program = $material = $lecturerEmail = $devName = "";
        $titleErr = $descriptionErr = $lecturerNameErr = $typeErr = $courseErr = $programErr = $materialErr = $lecturerEmailErr = $devNameErr = "";
        $output = '';
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            
            if (empty($_POST["title"])) {
                $titleErr = "Title is required";
            } else {
                $title = test_input($_POST["title"]);
                $output .= buildOutputData('Title', $title);
            }

            
            if (empty($_POST['description'])) {
                $descriptionErr = "Description is required";
            } else {
                $description = test_input($_POST["description"]);
                $output .= buildOutputData('Description', $description);
            }
            
            
            if (empty($_POST["lecturer-name"])) {
                $lecturerNameErr = "The lecturer's name is required";
            } else {
                $lecturerName = test_input($_POST["lecturer-name"]);
                $output .= buildOutputData('Lecturer name', $lecturerName);
            }
            
            
            if (empty($_POST["type"])) {
                $typeErr = "Type is required";
            } else {
                $type = test_input($_POST["type"]);
                $output .= buildOutputData('Type', $type);
            }
            
            
            if (empty($_POST["course"])) {
                $courseErr = "Course is required";
            } else {
                $course = test_input($_POST["course"]);
                $output .= buildOutputData('Course', $course);
            } 
            
            if (empty($_POST["program"])) {
                $programErr = "Program is required";
            } else {
                $program = test_input($_POST["program"]);
                $output .= buildOutputData('Program', $program);
            }
            
                        
            if( isset($_POST["add-materials"]) && substr($_POST["add-materials"], -4, 4) === '.zip'){
                $material = $_POST["add-materials"];
                $output .= buildOutputData('Added Materials', $material);
            } else {
                $materialErr = "Only .zip files are allowed: ";
            }
            
            if (empty($_POST["lecturer-email"]) || filter_var($lecturerEmail, FILTER_VALIDATE_EMAIL) ) {
                $lecturerEmailErr = "Email address is not valid";
            } else {
                $lecturerEmail = test_input($_POST["lecturer-email"]);
                $output .= buildOutputData('Lecturer email', $lecturerEmail);
            }
            
            if(!empty($_POST["developer-name"])){
                $devName = $_POST["developer-name"];
                $output .= buildOutputData('Developer Name', $devName);
            }
            
            echo $output;
        }
       
       function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        function endsWith($haystack, $needle) {
            // search forward starting from end minus needle length characters
            return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
        }
        
        function buildOutputData($label, $value){
            return '<div>'.'<strong>'. $label. ': </strong>'.'<i>'. $value.'</i>'.'</div>';
        }

?>
<div id="input-form">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div>
			<label for="title">Title*</label>
			<input type="text" id="title" name="title" required maxlength="20" value=""/>
            <span class="error"><?php echo $titleErr;?></span>
		</div>

		<div>
			<label for="description">Description*</label>
			<textarea  id="description" name="description" required minlength="1" maxlength="200" rows="4" cols="50"></textarea>
            <span class="error"><?php echo $descriptionErr;?></span>         
		</div>

		<div>
			<label for="lecturer-name">Lecturer name*</label>
			<input type="text" id="lecturer-name" name="lecturer-name" required maxlength="20" value=""/>
            <span class="error"><?php echo $lecturerNameErr;?></span>           
		</div>

		<div>
			<div><label>Type*</label></div>
			
			<label for="elective">Elective</label>
			<input id="elective" type="radio" name="type" checked value="elective" />
			
			<label for="mandatory">Mandatory</label>
			<input id="mandatory" type="radio" name="type" checked value="mandatory" />
            <span class="error"><?php echo $typeErr; ?></span>            
		</div>

		<div>
			<label>Course*</label>
			<select name="course">
				<option id="first">First</option>
				<option id="second">Second</option>
				<option id="third">Third</option>
				<option id="fourth">Fourth</option>
			</select>
            <span class="error"><?php echo $courseErr; ?></span>
		</div>

		<div>
			 <label>Program*</label>
			 <label for="bachelor">Bachelor</label> 
			 <input id="bachelor" type="checkbox" name="program" class="programCheckbox" value="Bachelor">
			 <label for="master">Master</label> 
			 <input type="checkbox" name="program" class="programCheckbox" value="Master">
            <span class="error"><?php echo $programErr; ?></span>
		</div>

		<div>
			<label for="add-materials">Add materials</label>
			<input type="file" id="add-materials" name="add-materials">
            <span class="error"><?php echo $materialErr; ?></span>
		</div>

		<div>
			<label for="lecturer-email">Lecturer email</label>
			<input type="email" id="lecturer-email" name="lecturer-email" value="">
            <span class="error"><?php echo $lecturerEmailErr; ?></span>
		</div>

		<div>
			<input type="hidden" id="developer-name"  name="developer-name" value="Vladimir Pechev">
		</div>

		<input type="submit" name="submit" value="Submit">
	</form>
</div>

<div id="output"></div>
</body>
</html>