<script src="%RESOURCES%/js/functions.web.js"></script>

<div class="content">
	<h1>Sala: %room_name%</h1>
	
	<section>
		<div class="inchat-box" data-roomId="%room_id%" data-width="950" data-height="500"></div><br />
		
		<div class="fb-like" data-href="%PATH%/room/%room_id%" data-send="true" data-layout="button_count" data-width="100" data-show-faces="true" data-font="segoe ui"></div>
		
		<div class="g-plusone" data-size="medium" data-href="%PATH%/room/%room_id%"></div>
		
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="%PATH%/room/%room_id%" data-lang="es" data-related="Kolesias123" data-hashtags="InChat">Twittear</a>
	</section>
	
	<?php if($info['ownerId'] == MY_ID) { ?>
	
	<section>
		<h2>Insertar en tu sito web</h2>
		
		<p>
			¿Deseas llevar tu sala de chat a tu propio sitio web? ¡Claro que puedes! Copia y pega el siguiente código <b>HTML 5</b> en tu sitio web:
		</p>
		
		<textarea readonly onclick="this.select()" class="share-code">&lt;!-- Incluimos jQuery y el archivo de implementaci&oacute;n del chat para su sitio web --&gt;
&lt;script&gt;window.jQuery || document.write('&lt;script src=&quot;http://code.jquery.com/jquery-latest.js&quot;&gt;x3C/script&gt;')&lt;/script&gt;
&lt;script src=&quot;%RESOURCES%/js/functions.web.js&quot;&gt;&lt;/script&gt;

&lt;!-- Cargamos el chat --&gt;
&lt;div class=&quot;inchat-box&quot; data-roomId=&quot;%room_id%&quot; data-width=&quot;500&quot; data-height=&quot;500&quot;&gt;&lt;/div&gt</textarea>
		
		<p>
			En el código anterior tu sala de chat se cargará con un tamaño de <b>500 píxeles de ancho y 500 píxeles de alto</b>, es el tamaño que recomendamos para instalar tu Chat, en todo caso y por motivos de diseño el minimo de tamaño es de 300 de ancho y 300 de alto.
		</p>
	</section>
	
	<section>
		<h2>Opciones de sala</h2>
		
		<div class="box-error" id="error">
			<?php echo $error; ?>
		</div>
		
		<form action="%PATH%/actions/update_room.php" method="POST" class="dual">
			<input type="hidden" name="roomId" value="%room_id%" />
			
			<section>
				<p>
					<label for="name">Nombre de la sala</label>
					<input type="text" name="name" value="<?php echo $info['name']; ?>" required autocapitalize="on" x-webkit-speech speech />
				</p>
				
				<p>
					<label for="desc">Descripción:</label>
					<textarea name="desc"><?php echo $info['description']; ?></textarea>
				</p>
					
				<p>
					<label for="radio">Dirección de radio:</label>
					<input type="url" name="radio" value="<?php echo $options['radio']; ?>" />
				</p>
				
				<p>
					<label for="web">Sitio web:</label>
					<input type="url" name="web" value="<?php echo $options['web']; ?>" />
				</p>
				
				<p>
					<input type="checkbox" name="visible" value="true" <?php echo $options['visible'] == "true" ? 'checked' : ''; ?> /> Visible en la lista de salas de %SITE_NAME%
				</p>
				
				<p>
					<input type="submit" value="Guardar cambios" class="ibtn" />
				</p>
			</section>
			
			<section>
				<p>
					<input type="checkbox" name="smilies" value="true" <?php echo $options['smilies'] == "true" ? 'checked' : ''; ?> /> Permitir caritas "Smilies".
				</p>
				
				<p>
					<input type="checkbox" name="bbc" value="true" <?php echo $options['bbc'] == "true" ? 'checked' : ''; ?> /> Permitir códigos BBC.
				</p>
				
				<p>
					<input type="checkbox" name="wordsfilter" value="true" <?php echo $options['wordsfilter'] == "true" ? 'checked' : ''; ?> /> Bloqueo de malas palabras.
				</p>
				
				<p>
					<input type="checkbox" name="text_color" value="true" disabled <?php echo $options['text_color'] == "true" ? 'checked' : ''; ?> /> Permitir color de letra personalizada (Próximamente).
				</p>
				
				<p>
					<input type="checkbox" name="sound_message" value="true" <?php echo $options['sound_message'] == "true" ? 'checked' : ''; ?> /> Reproducir sonido al recibir mensaje.
				</p>
					
				<p>
					<input type="checkbox" name="social_buttons" value="true" <?php echo $options['social_buttons'] == "true" ? 'checked' : ''; ?> /> Mostrar botónes para compartir.
				</p>
					
				<p>
					<input type="checkbox" name="onlineusers" value="true" disabled <?php echo $options['onlineusers'] == "true" ? 'checked' : ''; ?> /> Guardar mensajes (Próximamente).
				</p>
			</section>
		</form>
	</section>
	
	<section>
		<h2>Estilo de sala</h2>
		
		<p>
			¡Desarrollandose!
		</p>
	</section>
	
	<?php } ?>
</div>