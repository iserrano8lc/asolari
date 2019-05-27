<div class="topnav">
    <div class="insider">
        <a href="index.php" class="logo"><img src="img/logo.png" /></a>
        <a href="https://www.youtube.com/channel/UCYijhv_fsQAdyTnaEXtqcXQ" target="_blank" class="twitter" style="position:absolute; right:58px; top:-54px; color:#fff; text-shadow:0px 1px 2px #333; width:198px; padding-left:32px; font-size:14px; text-decoration:none; background-repeat:no-repeat; line-height:26px; font-weight: bold;"> Vídeos de nuestros productos</a>
        <a href="https://www.facebook.com/Aprovechamiento-Solar-Integral-863532513686050/?fref=ts" target="_blank" class="facebook"  style="position:absolute; right:8px; top:-54px"></a>
        <ul class="principal">
            <li><a href="index.php" <?PHP if($nMenu == 1) echo 'class="selected"' ?>>Inicio</a></li>                            
            <li><a href="beneficios.php" <?PHP if($nMenu == 3) echo 'class="selected"' ?>>Nosotros</a></li>
            <li><a href="como-funciona.php" <?PHP if($nMenu == 2) echo 'class="selected"' ?>>Como funciona</a></li>
            <li><a href="amortizacion-y-financiamiento.php" <?PHP if($nMenu == 7) echo 'class="selected"' ?>>Amortización & Financiamiento</a></li>
            <li><a href="productos.php" <?PHP if($nMenu == 4) echo 'class="selected"' ?>>Productos</a></li>                    
            <li><a href="comprar.php" <?PHP if($nMenu == 5) echo 'class="selected"' ?>>Contacto</a></li>
        </ul>
        <h1><?PHP 
		//if($nMenu == 1) echo 'class="selected"'; 
		if($nMenu == 2) echo 'COMO FUNCIONA';
		if($nMenu == 3) echo 'NOSOTROS';
		if($nMenu == 4) echo 'PRODUCTOS';
		if($nMenu == 5) echo 'CONTACTO';
		if($nMenu == 7) echo 'AMORTIZACIÓN Y FINANCIAMIENTO';
		?>
        </h1>        
    </div>
</div>