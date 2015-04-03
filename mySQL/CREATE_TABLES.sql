set foreign_key_checks = 0;
DROP TABLE IF EXISTS Organization, Inquiry, Admin;
set foreign_key_checks = 1;

CREATE TABLE Organization (
	contactName VARCHAR(255),
	position VARCHAR(255),
	organizationName VARCHAR(255),
	organizationType VARCHAR(255),
	phoneNumber VARCHAR(255),
	faxNumber VARCHAR(255),
	email VARCHAR(255),
	addressStreet1 VARCHAR(255),
	addressStreet2 VARCHAR(255),
	addressCity VARCHAR(255),
	addressState VARCHAR(255),
	addressZIP VARCHAR(255),
	website VARCHAR(255),
	interest VARCHAR(255),
	interestNotes VARCHAR(255),
	PRIMARY KEY(organizationName)
);

CREATE TABLE Picture (
	uploadTime DATETIME,
	organizationName VARCHAR(255),
	pictureName VARCHAR(255),
	PRIMARY KEY(pictureName),
	FOREIGN KEY(organizationName) REFERENCES Organization(organizationName)
);

CREATE TABLE Inquiry (
	inquiryTime DATETIME,
	contactName VARCHAR(255),
	email VARCHAR(255),
	message TEXT,
	PRIMARY KEY(inquiryTime, contactName),
	FOREIGN KEY(email) REFERENCES Organization(email)
);

CREATE TABLE Admin (
	username VARCHAR(255),
	password VARCHAR(255),
	PRIMARY KEY(username)
);