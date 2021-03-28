# invo-task
pure PHP MVC admin panel with CRUD functionality

1. **Incapsulation** is realized in [Router class](/components/Router.php) _**getUri**_ method which is private, and can be called only inside the Router class
2. **Polimorfism** is realized in [Router class](/components/Router.php) _**run**_ method, which takes a request string and generates controllers and methods names