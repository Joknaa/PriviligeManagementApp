create table users
(
    id       int(10) auto_increment
        primary key,
    dn       varchar(255) not null,
    password varchar(50)  not null,
    name     varchar(50)  null,
    email    varchar(100) null,
    role     varchar(50)  not null
);

create index users_roles_name_fk
    on users (role);

INSERT INTO ldap_schema.users (id, dn, password, name, email, role) VALUES (1, 'cn=Mohammad Laadidaoui, ou=Student, dc=ensate,dc=uae,dc=ac,dc=ma', 'laadidaoui', 'Mohammad Laadidaoui', 'Mohammad.Laadidaoui@uae.ac.ma', 'Student');
INSERT INTO ldap_schema.users (id, dn, password, name, email, role) VALUES (2, 'cn=Hamid SEGHIOUER, ou=Professor, dc=ensate, dc=uae, dc=ac, dc=ma', 'seghiouer', 'Hamid SEGHIOUER', 'hseghiouer@uae.ac.ma', 'Professor, Staff');
