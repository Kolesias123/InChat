<div class="content">
	<?php 
	while($row = mysql_fetch_assoc($rooms)) 
	{
		$style = json_decode($row['style'], true);
				
		if(!empty($style['background']))
			$background = Core::isValid($row['background'], "url") ? $row['background'] : RESOURCES . "/images/bgs/$style[background].jpg";
	?>
	<div class="room">
		<?php if(!empty($background)) { ?>
		<figure>
			<img src="<?php echo $background; ?>" />
		</figure>
		<?php } ?>
				
		<aside>
			<a href="%PATH%/room/<?php echo $row['id']; ?>" class="name"><?php echo $row['name']; ?></a>
			
			<p>
				<?php echo CleanText($row['description']); ?>
			</p>
					
			<time><?php echo Core::TimeDate($row['date']); ?> (<?php echo Core::CalculateTime($row['date']); ?>)</time>
		</aside>
	</div>
	<?php } ?>
</div>