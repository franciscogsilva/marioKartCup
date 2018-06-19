	<?php
		$route = "";
		switch ($menu_item) {
		    case 1:
		    	$route = route('publications.create');
		        break;
		    case 2:
		    	$route = route('programs.create');
		        break;
		    case 3:
		    	$route = route('staff.create');
		        break;
		    case 5:
		    	$route = route('advertising.create');
		        break;
		    case 6:
		    	$route = route('resources.create', 1);
		        break;
		    case 7:
		    	$route = route('resources.create', 2);
		        break;
		    case 9:
		    	$route = route('resources.create', 3);
		        break;
		    case 10:
		    	$route = route('polls.create');
		        break;
		    case 12:
		    	$route = route('publication_types.create');
		        break;
		}
	?>
	<div class="fixed-action-btn">
		<a class="waves-effect waves-light btn-floating btn-large teal z-depth-3 create-new-fgs pulse tooltipped" data-position="left" data-delay="50" data-tooltip="Crear Nuevo" href="{{ $route }}">
			<i class="large material-icons">add</i>
		</a>		
	</div>