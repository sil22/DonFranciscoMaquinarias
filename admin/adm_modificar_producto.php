<?php 
session_start();
if(!isset($_SESSION["admin"]))
header("Location:../index.html"); 

include("clase_DB.php");  
$db = new DB();
$db->conectar();
$destacado='';
extract($_REQUEST);

$ms='';
if(isset($modificar))
	{
		$tipo_marca=explode('/',$marcas);
		$query = "
			UPDATE vehiculos  
			SET  marc='".$tipo_marca[1]."', year='$anio', model='$modelo', km='".$km."', color='$color', note='$descripcion', used='$nuevo', price='$precio', rubro='".$tipo_marca[0]."', destacado='".$destacado."', video='".$video."'  WHERE id = '$id'
		";
		$resultado = mysql_query($query);
	}
	
$resultados =  $db->consulta("SELECT * FROM vehiculos WHERE id=".$id);
$row=mysql_fetch_row($resultados);

?>

<html> 
<head> 
<title>Maquinarias Nuevas y Usadas</title> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" id="dox_css_reset-css" href="../css/reset000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_grid-css" href="../css/grid0000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_google_font-css" href="../css/css00000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_main-css" href="../css/style000.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_prettyphoto-css" href="../css/prettyph.css" type="text/css" media="all">
<link rel="stylesheet" id="dox_css_default-css" href="../css/default0.css" type="text/css" media="all">
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
div .form{
	font-size: 12px;
	font-weight:bold;
	margin-top:10px;
	font-family:Verdana, Geneva, sans-serif;
	display:block;
	width:100%; float:left;
}

label span { float:left; }

