-- Create DataBase
Create database GymSys;

-- Use DataBase Created
Use GymSys;

create table EmpRoles
(
Id int not null auto_Increment primary key,
Description varchar(30) not null
);

create table Employees
(

Id int not null auto_Increment primary key,

Name varchar(50) not null,
FstName varchar(50) not null,
LstName varchar(50) not null,
Address varchar(200) not null,
Email varchar(100) not null,
password varchar(20) not null,
Phone varchar(10) not null,
EmpPhotoPath varchar(100),
EmpRoles_Id int not null,

-- Foreign keys
Foreign key(EmpRoles_Id) references EmpRoles (Id)

);

Create table Members
(

Id int not null auto_Increment primary key,
Name varchar(50) not null,
FstName varchar(50) not null,
LstName varchar(50) not null,
Phone int(10) not null,
Email varchar(100),
Address varchar(200) not null,
MemPhotoPath varchar(100),
RgstrDate DateTime Default now()

);

Create table Trainers
(

Id int not null auto_increment primary key,
Name varchar(50) not null,
FstName varchar(50) not null,
LstName Varchar(50) not null,
Phone int(10) not null,
Email varchar(100),
RgsrtDate Datetime default Now()

);

create table TrainingPackages
(

Id int not null auto_increment primary key,
Name varchar(50) not null,
Description varchar(200),
Price int not null,
FrontImgPath varchar(200)

);

create table MemTrainPackages
(

Members_Id int not null,
TrainingPackages_Id int not null,
Trainers_Id int not null,
StartDate Date not null ,
ExpiresDate Date not null,

-- Foreign key
foreign key (Members_Id) references Members(Id),
foreign key (TrainingPackages_Id) references TrainingPackages(Id),
foreign key (Trainers_Id) references Trainers(Id)

);


