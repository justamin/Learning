##Classes
- Functions inside of classes are called, methods
- Functions outside of classes are called, functions
- constructor functions are automatically triggered on instantiation
	`new Task('Wash the car')`
- the instance of a class is an object
	- e.g. `$task = new Task('Go to the store');`
- We can assign a property to the object by using the $this syntax
	- e.g. : 
	```
		class Task {
			// __construct is a constructor
			public function __construct($description) {
				$this->description = description;
			}
	```
	`$this->description` means that we're assigning a property (description) to $this object
- We can use function within the class to interact with a property