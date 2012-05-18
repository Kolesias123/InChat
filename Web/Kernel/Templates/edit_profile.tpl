<div class="content">
	<h1>Edita tu perfil</h1>
	
	<form action="%PATH%/actions/save_profile.php?from=frame" method="POST" class="frame" enctype="multipart/form-data">
		<p>
			<label for="username">Nombre de usuario:</label>
			<input type="text" name="username" id="username" value="%my_username%" required x-webkit-speech speech />
		</p>
		
		<p>
			<label for="photo">Foto de perfil:</label>
			<img src="%PATH%/photo/%my_id%" id="myphoto" /><br />
			<input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/gif" />
		</p>
		
		<p>
			<a href="%PATH%/profile" target="_profile">¿Más? Edita tu perfil completo.</a>
		</p>
		
		<p>
			<input type="submit" value="Guardar cambios" class="ibtn" />
		</p>
	</form>
</div>

<script>
$("#photo").on("change", function(e) {
	K.ReadPhoto(e, "#myphoto");
});
</script>