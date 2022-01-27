create table services
(
    id   int(10) auto_increment
        primary key,
    name varchar(50) not null,
    constraint services_name_uindex
        unique (name)
);

INSERT INTO ldap_schema.services (id, name) VALUES (1, 'Consulation de notes');
INSERT INTO ldap_schema.services (id, name) VALUES (2, 'Gestion des rapport des reunions');
INSERT INTO ldap_schema.services (id, name) VALUES (3, 'gestion des exames');
INSERT INTO ldap_schema.services (id, name) VALUES (4, 'Ajoute de notes');
INSERT INTO ldap_schema.services (id, name) VALUES (5, 'guestion du budjet');
INSERT INTO ldap_schema.services (id, name) VALUES (6, 'Consultation des coures');
INSERT INTO ldap_schema.services (id, name) VALUES (7, 'Communication avec Université');
INSERT INTO ldap_schema.services (id, name) VALUES (8, 'Apogee');
