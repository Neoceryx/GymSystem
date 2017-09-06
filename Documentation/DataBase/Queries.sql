-- Use GymSy DataBase
Use GymSys;

-- Get current DateTime
select now();

-- Get current date.
select curdate();

-- Get only date part form datetime.
select date( now() );

-- Get only time part from datetime
select time( now() );


-- Get Difference in days bewteen two dates
select DATEDIFF( Curdate(), '2016-08-27'  );

--  get Difference between two dates using a parameter (Day / MONTH / Year)
select timestampdiff( Year, '2017-08-27' , curdate() );

-- Add one quantity to a date (DAY/MONTH/YEAR) 
SELECT DATE_ADD("2017-06-15", INTERVAL 1 YEAR);

-- Add New Employee Roles
INSERT INTO EmpRoles (Description) values ('Admin'),('Normal');
select * from EmpRoles;

-- Add new Employee
INSERT INTO Employees (Name,FstName, LstName, Address, Email, password, Phone ,EmpPhotoPath, EmpRoles_Id)
VALUES('Daniel', 'Fierro', 'Najera' ,'Calle de las minas Fracc Villa del sol', 'd@gmail.com', 'pas' ,6645621957, '', 1),
('Angel', 'Fierro', 'Najera' ,'Calle de las minas Fracc Villa del sol', 'a@gmail.com', 'pas' ,6645621957, '', 2);

select * from employees;

delete from employees where (Id = 1);

-- Reset Autoincrement
ALTER TABLE employees AUTO_INCREMENT = 1
