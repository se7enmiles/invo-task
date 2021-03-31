# Books Database Admin Panel
____
##### _pure PHP/MySQL project based on MVC pattern with CRUD functionality_
_completed on 31.03.2021 as a practical assignment for INVO LLC accepted on 26.03.2021_
___
* Admin dashboard template is taken from [Theme Forest - Atlant](https://themeforest.net/item/atlant-bootstrap-admin-template/9217590)
* Database dummy data is generated using [Fill Database](http://filldb.info/) 

***Refering back to our interview want to mention some points***
1. **Incapsulation** is realized in [Router class](/components/Router.php) _**getUri**_ method which is private, and can be called only inside the Router class
2. **Polimorfism** is realized in [Router class](/components/Router.php) _**run**_ method, which takes a request string and generates controllers and methods names
3. **Password Hashing** is realized in [User model](/models/user.php) ***register*** and ***login*** methods

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
