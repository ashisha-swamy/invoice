#INVOICE MANAGEMENT
#### Folder Name: invoice

#### db: billing_details
1. Clone/Download the invoice folder
2. Extract the folder in www in case of WAMP server and htdocs in XAMPP server
3. Import db in to WAMP/XAMPP
4. DB name should be billing_details. If you give another name for DB you need to change it in the database.php in config folder.
5. Then call in browser like "localhost/invoice"
6. You can import billing_details.sql(database) from db folder in invoice



NOTE:
- User can Login to the application using username: **test_user** and
password: **password123**
- After successfull login the user can add any products, price, quantity and tax also.
- Grand total is automatically  displayed according to the insertion of products.
- User can choose discount by percentage or amount or no discount option.(user should choose anyone)
- The total price is displayed according to the selected discount option.
- Generate invoice button gives the invoice as a printable format.


