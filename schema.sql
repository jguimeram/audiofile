-- Step 1: Create the database
DROP DATABASE IF EXISTS audio;
CREATE DATABASE IF NOT EXISTS audio;
USE audio;

-- users Table
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    passwordhash VARCHAR(255) NOT NULL,
    firstname VARCHAR(255),
    lastname VARCHAR(255),
    address VARCHAR(255),
    city VARCHAR(100),
    country VARCHAR(100),
    postalcode VARCHAR(20),
    phonenumber VARCHAR(20),
    isadmin BOOLEAN DEFAULT FALSE,  -- Column to indicate admin status
    datecreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- roles Table
CREATE TABLE IF NOT EXISTS roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    rolename VARCHAR(255) NOT NULL UNIQUE
);

-- userroles Table
CREATE TABLE IF NOT EXISTS userroles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    roleid INT,
    FOREIGN KEY (userid) REFERENCES users(id),
    FOREIGN KEY (roleid) REFERENCES roles(id)
);

-- categories Table
CREATE TABLE IF NOT EXISTS categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoryname VARCHAR(255) NOT NULL
);

-- products Table
CREATE TABLE IF NOT EXISTS products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    productname VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    categoryid INT,
    dateadded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoryid) REFERENCES categories(id)
);

-- orders Table
CREATE TABLE IF NOT EXISTS orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    orderdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    totalamount DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) NOT NULL,
    shippingaddress VARCHAR(255),
    billingaddress VARCHAR(255),
    FOREIGN KEY (userid) REFERENCES users(id)
);

-- orderdetails Table
CREATE TABLE IF NOT EXISTS orderdetails (
    id INT PRIMARY KEY AUTO_INCREMENT,
    orderid INT,
    productid INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (orderid) REFERENCES orders(id),
    FOREIGN KEY (productid) REFERENCES products(id)
);

-- payments Table
CREATE TABLE IF NOT EXISTS payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    orderid INT,
    paymentdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(10, 2) NOT NULL,
    paymentmethod VARCHAR(50),
    paymentstatus VARCHAR(50),
    FOREIGN KEY (orderid) REFERENCES orders(id)
);

-- reviews Table
CREATE TABLE IF NOT EXISTS reviews (
    id INT PRIMARY KEY AUTO_INCREMENT,
    productid INT,
    userid INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    reviewtext TEXT,
    reviewdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (productid) REFERENCES products(id),
    FOREIGN KEY (userid) REFERENCES users(id)
);

-- shoppingcart Table
CREATE TABLE IF NOT EXISTS shoppingcart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    productid INT,
    quantity INT NOT NULL,
    dateadded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userid) REFERENCES users(id),
    FOREIGN KEY (productid) REFERENCES products(id)
);

-- addresses Table
CREATE TABLE IF NOT EXISTS addresses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    addressline1 VARCHAR(255),
    addressline2 VARCHAR(255),
    city VARCHAR(100),
    country VARCHAR(100),
    postalcode VARCHAR(20),
    isprimary BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (userid) REFERENCES users(id)
);

-- wishlists Table
CREATE TABLE IF NOT EXISTS wishlists (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    productid INT,
    dateadded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (userid) REFERENCES users(id),
    FOREIGN KEY (productid) REFERENCES products(id)
);

-- inventory Table
CREATE TABLE IF NOT EXISTS inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    productid INT,
    quantitychange INT NOT NULL,
    changedate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    changereason VARCHAR(255),
    FOREIGN KEY (productid) REFERENCES products(id)
);

-- productimages Table
CREATE TABLE IF NOT EXISTS productimages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    productid INT,
    imageurl VARCHAR(255) NOT NULL,
    FOREIGN KEY (productid) REFERENCES products(id)
);
