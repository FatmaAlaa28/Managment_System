drop database if exists `management_system`;
create database `management_system`;
use `management_system`;

create table departments
(
    `id` int primary key auto_increment,
    `department_name` varchar(45) not null,
    `location` varchar(45) not null
);

create table emplyees
(
    `id` int primary key auto_increment,
    `first_name` varchar(45) not null,
    `last_name` varchar(45) not null,
    `email` varchar(50) not null,
    `hire_date` date not null,
    `salary` decimal(10, 2) not null,
    `department_id` int,
    `job_title` varchar(45) not null,
    foreign key (`department_id`) references departments(id) on delete cascade
);

create table performance_reviews
(
    `id` int primary key auto_increment,
    `department_id` int,
    `review_date` date not null,
    `rating` enum('1', '2', '3', '4', '5') not null,  -- should be from 1 to 5
    `comments` varchar(255) not null,
    foreign key (`department_id`) references departments(id) on delete cascade
);

insert into `departments` values (1, 'IT', 'Assuit');
insert into `emplyees` values (1, 'Ahmed', 'Alaa', 'ahmed.email@example.com', '2025-1-1', 7000, 1, 'Backend dev');
insert into `performance_reviews` values (1, 1, '2025-1-1', 4, 'the comment');
