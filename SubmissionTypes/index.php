<html>
<head>
</head>
<body>
	<form method="post" action="/Projects/SubmissionTypes/index.php" enctype="multipart/form-data">
		Text:<input name="textData" type="text"/><br/>
		Number:<input name="numberData" type="number"/><br/>
		Date:<input name="dateData" type="date" value="<?php echo date("Y-m-d")?>"/><br/>
		Multiple File:<input name="fileData[]" type="file" multiple="multiple" /><br/>
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
				<td><input type="checkbox" name="checkList[]" value="1"/></td>
				<td><input type="hidden" value="Ch1" name="checkListHidden[]"/>Ch1</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="checkList[]" value="2"/></td>
				<td><input type="hidden" value="Ch2" name="checkListHidden[]"/>Ch2</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="checkList[]" value="3"/></td>
				<td><input type="hidden" value="Ch3" name="checkListHidden[]"/>Ch3</td>
			</tr>
		</table>
		<button type="submit">Submit</button>
	</form>
	<div style="background-color:lightgray;width:100%;">
	<?php
		include "IndexFormClass.php";
		
		$files = count($_FILES["fileData"]["name"]);
		echo $files;
		echo "<br/>";
		
		$Form = json_encode($_POST);
		echo $Form;
		echo "<br/>";
		
		$FormDecoded = json_decode($Form,true);
		
		$IndexFormInst = new IndexForm;
		$IndexFormInst->setTextData($FormDecoded["textData"]);
		$IndexFormInst->setNumberData($FormDecoded["numberData"]);
		$IndexFormInst->setDateData($FormDecoded["dateData"]);
		$IndexFormInst->setRadioData($FormDecoded["radioData"]);
		$IndexFormInst->setCheckData($FormDecoded["checkData"]);
		$IndexFormInst->setSelectData($FormDecoded["selectData"]);
		$IndexFormInst->setCheckListHiddenData($FormDecoded["checkListHidden"]);
		$IndexFormInst->setCheckListData($FormDecoded["checkList"]);
		
		echo($IndexFormInst->getTextData());
		echo "<br/>";
	?>
	</div>
</body>
</html>