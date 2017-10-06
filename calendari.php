<?php
	#aquí defineixo les variables que necessitaré mes endavant
	$mes=date("n");
	$any=date("Y");
	$diaActual=date("j");
	#Aquí obtinc el dia de la semana del primer dia de mes (0 diumenge i 6 dissabte)
	$diaSemana=date("w",mktime(0,0,0,$mes,1,$any))+7;
	#Aquí guardem l'ultim dia del mes
	$ultimDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$any)-1));
	$mesos=array(1=>"Gener","Febrer","Març","Abril","Maig","Juny","Juliol","Agost","Septembre","Octubre","Novembre","Desembre");
?> 
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Calendari mguerra</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
			<h1>Calendari en php</h1>
		<table id="calendar">
			<caption><?php echo $mesos[$mes]." ".$any?></caption> <!-- aqui es mostrara el mes i l'any-->	
			<tr>
				<th>Dilluns</th><th>Dimarts</th><th>Dimecres</th><th>Dijous</th>
				<th>Divendres</th><th>Dissabte</th><th>Diumenge</th>
			</tr>
			<tr bgcolor="silver">
				<?php
					$last_cell=$diaSemana+$ultimDiaMes;
					// fem un bucle fins 42, que es el maxim de cel·les que hi pot haber... 6 columnes de 7 dies
					for($i=1;$i<=42;$i++){
						if($i==$diaSemana){
							// determinem en quin dia comença el mes
							$dia=1;
						}
						if($i<$diaSemana || $i>=$last_cell){
							// cel·la buida
							echo "<td>&nbsp;</td>";
						}
						else{
							// mostrem el dia
							if($dia==$diaActual)
								echo "<td class='hoy'>$dia</td>";
							else
								echo "<td>$dia</td>";
							$dia++;
						}
						//al final de la setmana es crea una nova fila
						if($i%7==0){
							echo "</tr><tr>\n";
						}
					}
				?>
			</tr>
			</table>
		</div>
	</body>
</html>
