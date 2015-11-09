<div class="col-sm-6 col-md-4 pokemon-index">
	<img src="..\images\pokemon\{{ $pokemon->id }}.png">
	<div class="cat">
		<span class="pokemon-number"><p>{{ $pokemon->id}}</p></span><span class="pokemon-name"><p>{{ substr($pokemon->name, 0, 12) }}</p></span>
	</div>
</div>