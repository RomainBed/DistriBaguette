use distribaguette;
create table `distri` (`id` int default null auto_increment, `Nom` varchar(30) not null, PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into `distri` (`Nom`) values
('jean'),
('richard');

update `distri` set `Nom` = 'jacques' where `Nom` ='jean';

select * from `distri`;

delete from `distri` where `id` = 1;

drop table `distri`;

quit
