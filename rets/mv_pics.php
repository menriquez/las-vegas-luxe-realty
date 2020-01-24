<?php

$pwd = getcwd();
for ($i==0;$i<100;$i++) {
	echo("mv $i*.webp photos\n");
	@exec("mv $i*.webp photos");

}

