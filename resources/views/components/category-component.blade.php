<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
    	 @foreach ($categories as $category)
          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">{{$category->name}}</a>
            <ul class="dropdown-menu">
            	@foreach($category->subcategory as $subcategory)
              <li><a class="dropdown-item" href="#">{{$subcategory->name}}</a></li>
              	@endforeach
            </ul>
          </li>
          @endforeach
    </ul>
</div>