# Educational project using php oop and crud

# Database Schema for `audio`

## Database: `audio`

This database schema is designed for an e-commerce system with functionalities such as user management, product catalog, orders, reviews, and more. Below is the detailed structure of the tables and their relationships.

### Table: `users`

- **id**: Primary Key
- **username**: User's username
- **email**: User's email address (unique)
- **passwordhash**: Hashed password
- **firstname**: User's first name
- **lastname**: User's last name
- **address**: User's address
- **city**: City of the user
- **country**: Country of the user
- **postalcode**: Postal code of the user
- **phonenumber**: User's phone number
- **isadmin**: Boolean to indicate admin status
- **datecreated**: Timestamp of when the user was created

### Table: `roles`

- **id**: Primary Key
- **rolename**: Name of the role (unique)

### Table: `userroles`

- **id**: Primary Key
- **userid**: Foreign Key referencing `users(id)`
- **roleid**: Foreign Key referencing `roles(id)`

### Table: `products`

- **id**: Primary Key
- **productname**: Name of the product
- **description**: Description of the product
- **price**: Price of the product
- **stock**: Available stock of the product
- **categoryid**: Foreign Key referencing `categories(id)`
- **dateadded**: Timestamp of when the product was added

### Table: `categories`

- **id**: Primary Key
- **categoryname**: Name of the category

### Table: `orders`

- **id**: Primary Key
- **userid**: Foreign Key referencing `users(id)`
- **orderdate**: Timestamp of when the order was placed
- **totalamount**: Total amount of the order
- **status**: Status of the order
- **shippingaddress**: Shipping address for the order
- **billingaddress**: Billing address for the order

### Table: `orderdetails`

- **id**: Primary Key
- **orderid**: Foreign Key referencing `orders(id)`
- **productid**: Foreign Key referencing `products(id)`
- **quantity**: Quantity of the product ordered
- **price**: Price of the product at the time of order

### Table: `payments`

- **id**: Primary Key
- **orderid**: Foreign Key referencing `orders(id)`
- **paymentdate**: Timestamp of when the payment was made
- **amount**: Amount paid
- **paymentmethod**: Method of payment
- **paymentstatus**: Status of the payment

### Table: `reviews`

- **id**: Primary Key
- **productid**: Foreign Key referencing `products(id)`
- **userid**: Foreign Key referencing `users(id)`
- **rating**: Rating given by the user (1 to 5)
- **reviewtext**: Review text
- **reviewdate**: Timestamp of when the review was written

### Table: `shoppingcart`

- **id**: Primary Key
- **userid**: Foreign Key referencing `users(id)`
- **productid**: Foreign Key referencing `products(id)`
- **quantity**: Quantity of the product in the cart
- **dateadded**: Timestamp of when the product was added to the cart

### Table: `addresses`

- **id**: Primary Key
- **userid**: Foreign Key referencing `users(id)`
- **addressline1**: First line of the address
- **addressline2**: Second line of the address
- **city**: City of the address
- **country**: Country of the address
- **postalcode**: Postal code of the address
- **isprimary**: Boolean to indicate if this is the primary address

### Table: `wishlists`

- **id**: Primary Key
- **userid**: Foreign Key referencing `users(id)`
- **productid**: Foreign Key referencing `products(id)`
- **dateadded**: Timestamp of when the product was added to the wishlist

### Table: `inventory`

- **id**: Primary Key
- **productid**: Foreign Key referencing `products(id)`
- **quantitychange**: Change in the quantity of the product
- **changedate**: Timestamp of when the change occurred
- **changereason**: Reason for the change in quantity

### Table: `productimages`

- **id**: Primary Key
- **productid**: Foreign Key referencing `products(id)`
- **imageurl**: URL of the product image

## Relationships

- **users** to **userroles**: One-to-Many (A user can have multiple roles)
- **roles** to **userroles**: One-to-Many (A role can be assigned to multiple users)
- **categories** to **products**: One-to-Many (A category can have multiple products)
- **users** to **orders**: One-to-Many (A user can have multiple orders)
- **orders** to **orderdetails**: One-to-Many (An order can have multiple order details)
- **products** to **orderdetails**: One-to-Many (A product can be part of multiple order details)
- **orders** to **payments**: One-to-One (An order can have one payment)
- **users** to **reviews**: One-to-Many (A user can write multiple reviews)
- **products** to **reviews**: One-to-Many (A product can have multiple reviews)
- **users** to **shoppingcart**: One-to-Many (A user can have multiple items in their cart)
- **products** to **shoppingcart**: One-to-Many (A product can be in multiple carts)
- **users** to **addresses**: One-to-Many (A user can have multiple addresses)
- **users** to **wishlists**: One-to-Many (A user can have multiple wishlist items)
- **products** to **wishlists**: One-to-Many (A product can be in multiple wishlists)
- **products** to **inventory**: One-to-Many (A product can have multiple inventory changes)
- **products** to **productimages**: One-to-Many (A product can have multiple images)
