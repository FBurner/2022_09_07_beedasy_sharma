CREATE TABLE IF NOT EXISTS comments
(
    comment_id INT NOT NULL AUTO_INCREMENT,
    name       varchar(255),
    mail       varchar(255),
    url        varchar(255),
    body       text
)
