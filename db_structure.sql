-- Create the table for storing user data with ID, Phone Number, Salt, and Encrypted Password


CREATE TABLE hurryup.Phonelist (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    phone_number VARCHAR(15) NOT NULL,
    create_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Status tinyint DEFAULT 0, -- 0 = NotPaid, 1 Paid
    encrypted_password VARCHAR(255) NOT NULL
);


-- Creating the 'address' table
CREATE TABLE hurryup.Address (
    ID INT AUTO_INCREMENT PRIMARY KEY,       -- ID for the address, auto-incremented
    Address1 VARCHAR(255) NOT NULL,             -- Street name or address line
    Address2 VARCHAR(255) NOT NULL,             -- Street name or address line
    City VARCHAR(100) NOT NULL,               -- City name
    Province VARCHAR(100) NOT NULL,               -- Province name
    Postal VARCHAR(20) NOT NULL,                      -- Zipcode (optional)
    Country VARCHAR(100) NOT NULL              -- Country name
);

-- Creating the 'thumbnail' table
CREATE TABLE hurryup.Thumbnail (
    ID INT AUTO_INCREMENT PRIMARY KEY,       -- ID for the thumbnail, auto-incremented
    ImagePath VARCHAR(255) NOT NULL           -- Path or URL to the thumbnail image
);

-- Creating the 'restaurant' table
CREATE TABLE hurryup.Restaurant (
    ID INT AUTO_INCREMENT PRIMARY KEY,       -- ID for the restaurant, auto-incremented
    Name VARCHAR(255) NOT NULL,               -- Restaurant name (e.g., 'Pizza Hut')
    Description TEXT,                         -- A brief description of the restaurant
    Address_ID INT,                           -- Foreign key to the 'Address' table
    Thumbnail_ID INT,                         -- Foreign key to the 'Thumbnail' table
    FOREIGN KEY (Address_ID) REFERENCES Address(ID),  -- Assuming 'Address' table exists with ID as primary key
    FOREIGN KEY (Thumbnail_ID) REFERENCES Thumbnail(ID)  -- Assuming 'Thumbnail' table exists with ID as primary key
);

-- Creating 'food' table
CREATE TABLE hurryup.Food (
    ID INT AUTO_INCREMENT PRIMARY KEY,     -- ID for the food item, auto-incremented
    Name VARCHAR(255) NOT NULL,             -- Name of the food item (e.g., 'Margherita Pizza')
    Description TEXT,                       -- A description of the food item
    Ingredients TEXT,                       -- Ingredients used in the food item
    Price DECIMAL(10, 2) NOT NULL,          -- Price of the food item (with two decimal places)
    Discount DECIMAL(5, 2) DEFAULT 0.00,     -- Discount on the food item (default is 0.00)
	enabled tinyInt default 1 				-- 1 = Enabled Food, 0 Discountinued Food
);


-- Creating 'food' table
CREATE TABLE hurryup.Food_in_active (
    ID INT AUTO_INCREMENT PRIMARY KEY,     -- ID for the food item, auto-incremented
    Food_ID INT,
    createdatetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp of when the transaction is created (auto-populated)
    expiredatetime TIMESTAMP,
    cur_num  INT, 
    max_num INT,
    Price DECIMAL(10, 2) NOT NULL,              -- Total price of the transaction
    Discount DECIMAL(5, 2) DEFAULT 0.00,        -- Discount on the transaction (default is 0.00)
    Status ENUM('pending', 'completed', 'cancelled', 'failed') DEFAULT 'pending', -- Status of the transaction 
    FOREIGN KEY (Food_ID) REFERENCES Address(ID)  -- Assuming 'Address' table exists with ID as primary key
);



-- Creating the 'transaction' table
CREATE TABLE hurryup.Transaction (
    ID INT AUTO_INCREMENT PRIMARY KEY,          -- ID for the transaction, auto-incremented
    Food_in_active_ID INT,                      -- Foreign key to the 'Food_in_active' table
    Phonelist_ID INT,                           -- Foreign key to the 'Phonelist' table
    Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Timestamp of when the transaction is created (auto-populated)
    Status ENUM('pending', 'completed', 'cancelled', 'failed') DEFAULT 'pending', -- Status of the transaction
    FOREIGN KEY (Food_in_active_ID) REFERENCES Food_in_active(ID), -- Assuming 'Food_in_active' table exists with ID as primary key
    FOREIGN KEY (Phonelist_ID) REFERENCES Phonelist(ID)            -- Assuming 'Phonebook' table exists with ID as primary key
);



