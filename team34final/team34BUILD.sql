SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS handle;
DROP TABLE IF EXISTS manages;
DROP TABLE IF EXISTS customerCertification;
DROP TABLE IF EXISTS employeePhn;
DROP TABLE IF EXISTS CustomerExperience;
DROP TABLE IF EXISTS paymentDetails;
DROP TABLE IF EXISTS rent;
DROP TABLE IF EXISTS RentalTransaction;
DROP TABLE IF EXISTS Inventory;
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS employee;

DROP TABLE IF EXISTS handle cascade;
DROP TABLE IF EXISTS manages cascade;
DROP TABLE IF EXISTS cCert cascade;
DROP TABLE IF EXISTS employeePhn cascade;
DROP TABLE IF EXISTS cExperience cascade;
DROP TABLE IF EXISTS paymentDetails cascade;
DROP TABLE IF EXISTS rent cascade;
DROP TABLE IF EXISTS rentalTransaction cascade;
DROP TABLE IF EXISTS inventory cascade;
DROP TABLE IF EXISTS customer;
DROP TABLE IF EXISTS emp cascade;
SET FOREIGN_KEY_CHECKS = 1;

create table emp (
id INT NOT NULL,
fName VARCHAR(50),
lName VARCHAR(50),
email VARCHAR(50),
aSte VARCHAR(50),
aCity VARCHAR(50),
aST char(2),
aZip char(5),
salary DECIMAL(7,2),
PRIMARY KEY (id)
) ENGINE = innodb;


Create table inventory (
id int NOT NULL,
Price decimal(10, 2),
Quantity INT,
iType VARCHAR(50),
iName VARCHAR(50),
PRIMARY KEY (id)
) engine = innodb;


Create table rentalTransaction (
id int NOT NULL,
rStart datetime,
rEnd datetime,
rCost decimal (10, 2),
return_status boolean,
damages int,
PRIMARY KEY (id)
) engine = innodb;


Create table customer(
ssn char(9) NOT NULL,
fName varchar(50),
mName varchar(50),
lName varchar(50),
phone char(10),
email varchar(40),
aSte varchar(40),
aCity varchar(40),
aSt char(2),
aZip char(5),
paymentInfo char(16),
PRIMARY KEY (ssn)
) engine = innodb;


Create table paymentDetails(
deposit int,
returnedDeposit boolean,
lateFee int,
damageLawsuits decimal,
lawyerFees int,
courtDate DATE,
assessment int,
ssn char(9),
transID int,
FOREIGN KEY (ssn) REFERENCES customer(ssn),
FOREIGN KEY (transID) REFERENCES rentalTransaction(id)
) ENGINE = innodb;




Create table employeePhn(
emp_id int,
phone char(10),
type varchar(1),
FOREIGN KEY (emp_id) REFERENCES emp(id)) engine=innodb;



Create table manages(
emp_id int,
transID int,
FOREIGN KEY (emp_id) REFERENCES emp(id),
FOREIGN KEY (transID) REFERENCES rentalTransaction(id)
)engine=innodb;




Create table handle(
emp_id int,
itemID int,
FOREIGN KEY (emp_id) REFERENCES emp(id),
FOREIGN KEY (itemID) REFERENCES inventory (id)
)engine=innodb;


