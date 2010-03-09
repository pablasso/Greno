<?php

$message = "";
$i = 0;

foreach ($this->data['Configuration'] as $key => $value)
{
	$message .= "{$key}:{$value}";
	if ($i < count($this->data['Configuration'])-1) {
		$message .= ",";
	}
	$i++;
}

echo $message;

?>