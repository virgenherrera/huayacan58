<li class="dropdown">
	<a href="#" title="Home" data-toggle="dropdown" data-hover="dropdown" id="menu_item_Home" data-ref="#" class="dropdown-toggle">
		<img class="img-thumbnail" data-src="holder.js/50x50" alt="50x50" src="<?=base_url('imgs/user').'/'.$userImage;?>" style="width: 40px; height: 40px;" />
		<?=$userName;?>
		<span class="caret"></span>
	</a>
	<ul aria-labelledby="menu_item_Home" class="dropdown-menu">
		<li><a href="<?=base_url('usuario').'/'.$userName;?>">Perfil</a></li>
		<li><a href="<?=base_url('logout');?>">Logout</a></li>
	</ul>
</li>