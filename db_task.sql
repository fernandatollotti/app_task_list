create table tb_status(
    id int not null primary key auto_increment,
    status varchar(25) not null
);

insert into tb_status(status)values('PENDENTE');
insert into tb_status(status)values('REALIZADO');

create table tb_task(
    id int not null primary key auto_increment,
    id_status int not null default 1,
    foreign key(id_status) references tb_status(id),
    task text not null,
    date datetime not null default current_timestamp
)