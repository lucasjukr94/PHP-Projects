<html>
<head>
</head>
<body>
	<form method="post" action="/Projects/SubmissionTypes/index.php" enctype="multipart/form-data">
		Text:<input name="textData" type="text"/><br/>
		Number:<input name="numberData" type="number"/><br/>
		Date:<input name="dateData" type="date" value="<?php echo date("Y-m-d")?>"/><br/>
		Multiple File:<input name="fileData[]" type="file" multiple="multiple" /><br/>
		Radio:<input name="radioData" type="radio" checked="True"/>Sim&nbsp;<input name="radioData" type="radio"/>Nao<br/>
		CheckBox:<input name="checkData" type="checkbox" checked="True"/>Checked<br/>
		SelectList:
		<select name="selectData">
			<option value="1">Op1</option>
			<option value="2">Op2</option>
			<option value="3">Op3</option>
			<option value="4">Op4</option>
		</select>
		<table>
			<tr>
				<td><input type="checkbox" name="checkList[]" value="1" checked="True"/></td>
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
	//Checar se está tendo uma 
	if($_SERVER["REQUEST_METHOD"] === "POST"){
		include "IndexFormClass.php";
		
		$files = count($_FILES["fileData"]["name"]);
		echo $files;
		echo "<br/>";
		
		//Com isso da pra inserir arquivos dentro da base de dados
		for($i=0;$i<$files;$i++){
			echo $_FILES["fileData"]["name"][$i];
			echo "<br/>";
			echo $_FILES["fileData"]["size"][$i];
			echo "<br/>";
			echo $_FILES["fileData"]["type"][$i];
			echo "<br/>";
			echo $_FILES["fileData"]["error"][$i];
			echo "<br/>";
			//Vai imprimir todos os caracteres binários de um certo arquivo
			//echo file_get_contents($_FILES["fileData"]["tmp_name"][$i]);
			
			//Exibe a imagem caso a imagem já esteja no banco de dados
			$sImage = "data:" . $_FILES["fileData"]["type"][$i] . ";base64," . base64_encode(file_get_contents($_FILES["fileData"]["tmp_name"][$i]));
			echo "<img src='" . $sImage . "' style='width:400px;height:300px;'/>";
			
			//Download dos arquivos
			header('Pragma: public');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Cache-Control: private', false);
			header('Content-Transfer-Encoding: binary');
			header('Content-Disposition: attachment; filename="'.$_FILES["fileData"]["name"][$i].'";');
			header('Content-Type: ' . $_FILES["fileData"]["type"][$i]);
			header('Content-Length: ' . $_FILES["fileData"]["size"][$i]);
			$string = @file_get_contents($_FILES["fileData"]["tmp_name"][$i]);
			exit;
			
			echo "<br/><br/>";
		}
		echo "<br/>";
		
		$Form = json_encode($_POST);
		echo $Form;
		echo "<br/>";
		
		$FormDecoded = json_decode($Form,true);
		
		//JSON string to Object
		$IndexFormInst = new IndexForm;
		$IndexFormInst->setTextData($FormDecoded["textData"]);
		$IndexFormInst->setNumberData($FormDecoded["numberData"]);
		$IndexFormInst->setDateData($FormDecoded["dateData"]);
		if(($FormDecoded["textData"])===null){
			$IndexFormInst->setRadioData($FormDecoded["radioData"]);
		}
		if(($FormDecoded["textData"])===null){
			$IndexFormInst->setCheckData($FormDecoded["checkData"]);
		}
		$IndexFormInst->setSelectData($FormDecoded["selectData"]);
		$IndexFormInst->setCheckListHiddenData($FormDecoded["checkListHidden"]);
		if(($FormDecoded["textData"])===null){
			$IndexFormInst->setCheckListData($FormDecoded["checkList"]);
		}
		
		echo($IndexFormInst->getTextData());
		echo "<br/>";
	}else{
		echo "not set";
	}
	?>
	</div>
</body>
</html>