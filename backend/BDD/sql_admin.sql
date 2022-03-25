use distribaguette;
create table `distri` (`id` int default null auto_increment, `Nom` varchar(30) not null, PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into `distri` (`Nom`) values
('jean'),
('richard');

delete from `distri` where `id` = 1;

alter table `distri` add `age` int(2) unsigned not null;

select * from `distri`;

drop tables `distri`;

quit
