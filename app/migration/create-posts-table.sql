CREATE TABLE IF NOT EXISTS posts
(
    post_id INT NOT NULL AUTO_INCREMENT,
    title   varchar(1000),
    body    text,
    user_id INT,
    FOREIGN KEY (user_id)
        REFERENCES users(user_id)
        ON DELETE SET NULL
)
