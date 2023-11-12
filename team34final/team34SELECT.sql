--NAME OF QUERY: Total Damage count by item name
--SHOW items in inventory and total damage charges for each item.
--FOR [iName]
--QUERY WILL USE: JOIN yes SUBQUERY no AGGREGATION yes
--This query is hardcoded to be item id 2, on the website you can pick any item
--name and the corresponding id will be added

SELECT i.iName as iName, IF(SUM(rd.damageLawsuits) IS NULL, 0, SUM(rd.damageLawsuits)) AS
TotalDamageCharges
FROM inventory AS i
LEFT JOIN rent AS r ON i.id = r.itemID
LEFT JOIN rentalTransaction AS rt ON r.transID = rt.id
LEFT JOIN paymentDetails AS rd ON rt.id = rd.transID
where i.id = 1
group by i.id;



--NAME OF QUERY: Equipment available to rent on the date
--SHOW items in inventory, their name, and the amount in inventory on a user
--supplied date.
--FOR [user selected date]
--This query specifies '2023-07-29', in the final version the user can
--select a date.
--QUERY WILL USE JOIN yes, subquery yes, aggregation no
SELECT i.iName as itemName, i.quantity as quantity
FROM inventory i
WHERE i.id NOT IN (
SELECT r.itemID
FROM rent r
JOIN rentalTransaction rt ON r.transID = rt.id
WHERE '2023-07-29' BETWEEN rt.rStart AND rt.rEnd
)
and i.quantity > 0
order by i.quantity DESC;



--NAME OF QUERY: Total Late Fees
--SHOW calculation of total late fees for a customer
--FOR [user chosen ssn]
--This query specifies '026253734', in the final version the user can
--select the customers name and the corresponding ssn will go into this query
--QUERY WILL USE: JOIN yes SUBQUERY no AGGREGATION yes
SELECT IF(SUM(pD.lateFee) IS NULL, 0, SUM(pD.damageLawsuits)) as TotalLateFees
FROM paymentDetails as pD
JOIN rentalTransaction as rT ON pD.transID = rT.id
JOIN customer as c ON pD.ssn = c.ssn
WHERE c.ssn = '026253734';




--NAME OF QUERY: Customer with most damage lawsuits
--SHOW customer with the most damage lawsuits, the one we should not rent any
--equipment to again.
--FOR [customer]
--QUERY WILL USE: JOIN yes SUBQUERY yes AGGREGATION no
--On the website this query is changed to selecting, but the original idea was
--just to show the customer with the most, before we were told to make every
--query user-selectable
SELECT concat(c.fName, ' ', c.lName) as customer, pd.damageLawsuits
FROM customer c
JOIN paymentDetails pd ON c.ssn = pd.ssn
WHERE pd.damageLawsuits = (
SELECT MAX(damageLawsuits)
FROM paymentDetails
);



--NAME OF QUERY: Finding which employees have handled a transaction and have their
--work phone in the system and have handled a transaction with a returnedDeposit.
--FOR [employeePhn, emp, handles]
--QUERY WILL USE: JOIN yes SUBQUERY YES Aggregation no
--Again on the website it lets you select a specific employee which we were told
--to do, but for this the
--original intent was showing the employees that satisified these conditions
select distinct concat(e.fName, ' ', e.lName) as employee, eP.phone as WorkNumber,
e.id as EmployeeID
From emp as e join employeePhn as eP on (e.id = eP.emp_id and e.id IN(
select emp_id from employeePhn where type='W')) join manages as m on
(e.id=m.emp_id) join
(select transID from paymentDetails where returnedDeposit = 1) as pD on (m.transID
= pD.transID);

