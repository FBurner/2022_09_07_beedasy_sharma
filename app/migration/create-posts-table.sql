CREATE TABLE IF NOT EXISTS posts
(
    user_id  INT NOT NULL AUTO_INCREMENT,
    email    varchar(255),
    password varchar(255),
    name     varchar(255)
)