Create table rent(
transID int,
itemID int,
FOREIGN KEY (transID) REFERENCES rentalTransaction(id),
FOREIGN KEY (itemID) REFERENCES inventory(id)
)engine=innodb;

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(1, 'Halsey', 'Tassel', 'htassel0@dedecms.com', '45 Del Sol Pass', 'Houston', 'TX', '77001', 44386.26);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(2, 'Malcolm', 'Langeren', 'mlangeren1@studiopress.com', '260 Ridgeway Trail', 'Los Angeles', 'CA', '90001', 54236.76);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(3, 'Celia', 'Grube', 'cgrube2@microsoft.com', '3 Tennessee Crossing', 'New York City', 'NY', '10001', 56241.43);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(4, 'Ardeen', 'Rosendale', 'arosendale3@addthis.com', '212 Mendota Alley', 'Chicago', 'IL', '60007', 64165.39);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(5, 'Con', 'Janowski', 'cjanowski4@census.gov', '2466 Superior Drive', 'Miami', 'FL', '33101', 51338.52);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(6, 'Bealle', 'Wakenshaw', 'bwakenshaw5@theguardian.com', '1 Scoville Junction', 'Denver', 'CO', '80201', 50420.24);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(7, 'Ardys', 'Iannelli', 'aiannelli6@fema.gov', '09 Eliot Circle', 'Seattle', 'WA', '98001', 48907.21);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(8, 'Dulcia', 'Dursley', 'ddursley7@bing.com', '9 Cherokee Place', 'Boston', 'MA', '02101', 49826.52);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(9, 'Tova', 'Saunton', 'tsaunton8@posterous.com', '49924 Macpherson Court', 'Phoenix', 'AZ', '85001', 67017.87);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(10, 'Elizabet', 'Berget', 'eberget9@tripod.com', '6 Dexter Plaza', 'Dallas', 'TX', '75201', 58749.03);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(11, 'Rolland', 'Caig', 'rcaiga@nba.com', '3 Shopko Hill', 'San Francisco', 'CA', '94101', 51922.2);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(12, 'Rad', 'Fry', 'rfryb@github.io', '345 Gale Parkway', 'Buffalo', 'NY', '14201', 68882.98);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(13, 'Auberta', 'Olden', 'aoldenc@mlb.com', '1215 Comanche Way', 'Springfield', 'IL', '62701', 52325.86);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(14, 'Toddie', 'Croxley', 'tcroxleyd@uol.com.br', '560 Hudson Way', 'Tampa', 'FL', '33601', 58329.44);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(15, 'Larina', 'Toffanelli', 'ltoffanellie@yellowbook.com', '2 Oneill Point', 'Colorado Springs', 'CO', '80901', 47445.76);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(16, 'Dagmar', 'Reame', 'dreamef@facebook.com', '56637 Fieldstone Road', 'Olympia', 'WA', '98501', 69069.04);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(17, 'Shaylah', 'Farreil', 'sfarreilg@phoca.cz', '5467 Buell Lane', 'Worcester', 'MA', '01601', 40364.33);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(18, 'Catarina', 'Buggs', 'cbuggsh@ucoz.com', '2 Division Crossing', 'Jacksonville', 'FL', '32201', 59888.53);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(19, 'Arabella', 'Tricker', 'atrickeri@cnn.com', '15 American Plaza', 'Kansas City', 'MO', '64101', 45471.72);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(20, 'Carolina', 'Calafato', 'ccalafatoj@cmu.edu', '67763 Hoard Circle', 'Pittsburgh', 'PA', '15201', 44997.27);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(21, 'Rahal', 'Edgler', 'redglerk@sakura.ne.jp', '7224 Dakota Place', 'Portland', 'OR', '97201', 69832.41);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(22, 'Isac', 'Rougier', 'irougierl@telegraph.co.uk', '4356 Holy Cross Parkway', 'Atlanta', 'GA', '30301', 55041.87);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(23, 'Arlen', 'Baff', 'abaffm@hexun.com', '33753 Welch Avenue', 'Miami', 'FL', '33101', 67507.16);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(24, 'Charmian', 'Frude', 'cfruden@goo.ne.jp', '9 Ridgeview Avenue', 'Houston', 'TX', '77001', 42453.25);

INSERT INTO emp (id, fName, lName, email, aSte, aCity, aST, aZip, salary) 
VALUES 
(25, 'Hannie', 'Whaley', 'hwhaleyo@sogou.com', '4660 Golf Circle', 'Los Angeles', 'CA', '90001', 49532.89);




insert into inventory (id, price, quantity, iType, iName) values (1, 562, 3,
'Heavy', 'Scraper');
insert into inventory (id, price, quantity, iType, iName) values (2, 1601, 2,
'Heavy', 'Compactor');
insert into inventory (id, price, quantity, iType, iName) values (3, 1332, 1,
'Heavy', 'Woodchipper');
insert into inventory (id, price, quantity, iType, iName) values (4, 1353, 2,
'Heavy','Excavator');
insert into inventory (id, price, quantity, iType, iName) values (5, 1135, 3,
'Heavy','Loader');
insert into inventory (id, price, quantity, iType, iName) values (6, 627, 2,
'Heavy','Bulldozer');
insert into inventory (id, price, quantity, iType, iName) values (7, 197, 2,
'Heavy','Backhoe');
insert into inventory (id, price, quantity, iType, iName) values (8, 723, 1,
'Heavy','Dump Truck');
insert into inventory (id, price, quantity, iType, iName) values (9, 1528, 3,
'Heavy','Grader');
insert into inventory (id, price, quantity, iType, iName) values (10, 360, 2,
'Heavy','Crawler');
insert into inventory (id, price, quantity, iType, iName) values (11, 10, 15,
'Party', 'Hats');
insert into inventory (id, price, quantity, iType, iName) values (12, 2, 7076,
'Party', 'Balloons');
insert into inventory (id, price, quantity, iType, iName) values (13, 3, 180,
'Party', 'Streamers');
insert into inventory (id, price, quantity, iType, iName) values (14, 10, 48,
'Party','Maracas');
insert into inventory (id, price, quantity, iType, iName) values (15, 2, 215,
'Party','Kazoo');
insert into inventory (id, price, quantity, iType, iName) values (16, 3, 100,
'Party','Party Blower');
insert into inventory (id, price, quantity, iType, iName) values (17, 2, 1500,
'Party','Gift Boxes');
insert into inventory (id, price, quantity, iType, iName) values (18, 3, 100,
'Party','Glitter boxes');
insert into inventory (id, price, quantity, iType, iName) values (19, 1, 1000,
'Party','Candy Bags');
insert into inventory (id, price, quantity, iType, iName) values (20, 1, 1000,
'Party','Paper Plates');


insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (1, '2023-09-13 09:00:00', '2023-06-12 18:00:00', 218, 1, 17);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (2, '2022-12-14 10:30:00', '2023-05-11 19:30:00', 663, 1, 14);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (3, '2023-03-19 11:00:00', '2023-03-08 20:00:00', 2645, 0, 19);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (4, '2023-09-19 09:45:00', '2023-04-12 18:45:00', 3272, 1, 16);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (5, '2023-06-29 08:15:00', '2023-12-01 17:15:00', 254, 1, 13);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (6, '2023-02-15 10:00:00', '2023-05-27 19:00:00', 2350, 1, 5);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (7, '2022-12-19 09:30:00', '2023-09-05 18:30:00', 1358, 0, 16);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (8, '2023-05-08 11:15:00', '2023-07-08 20:15:00', 4743, 0, 13);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (9, '2023-01-13 10:30:00', '2023-06-19 19:30:00', 2583, 0, 5);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (10, '2023-01-30 12:00:00', '2023-04-09 20:00:00', 2095, 0, 13);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (11, '2023-08-15 08:00:00', '2023-09-10 17:00:00', 562, 1, 7);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (12, '2023-07-22 09:30:00', '2023-08-20 18:00:00', 1601, 0, 3);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (13, '2023-09-03 10:00:00', '2023-09-30 16:30:00', 1332, 1, 5);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (14, '2023-08-19 08:45:00', '2023-09-15 17:45:00', 1353, 0, 9);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (15, '2023-08-05 11:15:00', '2023-09-02 19:00:00', 1135, 1, 8);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (16, '2023-07-28 10:30:00', '2023-08-25 18:30:00', 627, 0, 2);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (17, '2023-08-11 09:00:00', '2023-09-08 17:15:00', 197, 0, 4);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (18, '2023-08-03 10:45:00', '2023-09-01 18:45:00', 723, 0, 6);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (19, '2023-07-25 08:30:00', '2023-08-22 17:30:00', 1528, 0, 1);

insert into rentalTransaction (id, rStart, rEnd, rCost, return_status, damages) 
values (20, '2023-07-30 12:00:00', '2023-08-27 20:00:00', 360, 0, 5);




insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('709850389', 'Analiese', 'Camel', 'O''Spillane', '1856626338', 'cospillane0@cargocollective.com', 'Vera', 'Washington', 'DC', '08592', '1011787272517320');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('131492308', 'Cara', 'Malinde', 'Battram', '2140326987', 'mbattram1@mozilla.org', 'Harbort', 'Rochester', 'NY', '87995', '6088479090434753');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('719733518', 'Denver', 'Yale', 'Madine', '4378430339', 'ymadine2@vkontakte.ru', '6th', 'Charlotte', 'NC', '31915', '5757145240134768');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('763433380', 'Terri', 'Gene', 'Woodroff', '9293424264', 'gwoodroff3@sakura.ne.jp', 'Del Mar', 'Houston', 'TX', '24627', '3974149761718744');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('911029212', 'Chantalle', 'Alana', 'Renad', '5557265337', 'arenad4@yahoo.co.jp', 'Carioca', 'Omaha', 'NE', '24738', '0638695016072452');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('264856413', 'Sybila', 'Tann', 'Renackowna', '9537592517', 'trenackowna5@smh.com.au', 'Thierer', 'San Jose', 'CA', '45457', '7396274803870082');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('375149183', 'Rheta', 'Dody', 'Parbrook', '3464631958', 'dparbrook6@storify.com', 'Sauthoff', 'Hartford', 'CT', '42422', '9968110003526116');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('026253734', 'Port', 'Sammy', 'Bellward', '0661936711', 'sbellward7@amazon.co.jp', 'Hoard', 'Albuquerque', 'NM', '95248', '6195510597556210');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('824463005', 'Lane', 'Mycah', 'Macro', '5291950284', 'mmacro8@opera.com', 'Boyd', 'Brooklyn', 'NY', '17628', '3399063537751436');
insert into customer (ssn, fName, mName, lName, phone, email, aSte, aCity, aST, aZip, paymentInfo) values ('033932246', 'Vitoria', 'Julian', 'Tureville', '3752480077', 'jtureville9@harvard.edu', 'High Crossing', 'Alexandria', 'LA', '97420', '4474314038779263');


insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (4586, 1, null, null, null, null, 170, '709850389', 1);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (4905, 1, null, null, null, null, 190, '719733518', 2);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (6574, 0, 314, 8, 3665, '2009-06-07', 140, '131492308', 3);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (8109, 1, null, null, null, null, 160, '763433380', 4);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (4721, 1, null, null, null, null, 130, '911029212', 5);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (5467, 1, null, null, null, null, 50, '264856413', 6);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (8467, 0, 344, 4, 9507, '2023-09-11', 160, '375149183', 7);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (9616, 0, 272, 1, 9255, '2023-09-03', 130, '026253734', 8);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (8521, 0, 83, 9, 9011, '2023-09-06', 50, '824463005', 9);

insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (4824, 0, 717, 8, 7404, '2000-06-19', 130, '033932246', 10);
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (2658, 0, 92, 5, 2046, '2023-10-10', 80, '709850389', 11);

-- transaction ID 12
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (3764, 1, null, null, null, null, 110, '719733518', 12);

-- transaction ID 13
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (2783, 1, null, null, null, null, 90, '131492308', 13);

-- transaction ID 14
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (3421, 0, 181, 7, 3034, '2023-10-15', 70, '763433380', 14);

-- transaction ID 15
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (2874, 1, null, null, null, null, 120, '911029212', 15);

-- transaction ID 16
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (3099, 1, null, null, null, null, 130, '264856413', 16);

-- transaction ID 17
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (3982, 0, 234, 6, 4102, '2023-10-12', 110, '375149183', 17);

-- transaction ID 18
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (4520, 0, 124, 2, 3788, '2023-10-05', 90, '026253734', 18);

-- transaction ID 19
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (4134, 0, 156, 3, 3348, '2023-10-09', 70, '824463005', 19);

-- transaction ID 20
insert into paymentDetails (deposit, returnedDeposit, lateFee, damageLawsuits, lawyerFees, courtDate, assessment, ssn, transID) 
values (2948, 0, 432, 5, 2589, '2010-06-25', 90, '033932246', 20);





INSERT INTO employeePhn(emp_id, phone, type) VALUES
(1,'7098503895', 'H'),
(2,'7197335183', 'W'),
(3,'1314923087', 'H'),
(4,'7634333808', 'H'),
(5,'9110292129', 'W'),
(6,'2648564131', 'H'),
(7,'3751498130', 'H'),
(8,'0262537344', 'W'),
(9,'8244630055', 'W'),
(10,'0339322461', 'H')
;






INSERT INTO manages (emp_id, transID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(4, 5),
(6, 6),
(7, 7),
(4, 8),
(9, 9),
(10, 10),
(11, 11),
(11, 12),
(12, 13),
(13, 14),
(14, 15),
(14, 16),
(15, 17),
(16, 18),
(17, 18),
(18, 19),
(19, 20),
(20, 19),
(21, 18),
(22, 17),
(23, 16),
(24, 15),
(25, 14),
(1, 13),
(2, 12),
(3, 11),
(4, 10),
(5, 9),
(6, 8),
(7, 7),
(8, 6),
(9, 5),
(10, 4),
(11, 3),
(12, 2),
(13, 1);




INSERT INTO handle (emp_ID, itemID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(4, 5),
(6, 6),
(7, 7),
(4, 8),
(9, 9),
(10, 10),
(11, 11),
(11, 12),
(12, 13),
(13, 14),
(14, 15),
(14, 16),
(15, 17),
(16, 18),
(17, 18),
(18, 19),
(19, 1),
(20, 2),
(21, 3),
(22, 4),
(23, 5),
(24, 6),
(25, 7),
(1, 8),
(2, 9),
(3, 10),
(4, 11),
(5, 12),
(6, 13),
(7, 14),
(8, 15),
(9, 16),
(10, 17),
(11, 18),
(12, 19),
(13, 20);


INSERT INTO rent (transID, itemID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 18),
(20, 19),
(11, 1),
(12, 2),
(13, 3),
(14, 4),
(15, 5),
(16, 6),
(17, 7),
(18, 8),
(19, 9),
(20, 10),
(1, 11),
(2, 12),
(3, 13),
(4, 14),
(5, 15),
(6, 16),
(7, 17),
(8, 18),
(9, 18),
(10, 19);




