<?php
function paginar($total,$nreg,$url,$iframe,$pagina){
	echo "<script>function envia(a){".$iframe."=a;};</script>";
	if($total > $nreg) {
		$totalPag = ceil($total/$nreg);
		echo "<center><select class='campo' name='paginas' onchange='envia(this.value)'>";
		for($r=0;$r < $totalPag;$r++){
			$reg1=$r * $nreg;
			$reg2=$r * $nreg+$nreg;
			if($reg2>$total)$reg2=$total;
			$np=$r + 1;
			$reg1a=$reg1+1;
			if($pagina==$r){
				echo "<option value='$url&r_ini=$greg&offset=$reg1&pagina=$r' selected> Pg. $np [$reg1a-$reg2] de $total</option>";
			}
			else{
				echo "<option value='$url&r_ini=$greg&offset=$reg1&pagina=$r'> Pg. $np [$reg1a-$reg2] de $total</option>";
			}
		}
		echo "</select></center>";
	}
}
?>