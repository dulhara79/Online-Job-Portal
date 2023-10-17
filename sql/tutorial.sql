CREATE TABLE users(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(200) NOT NULL,
    Email varchar(200) UNIQUE NOT NULL,
    Mobile varchar(15) UNIQUE NOT NULL,
    Age int NOT NULL,
    Password varchar(255) NOT NULL
);





CREATE TABLE companies (
    CompanyId INT AUTO_INCREMENT PRIMARY KEY,
    CompanyName VARCHAR(255) NOT NULL,
    CompanyEmail VARCHAR(255) NOT NULL,
    CompanyMobile VARCHAR(15) NOT NULL,
    Password VARCHAR(255),
   
    UNIQUE (CompanyEmail),
    UNIQUE (CompanyMobile)
);
