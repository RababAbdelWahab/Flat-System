# Flat-System
As the system was required to be a web-based application, I preferred to use Laravel framework as it’s a fast, easy, also I am still learning it online so I wanted to improve my experience in it by practicing, also it’s an MVC which provides a good structure for my system. So the system flow will be like this: First the system goes to the route then to the controller, then to the view, then to the model.

# Tools
 Framework: Laravel (version 6.0.0 )

 Code Editor: Visual Studio Code

 Languages: PHP, HTML5, CSS3, jQuery, Bootstrap

 Database: SQLite

# Database Schema
![Screenshot](Schema.PNG)

There is a relation many to many between the 2 tables Flat and Receivable, so I created a third
new table describing this relation called flatreceivables having 2 foreign keys flatId and
receivableId.

# GUI Structure
The GUI separated to 3 sections:

 Right side bar contains all the system lists

  1. Flats which is a full CRUD into the database in the flats table (create, read,
  update, delete)
  2. Receivables which is a full CRUD into the database in the Receivables table
  (create, read, update, delete)
  3. Flatreceivables which is a full CRUD into the database in the flatreceivables table
  (create, read, update, delete)
  4. Outgoings which is a full CRUD into the database in the outgoings table (create,
  read, update, delete)
  5. FlatPayments which is a full CRUD into the database in the flatreceivables table
  in the field isPaid (create, read, update, delete)
  
 Header contains the 3 required reports in 3 buttons

  1. Total Balance Report which describes the total paid payments – the total
  expenses
  2. The Expenses Report which shows the expanses between 2 dates
  3. The Flats Receivables Report which shows the un paid receivables for each flat
  
 The page shows the displaying content of any page from the previous ones

# How to run?
1. Install Xampp, PHP Version 7.3.8
2. Install Laravel Framework Version 6.0.0
3. Install DB Browser for SQLite Version 3.11.2
4. Install Visual Studio Code editor
5. Run Xampp local host
6. Go to url: http://localhost/abmAssessment/public/

# Demo URL
https://youtu.be/ZIZue8K4zdg
