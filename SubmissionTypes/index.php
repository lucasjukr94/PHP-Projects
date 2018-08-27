<html>
<head>
</head>
<body>
	<form method="post" action="/Projects/SubmissionTypes/index.php" enctype="multipart/form-data">
		Text:<input name="textData" type="text"/><br/>
		Number:<input name="numberData" type="number"/><br/>
		Date:<input name="dateData" type="date"/><br/>
		Multiple File:<input name="fileData" type="file" multiple/><br/>
		Radio:<input name="radioData" type="radio"/>Sim&nbsp;<input name="radioData" type="radio"/>Nao<br/>
		CheckBox:<input name="checkData" type="checkbox"/>Checked<br/>
		SelectList:
		<select name="selectData">
			<option value="1">Op1</option>
			<option value="2">Op2</option>
			<option value="3">Op3</option>
			<option value="4">Op4</option>
		</select>
		<table>
			<tr>
				<td><input type="checkbox" name="checkList"/></td>
				<td><input type="hidden" value="Ch1" name="checkListHidden"/>Ch1</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="checkList"/></td>
				<td><input type="hidden" value="Ch2" name="checkListHidden"/>Ch2</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="checkList"/></td>
				<td><input type="hidden" value="Ch3" name="checkListHidden"/>Ch3</td>
			</tr>
		</table>
	</form>
	<div style="background-color:lightgray;width:100%;">
	<?php
		$Form = $_POST["jsonObject"];
	?>
	</div>
</body>
</html>