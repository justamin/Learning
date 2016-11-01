#PHP Dev Tips

#Classes
- Functions inside of classes are called, methods
- constructor functions are automatically triggered on instantiation
- the instance of a class is an object
	- e.g. '$task = new Task('Go to the store');'
- We can assign a property to the object by using the $this syntax
	- e.g.
	<?php
		class Task {
			public function __construct($description) {
				$this->description = description;
			}
	?>