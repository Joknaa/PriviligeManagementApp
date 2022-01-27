create table users
(
    email varchar(100) not null
        primary key,
    role  varchar(50)  not null,
    constraint users_email_uindex
        unique (email)
);

create index users_roles_name_fk
    on users (role);

INSERT INTO ldap_schema.users (email, role) VALUES ('Mohammad.Laadidaoui@uae.ac.ma', 'Student');
INSERT INTO ldap_schema.users (email, role) VALUES ('hseghiouer@uae.ac.ma', 'Professor, Staff');
