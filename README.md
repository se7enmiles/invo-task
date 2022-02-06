# Books Database Admin Panel
____
##### _pure PHP/MySQL project based on MVC pattern with CRUD functionality_
_completed on 1.04.2021 as a practical assignment for INVO LLC accepted on 26.03.2021_
___
>***Live link for online demonstration [Books](http://books.surenmadoyan.com)***

>***Refer to the [screenshots table](#table) for interface instructions***
#### Local installation
1. Clone this repo
2. Download [this db dump](/config/database.sql)
3. Change db credentials in `/config/db.php`
#### Database structure
1. Books
2. Authors
3. Books-Authors Relation (ONE to MANY)
4. Users
#### User info
1. You can register as a new user, without admin access
2. Or login as admin (`admin/123456`) or as user (`user/123456`)
3. All users has access to read data
#### Admin privileges
1. Create books (along with choosing/creating authors)
2. Update books (along with creating/changing authors and updating book-author relation)
3. Delete books (along with deletion of relations of deleted book)
#### Important to say
1. Authors CRUD is not implemented as a separate functionality, but author creation has pretty strict logic to prevent duplication in databases
2. Application is based on simple MVC pattern and popular routing logic, all pages and functions work on url `.../controller/action` logic
3. The interface might have obvious wrong parts, they are created on purpose for demonstration of some functionality, like denied access etc.
4. Validation rules are simple, just for demonstration
#### Confession
1. I could write a simple solution and complete the task quickly, but I dived into process and tried to do my best working on this project
2. I tried to use/implement/show some technologies and functionality to demonstrate and prove my skills, even my English
3. During work I tried to keep track on working process using `git` to show the whole process
___
* Admin dashboard template is taken from [Theme Forest - Atlant](https://themeforest.net/item/atlant-bootstrap-admin-template/9217590)
* Database dummy data is generated using [Fill Database](http://filldb.info/) 
___
***Refering back to our interview I want to mention some points***
1. **Encapsulation** is realized in [Router class](/components/Router.php) _**getUri**_ method which is private, and can be called only inside the Router class
2. **Polimorfism** is realized in [Router class](/components/Router.php) _**run**_ method, which takes a request string and generates controllers and methods names
3. **Password Hashing** is realized in [User model](/models/User.php#LC59) ***register*** and ***login*** methods using `password_hash()` and `password_validate()` functions

<div id="table">

Home page | Dashboard page
------------ | -------------
<img width="300" src="images/homePage.png" alt=""> | <img width="300" src="images/adminDashboard.png" alt="">
Registration page | Log In page
<img width="300" src="images/registerPage.png" alt=""> | <img width="300" src="images/loginPage.png" alt="">
Books page | Authors page
<img width="300" src="images/booksPage.png" alt=""> | <img width="300" src="images/authorsPage.png" alt="">
Single Book page | Single Author page
<img width="300" src="images/singleBookPage.png" alt=""> | <img width="300" src="images/singleAuthorPage.png" alt=""> 
Add Book page | Update Book page
<img width="300" src="images/addBookPage.png" alt=""> | <img width="300" src="images/updateBookPage.png" alt="">
Delete Book page | Access Denied page
<img width="300" src="images/deleteBook.png" alt=""> | <img width="300" src="images/errorPage.png" alt="">

</div>
