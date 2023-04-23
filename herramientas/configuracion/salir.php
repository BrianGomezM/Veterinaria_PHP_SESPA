<?php		
	session_destroy();
	echo"<script>parent.location.href='$_SESSION[UrlApp]'</script>";
?>		