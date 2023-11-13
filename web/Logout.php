
<?php 
 session_start();
 session_destroy();
 header("Location:index.php");
?>
<script>
    window.location.replace("index.php");
</script>