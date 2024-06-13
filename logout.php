<?php
session_start();
session_destroy();
?>
<script language="javascript">
    alert("Anda Yakin Akan logout??");
    document.location="login.php";
</script>