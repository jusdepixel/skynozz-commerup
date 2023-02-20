create table if not exists users
(
    id        int auto_increment primary key,
    email     varchar(191)      not null,
    password  text              not null,
    phone     varchar(191)      not null,
    firstname varchar(191)      not null,
    lastname  varchar(191)      not null,
    address   varchar(191)      not null,
    zip       varchar(191)      not null,
    city      varchar(191)      not null,
    admin     tinyint default 0 not null,
    constraint users_pk2
        unique (email)
);

