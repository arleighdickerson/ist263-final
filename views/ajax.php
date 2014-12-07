<?php
header ( 'Content-Type: application/json' );
echo json_encode ( $this->models, JSON_PRETTY_PRINT);
?>