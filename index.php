<!DOCTYPE html>
<html>
	<head>
		<!-- Meta Information -->
		<meta name="Kagiso Maila">
		<meta name="description" content="Responsive Animated website using HTML5, CSS3, Bootstrap & JavaScript">
		<!--Webpage Title -->
		<title>PHP MYSQL Web JSON - To Do List</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script
		<script src = "js/bootstrap.js"></script>
		<link href = "css/bootstrap.css" rel = "stylesheet" /> 
		<link href = "css/bootstrap.min.css" rel = "stylesheet" />
		<link href = "css/style.css" rel = "stylesheet" /> 
		<script>
			$(function() {
				$.get("http://localhost/tutorial/services/services.php", function(data, status) {
					console.log(data);
					// Read all the items
					var toDoItems = JSON.parse(data);
					for(var i = 0; i < toDoItems.length; i++) {
						var item = "id: " + toDoItems[i].itemId + " " + toDoItems[i].itemDescription + 
						" priority: " + toDoItems[i].itemPriority + " due" + toDoItems[i].itemDueDate;
						item = "<li>" + item + "</li>";
						$("#myitems").append(item);
					}
				});
					$('body').click(function(e) {
				       var Elem = e.target;
				       if (Elem.nodeName == '#saveitem') {
				           var description = $('#desc').val();
						   var dueDate = $('#duedate').val();
						   var priority = $('#priority').val();

						var item = {
							itemDescription : description,
							itemDueDate : duedate,
							itemPriority : priority
						};
						$.post("http://localhost/tutorial/services/services.php", item, function(data) {
							console.log(data);
						});
				       }
					});
			} );
		</script>
	</head>
	<body>
		<div class="container">
        	<h1>To Do List Items</h1>
        	<ol id="myitems">

        	</ol>
      	</div>
      	<div class="container">
      		<h2>Add New Item</h2>
      		<form>
      			<div class="form-group">
      				<label>Item Description:</label>
      				<input type="text" class="form-control" id="desc" /><br>
      			</div>
      			<div  class="form-group">
      				<label>Item Due Date:</label>
      				<input type="text" class="form-control" id="duedate" placeholder="YYYY-MM-DD" />
      			</div>
      			<div  class="form-group">
      				<label>Item Priority:</label>
      				<input type="text" class="form-control" id="priority" /><br>
      			</div>     		
      			<input type="button" id="saveitem" class="" value="Save Item" />
      		</form>
      	</div>
	</body>
</html> 