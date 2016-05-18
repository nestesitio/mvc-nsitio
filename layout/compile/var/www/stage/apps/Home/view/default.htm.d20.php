<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
$this->layout('freelancer::main') ?>

<p>Teste</p>




<!-- /.row --><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>