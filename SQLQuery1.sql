create database system
go

use system
go

Create table Customers
(

Id int primary key identity(1,1),
Name varchar(50) not null,
Age int not null
)
go
