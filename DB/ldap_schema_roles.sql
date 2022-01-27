create table roles
(
    id      int(10) auto_increment
        primary key,
    name    varchar(50) null,
    service int(10)     null,
    constraint roles_services_name_fk
        unique (service)
);

INSERT INTO ldap_schema.roles (id, name, service) VALUES (1, 'Student', 1);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (2, 'Student', 6);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (3, 'Professor', 3);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (4, 'Professor', 4);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (5, 'Staff', 2);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (6, 'Staff', 5);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (7, 'Staff', 7);
INSERT INTO ldap_schema.roles (id, name, service) VALUES (8, 'Staff', 8);