input,textarea,select {border:#AAA 1px solid; margin:2px; padding:2px; font-size:12px}
.enviar{ background-color:#999; color:#FFF; font-size:16px; font-weight:bold; padding:4px}
.contenedor {margin:5px; border:1px solid #CCC; padding:5px; margin:5px; padding-bottom:20px}
-->
</style>

<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">

</head> 
<body class="home blog">

<div style="height:5px; background-color:#0F0"></div>


<?php include('templates/navigation.php'); ?>

	
<div class="container">
	<div class="container_12 clearfix">
  <table width="100%" border="0" cellpadding="0"  cellspacing="0">
  <tr>
    <td valign="top" class="contenedor">
    	<table cellspacing="0" cellpadding="0" border="0" width="100%" >
       		<tr>
       			<td  height="30" class="index_html_item_title"> Modificar Maquinaria</td>
       		</tr>
    	</table>
    	<div style=" border:1px solid #999; padding-left:10px; width:98%; float:left;">
		<form method="post" enctype="multipart/form-data" name="tinymce" action="adm_modificar_producto.php" >
  		
        <div class="form">
        	<div style="width:50%; float:left" class="Estilo6" >    	        
                <span id="spryselect1">
                    <div class="form">
                        <span class="Estilo6">Marca</span><br>
                        
                        <select name="marcas" id="marcas">
                    <option value="<? echo $row[14] ?>/<? echo $row[1] ?>" selected><? echo $row[14] ?> <? echo $row[1] ?></option>
      <optgroup label="COSECHADORAS">      
            <option value="cosechadora/Agco Allis">Agco Allis</option>
            <option value="cosechadora/Agrinar">Agrinar</option>
            <option value="cosechadora/Araus">Araus</option>
            <option value="cosechadora/Aumec">Aumec</option>
            <option value="cosechadora/Bernardin">Bernardin</option>
            <option value="cosechadora/Case IH">Case IH</option>
            <option value="cosechadora/Claas">Claas</option>
            <option value="cosechadora/Challenger">Challenger</option>
            <option value="cosechadora/Daniele">Daniele</option>
            <option value="cosechadora/Deutz">Deutz</option>
            <option value="cosechadora/Deutz Fahr">Deutz Fahr</option>
            <option value="cosechadora/Dolbi">Dolbi</option>
            <option value="cosechadora/Don Roque">Don Roque</option>
            <option value="cosechadora/Escañuela">Escañuela</option>
            <option value="cosechadora/Fiat">Fiat</option>
            <option value="cosechadora/Gema">Gema</option>
            <option value="cosechadora/Gleaner">Gleaner</option>
            <option value="cosechadora/IMET">IMET</option>
            <option value="cosechadora/John Deere">John Deere</option>
            <option value="cosechadora/Mainero">Mainero</option>
            <option value="cosechadora/Marani">Marani</option>
            <option value="cosechadora/Massey Ferguson">Massey Ferguson</option>
            <option value="cosechadora/Metalfor">Metalfor</option>
            <option value="cosechadora/New Holland">New Holland</option>
            <option value="cosechadora/Pecayna">Pecayna</option>
            <option value="cosechadora/Procemaq">Procemaq</option>
            <option value="cosechadora/Senor">Senor</option>
            <option value="cosechadora/Vassalli">Vassalli</option>
            <option value="cosechadora/Zanello">Zanello</option>
            <option value="cosechadora/Otras">Otras</option>
      </optgroup>
      <optgroup label="IMPLEMENTOS">
       		<option value="implementos/Lecar">Lecar</option>
            <option value="implementos/Pozzi">Pozzi</option>
            <option value="implementos/Baima">Baima</option>
            <option value="implementos/De Grande">De Grande</option>
      </optgroup>
      <optgroup label="PULVERIZADORAS">
            <option value="pulverizador/Agco Allis">Agco Allis</option>
      		<option value="pulverizador/Agrin">Agrin</option>
            <option value="pulverizador/Agro Efac">Agro Efac</option>
            <option value="pulverizador/Agroflex">Agroflex</option>
            <option value="pulverizador/Barbuy">Barbuy</option>
            <option value="pulverizador/Bernardin">Bernardin</option>
            <option value="pulverizador/Caiman">Caiman</option>
            <option value="pulverizador/Campagnaro">Campagnaro</option>
            <option value="pulverizador/Cancini">Cancini</option>
            <option value="pulverizador/Capurelli">Capurelli</option>
            <option value="pulverizador/Case">Case</option>
            <option value="pulverizador/Cinal for">Cinal for</option>
            <option value="pulverizador/Ciriaci">Ciriaci</option>
            <option value="pulverizador/Corti">Corti</option>
            <option value="pulverizador/Dandy">Dandy</option>
			<option value="pulverizador/Favot">Favot</option>
            <option value="pulverizador/Golondrin">Golondrin</option>
            <option value="pulverizador/Jacto">Jacto</option>
            <option value="pulverizador/John Deere">John Deere</option>
            <option value="pulverizador/Mainero">Mainero</option>
            <option value="pulverizador/Metalfor">Metalfor</option>
            <option value="pulverizador/Montana">Montana</option>
			<option value="pulverizador/Pampero">Pampero</option>
            <option value="pulverizador/Pla">Pla</option>
            <option value="pulverizador/Pony">Pony</option>
            <option value="pulverizador/Praba">Praba</option>
            <option value="pulverizador/Pulqui">Pulqui</option>
            <option value="pulverizador/Releyco">Releyco</option>
            <option value="pulverizador/Syra">Syra</option>
            <option value="pulverizador/Tecma">Tecma</option>            
            <option value="pulverizador/Tedeschi">Tedeschi</option>
            <option value="pulverizador/Yomel">Yomel</option>
            <option value="pulverizador/Otras">Otras</option>
      </optgroup>
      <optgroup label="SEMBRADORAS">
            <option value="sembradora/Agrometal">Agrometal</option>
            <option value="sembradora/Apache">Apache</option>
            <option value="sembradora/Archilli Di Battista">Archilli Di Battista</option>
            <option value="sembradora/Ascanelli">Ascanelli</option>
            <option value="sembradora/Bertini">Bertini</option>
            <option value="sembradora/Bufalo">Bufalo</option>
            <option value="sembradora/Brioschi">Brioschi</option>
            <option value="sembradora/Case">Case</option>
            <option value="sembradora/Cele">Cele</option>
            <option value="sembradora/Crear">Crear</option>
            <option value="sembradora/Chalero">Chalero</option>
            <option value="sembradora/Crucianelli">Crucianelli</option>
            <option value="sembradora/Dan-Car">Dan-Car</option>
            <option value="sembradora/Dasa">Dasa</option>
            <option value="sembradora/Deutz">Deutz</option>
            <option value="sembradora/Distrimaq">Distrimaq</option>
            <option value="sembradora/Dolbi">Dolbi</option>
            <option value="sembradora/Dolzani">Dolzani</option>
            <option value="sembradora/Dumaire">Dumaire</option>
            <option value="sembradora/ERCA">ERCA</option>
            <option value="sembradora/Fabimaq">Fabimaq</option>
            <option value="sembradora/Fercam">Fercam</option>
            <option value="sembradora/Frankhauser">Frankhauser</option>
            <option value="sembradora/Genovesse">Genovesse</option>
            <option value="sembradora/Gherardi">Gherardi</option>
			<option value="sembradora/Gimetal">Gimetal</option>
            <option value="sembradora/Giorgi">Giorgi</option>
            <option value="sembradora/Gitana">Gitana</option>
            <option value="sembradora/John Deere">John Deere</option>
			<option value="sembradora/Juri">Juri</option>
            <option value="sembradora/Juber">Juber</option>
            <option value="sembradora/Malasia">Malasia</option>
            <option value="sembradora/Matermacc">Matermacc</option>
            <option value="sembradora/Metar">Metar</option>
            <option value="sembradora/Migra">Migra</option>
            <option value="sembradora/Monumental">Monumental</option>
            <option value="sembradora/Pampeano">Pampeano</option>
            <option value="sembradora/Pierobon">Pierobon</option>
            <option value="sembradora/Pla">Pla</option>
            <option value="sembradora/Schiarre">Schiarre</option>
            <option value="sembradora/Sembrar">Sembrar</option>
            <option value="sembradora/Semeato">Semeato</option>
            <option value="sembradora/Super Walter">Super Walter</option>
            <option value="sembradora/Tanzi">Tanzi</option>
            <option value="sembradora/Tedeschi">Tedeschi</option>
            <option value="sembradora/Templar">Templar</option>
            <option value="sembradora/VHB">VHB</option>
            <option value="sembradora/Yomel">Yomel</option>
            <option value="sembradora/Zanello">Zanello</option>
            <option value="sembradora/Otras">Otras</option>
      </optgroup>          
      <optgroup label="TOLVAS">
      		<option value="tolva/Agroar">Agroar</option>
            <option value="tolva/Agromac">Agromac</option>
            <option value="tolva/Agromec">Agromec</option>
            <option value="tolva/Akron">Akron</option>
            <option value="tolva/Alo Mac">Alo Mac</option>
			<option value="tolva/Apache">Apache</option>
			<option value="tolva/Ascanelli">Ascanelli</option>
            <option value="tolva/Baima">Baima</option>
            <option value="tolva/Budassi">Budassi</option>
			<option value="tolva/Ceibo">Ceibo</option>
            <option value="tolva/Cerutti">Cerutti</option>
            <option value="tolva/Cestari">Cestari</option>
            <option value="tolva/Comofra">Comofra</option>
			<option value="tolva/Conese">Conese</option>
			<option value="tolva/Dasa">Dasa</option>
            <option value="tolva/De Grande">De Grande</option>
            <option value="tolva/Delba">Delba</option>
			<option value="tolva/El Grillo">El Grillo</option>
            <option value="tolva/El Sol">El Sol</option>
			<option value="tolva/Fabimag">Fabimag</option>
            <option value="tolva/Ferrario">Ferrario</option>
			<option value="tolva/Gentile">Gentile</option>
            <option value="tolva/Giaroli">Giaroli</option>
			<option value="tolva/Gimetal">Gimetal</option>
            <option value="tolva/Impagro">Impagro</option>
            <option value="tolva/J&M">J&M</option>
            <option value="tolva/Jaime Hector">Jaime Hector</option>
            <option value="tolva/lecar">Lecar</option>
            <option value="tolva/Leval">Leval</option>
            <option value="tolva/Mainero">Mainero</option>
            <option value="tolva/Marcelini">Marcelini</option>
            <option value="tolva/Masal">Masal</option>
            <option value="tolva/Metalfor">Metalfor</option>
            <option value="tolva/Metalúrgica Bmb">Metalúrgica Bmb</option>
            <option value="tolva/Moncestino">Moncestino</option>
            <option value="tolva/Montecor">Montecor</option>
            <option value="tolva/Montenegro">Montenegro</option>
            <option value="tolva/Ombu">Ombu</option>
            <option value="tolva/Plastrong">Plastrong</option>
            <option value="tolva/Pony">Pony</option>
            <option value="tolva/Richiger">Richiger</option>
			<option value="tolva/Vica">Vica</option>
			<option value="tolva/Zanello">Zanello</option>          
      </optgroup>
      <optgroup label="TRACTORES">
			<option value="tractor/Abati">Abati</option>
            <option value="tractor/Agco Allis">Agco Allis</option>
            <option value="tractor/Agrale">Agrale</option>
            <option value="tractor/Agrinar">Agrinar</option>
            <option value="tractor/Allis Chalmers">Allis Chalmers</option>
            <option value="tractor/Apache">Apache</option>
            <option value="tractor/Bernardín">Bernardín</option>
            <option value="tractor/Case IH">Case IH</option>
            <option value="tractor/Caterpillar">Caterpillar</option>
            <option value="tractor/Challenger CAT">Challenger CAT</option>
            <option value="tractor/Deutz">Deutz</option>
            <option value="tractor/Deutz Fahr">Deutz Fahr</option>
            <option value="tractor/Fahr">Fahr</option>
            <option value="tractor/Fiat">Fiat</option>
            <option value="tractor/Ford">Ford</option>
            <option value="tractor/Hanomag">Hanomag</option>
            <option value="tractor/">Husqvarna</option>
            <option value="tractor/John Deere">John Deere</option>
            <option value="tractor/Kubota">Kubota</option>
            <option value="tractor/Macrosa">Macrosa</option>
            <option value="tractor/Mahindra">Mahindra</option>
            <option value="tractor/Mancini">Mancini</option>
            <option value="tractor/Massey Ferguson">Massey Ferguson</option>
            <option value="tractor/Massey Harris">Massey Harris</option>
            <option value="tractor/Mercedes Benz">Mercedes Benz</option>
            <option value="tractor/Metalúrgica SB">Metalúrgica SB</option>
            <option value="tractor/New Holland">New Holland</option>
            <option value="tractor/Pauny">Pauny</option>
            <option value="tractor/Same">Same</option>
            <option value="tractor/Someca">Someca</option>
            <option value="tractor/Tracza">Tracza</option>
            <option value="tractor/TyM">TyM</option>
            <option value="tractor/Valmet">Valmet</option>
            <option value="tractor/Valtra">Valtra</option>
            <option value="tractor/Vassalli">Vassalli</option>
            <option value="tractor/Zetor">Zetor</option>
            <option value="tractor/Zanello">Zanello</option>
            <option value="tractor/Otras">Otras</option>
      </optgroup>
    </select>
    
                    </div>
                <span class="selectRequiredMsg">Seleccione un elemento.</span></span>
            </div>
            <div style="width:50%; float:left" class="Estilo6" >    	        
            	<span class="Estilo6">Destacar en sitio Web:</span><input name="destacado" type="checkbox" id="destacado" value="si" <? if($row[16] =='si') {?> checked="CHECKED" <? }?> >
            </div>
	  	</div>
        
        
        <div class="form"> <span class="Estilo6">Modelo:</span><br>
  			<input name="modelo" type="text" id="modelo" size="75" value="<?php echo $row[3] ?>" />
  		</div>
		<div class="form">
  			<div>
    			<div style="width:50%; float:left"  class="Estilo6"><span >A&ntilde;o:</span><br><input name="anio" type="text" id="anio" value="<?php echo $row[2] ?>" /></div>
			    <div style="width:50%; float:left" class="Estilo6" ><span  >Color:</span><br><input type="text" name="color" id="color" value="<?php echo $row[6] ?>" ></div>
    		</div>
	  	</div>
    	<div class="form" style="height:170px; "><span class="Estilo6">Descripci&oacute;n/Detalle:</span>
  			<textarea cols="60" rows="6" name="descripcion" id="descripcion"><?php echo $row[7] ?></textarea>
   		</div>
		<div class="form">  
   			<div style="width:50%; float:left" class="Estilo6" ><span class="Estilo6">Tipo :</span><br>
        	<select name="nuevo" id="nuevo">
            	<option value="nuevo" <? if($row[8]=='nuevo') { ?> selected <? } ?> >NUEVO</option>
            	<option value="usado" <? if($row[8]=='usado') { ?> selected <? } ?> >USADO</option>
            </select>
        	</div>   
	   		<div style="width:50%; float:left" class="Estilo6" >
    	        <span id="sprytextfield1">
                <div class="form" > 
                	<span class="Estilo6">Precio:</span><br>
			        <input name="precio" type="text" id="precio" value="<?php echo $row[10] ?>" />
       				<span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no v&aacute;lido.</span>
                </div>
                </span>
        	</div>
   		</div>
        <div class="form">
        	<div style="width:50%; float:left" class="Estilo6" ><span class="Estilo6">URL Video:</span><br>
  			<input name="video" type="text" id="video"  value="<?php echo $row[17] ?>" />
            </div>
            <div style="width:50%; float:left" class="Estilo6" ><span class="Estilo6">Kilometraje/Horas:</span><br>
  			<input name="km" type="text" id="km"  value="<?php echo $row[4] ?>"  />
            </div>
   		</div>
        <div class="form" style=" height:300px; "><span class="Estilo6">Cargar Imagenes:</span><br>
        	<iframe width="100%" height="300" frameborder="0" scrolling="no" src="usados/modificar.php?id_vehiculo=<? echo $id; ?>"></iframe>
        </div>
        <div class="form" style="padding-bottom:20px;" >
        <input name="id" type="hidden" value="<?php echo $id ?>">
        <input name="modificar" type="submit" class="enviar" id="modificar" value="Modificar Maquinaria" />
        </div>
	</form>
 	</div>
 	</td>
  </tr>  
</table>

<div class="clear"></div>
	</div> 
</div>
<div class="clear"></div>

		<?php include('../templates/footer.php'); ?>	

</body>
</html>