CREATE TABLE users(
   ID int NOT NULL AUTO_INCREMENT,
   Username VARCHAR (255),    
   UserPassword  VARCHAR (255)   ,        
   Email  VARCHAR (255) ,
   Address VARCHAR (255),
   PhoneNumber VARCHAR (255),
   BillingInformation VARCHAR (255),
   OrderHistory   VARCHAR (255),       
   PRIMARY KEY (ID)
);

CREATE TABLE orders(
   Order_ID   INT              NOT NULL,
   OrderStatus VARCHAR (255),    
   OrderPayment  VARCHAR (255)   ,        
   OrderDelivery  VARCHAR (255) ,
   OrderDatetime timeStamp,
   OrderAmount decimal (5, 2),   
   PRIMARY KEY (Order_ID)
);

CREATE TABLE publisher(
   Publisher_ID   INT              NOT NULL,
   BankingAccount VARCHAR (255),    
   Name  VARCHAR (255)   ,        
   EmailAddress  VARCHAR (255) ,
   Address VARCHAR (255),
   PhoneNumber VARCHAR (255),   
   PRIMARY KEY (Publisher_ID)
);

CREATE TABLE book(
   ID int NOT NULL AUTO_INCREMENT,
   ISBN VARCHAR (255),    
   BookName  VARCHAR (255)   ,        
   Author  VARCHAR (255) ,
   Category VARCHAR (255),
   Price decimal (5, 2),   
   Book_In_Stock INT,
   Publisher_ID INT,
   PRIMARY KEY (ID),
   FOREIGN KEY (Publisher_ID) REFERENCES PUBLISHER (Publisher_ID)
);


CREATE TABLE report(
   Report_ID   INT              NOT NULL,
   ReportName VARCHAR (255),      
   PRIMARY KEY (Report_ID)
);

CREATE TABLE admin(
   Admin_ID   INT              NOT NULL,
   AdminName VARCHAR (255),  
   AdminPassword VARCHAR (255),
   PRIMARY KEY (Admin_ID)
);

CREATE TABLE userOrder(
   UserID   INT              NOT NULL,
   Order_ID INT              NOT NULL,  
   PRIMARY KEY (UserID, Order_ID)
);

CREATE TABLE orderBook(
   Order_ID   INT              NOT NULL,
   Book_ID INT              NOT NULL,  
   PRIMARY KEY (Order_ID, Book_ID)
);

CREATE TABLE adminBook(
   Admin_ID   INT              NOT NULL,
   Book_ID INT              NOT NULL,  
   PRIMARY KEY (Admin_ID, Book_ID)
);


CREATE TABLE adminReport(
   Admin_ID   INT              NOT NULL,
   Report_ID INT              NOT NULL,  
   PRIMARY KEY (Admin_ID, Report_ID)
);