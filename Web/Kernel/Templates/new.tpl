<div class="content">
	<h1>Obtén tu sala de chat ¡ahora!</h1>
	
		<p>
			¡Crea tu sala con estos sencillos pasos! Todo un asistente de creación de salas a tu disposición, es fácil y divertido. Cuando termines te daremos el link de acceso a tu sala y un código JavaScript para agregarlo en tu sitio web.
		</p>
		
		<section class="center">
			<a data-step="1" data-value="public" class="s1">
				<img src="%RESOURCES%/images/etc/public.png" alt="Pública" title="Sala pública" />
				<label>Pública</label>
			</a>
			
			<a data-step="1" data-value="private" class="s1" disabled>
				<img src="%RESOURCES%/images/etc/private.png" alt="Pública" title="¡Próximamente!" />
				<label>Privada</label>
			</a>
		</section>
		
		<section class="step block" data-step="2">
			<h3>Opciones</h3>
			
			<p>
				Ajusta algunos detalles de tu sala de chat, los campos con una línea de borde superior rosada inicial son obligatorios.
			</p>
			
			<form id="chat-config" class="dual">
				<section>
					<p>
						<label for="name">Nombre de la sala:</label>
						<input type="text" id="name" required autocapitalize="on" x-webkit-speech speech />
					</p>
					
					<p>
						<label for="desc">Descripción:</label>
						<textarea id="desc"></textarea>
					</p>
					
					<p>
						<label for="radio">Dirección de radio:</label>
						<input type="url" id="radio" />
					</p>
					
					<p>
						<label for="web">Sitio web:</label>
						<input type="url" id="web" />
					</p>
					
					<p>
						<input type="checkbox" id="visible" value="true" checked /> Visible en la lista de salas de %SITE_NAME%
					</p>
					
					<p>
						<input type="submit" value="Continuar" class="ibtn" />
					</p>
				</section>
				
				<section>
					<p>
						<input type="checkbox" id="smilies" value="true" checked /> Permitir caritas "Smilies".
					</p>
					
					<p>
						<input type="checkbox" id="bbc" value="true" checked /> Permitir códigos BBC.
					</p>
					
					<p>
						<input type="checkbox" id="wordsfilter" value="true" checked /> Bloqueo de malas palabras.
					</p>
					
					<p>
						<input type="checkbox" id="text_color" value="true" disabled /> Permitir color de letra personalizada (Próximamente).
					</p>
					
					<p>
						<input type="checkbox" id="sound_message" value="true" /> Reproducir sonido al recibir mensaje.
					</p>
					
					<p>
						<input type="checkbox" id="social_buttons" value="true" checked /> Mostrar botón para compartir.
					</p>
					
					<p>
						<input type="checkbox" id="onlineusers" value="true" disabled /> Guardar mensajes (Próximamente).
					</p>
				</section>
			</form>
		</section>
		
		<section class="step" data-step="3">
			<h3>¿Como será tu sala?</h3>
			
			<div class="box-error" id="error"></div>
			
			<form id="chat-style">
				<p>
					<label for="background">Imagen de fondo:</label>
					<input type="url" id="background" placeholder="http://" /><br />
					
					<?php foreach($bgs as $img) { ?>
					<img src="%RESOURCES%/images/bgs/<?php echo $img; ?>.jpg" data-background="<?php echo $img; ?>" class="preview" />
					<?php } ?>
				</p>
				
				<p>
					<label for="box_background">Color de fondo RGB de los cuadros:</label>
					<input type="text" id="box_background" value="255, 255, 255" readonly />
				</p>
				
				<p>
					<label for="box_trans">Transparencia de los cuadros:</label>
					<input type="range" id="box_trans" value="80" min="1" max="100" />
					
					<label id="trans">80%</label>
				</p>
				
				<p>
					<label for="font_color">Obligar color de letra RGB:</label>
					<input type="text" id="font_color" />
				</p>
				
				<details>
					<summary>Avanzado</summary>
					
					<p>
						<label for="my_css">Archivo CSS personalizado:</label>
						<input type="text" id="my_css" placeholder="http://" />
						<span>Puedes agregar tus propias reglas de CSS y personalizar tu sala al máximo, para ello (y por ahora) revisa el <a href target="_blank" id="chat-link">código fuente</a> de tu chat y observa las etiquetas, clases e Ids del mismo, te recomendamos también usar la consola.</span>
					</p>
				</details>
				
				<p>
					<label>Código de seguridad</label>
					<?php Captcha::Show(); ?>
				</p>
				
				<p>
					<input type="button" id="apply" value="Aplicar cambios" class="ibtn" />
					<input type="submit" value="Guardar y finalizar" class="ibtn" />
				</p>
			</form>
			
			<div class="mychat">
				<iframe src="" width="500" height="500" frameborder="0" scrolling="no"></iframe>
			</div>
		</section>

</div>