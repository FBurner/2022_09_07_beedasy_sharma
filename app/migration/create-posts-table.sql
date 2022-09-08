CREATE TABLE IF NOT EXISTS posts
(
    post_id INT NOT NULL AUTO_INCREMENT,
    title   varchar(1000),
    body    text,
    user_id INT NOT NULL 
)
