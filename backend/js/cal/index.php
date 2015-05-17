<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<title>jQuery datePicker simple datePicker demo</title>
		
		<script src="jquery.js" language="javascript"></script>
        <script type="text/javascript" src="date.js"></script>
		<script type="text/javascript" src="jquery.datePicker.js"></script>
        
       
		<link rel="stylesheet" type="text/css" media="screen" href="datePicker.css">
		<style type="text/css">
/* located in demo.css and creates a little calendar icon
 * instead of a text link for "Choose date"
 */
a.dp-choose-date {
	float: left;
	width: 16px;
	height: 16px;
	padding: 0;
	margin: 5px 3px 0;
	display: block;
	text-indent: -2000px;
	overflow: hidden;
	background: url(calendar.png) no-repeat; 
}
a.dp-choose-date.dp-disabled {
	background-position: 0 -20px;
	cursor: default;
}
/* makes the input field shorter once the date picker code
 * has run (to allow space for the calendar icon
 */
input.dp-applied {
	width: 140px;
	float: left;
}
</style>
      
		<script type="text/javascript" charset="utf-8">
            $(function()
            {
				$('.date-pick').datePicker();
            });
		</script>
		
	</head>
	<body>
        <div id="container">
            
			<form name="chooseDateForm" id="chooseDateForm" action="#">
				<fieldset>
					<legend>Test date picker form</legend>
                   
                       
                            
							<input name="date1" id="date1" class="date-pick" />
                    
                            
							<input name="date2" id="date2" class="date-pick" />
						
 
					
				</fieldset>
			</form>
			
        </div>
	</body>
</html>