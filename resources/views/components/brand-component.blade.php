<div>
    <!-- Be present above all else. - Naval Ravikant -->
    <div class="dropdown-menu" aria-labelledby="brandDropdown">
		@foreach ($brands as $brand)
		<a class="dropdown-item" href="#">{{$brand->name}}</a>
		@endforeach
	</div>
</div>