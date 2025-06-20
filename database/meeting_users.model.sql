-- Active: 1750384148639@@127.0.0.1@5555@calendardb@public
CREATE TABLE IF NOT EXISTS meeting_users (
    meeting_id INTEGER NOT NULL REFERENCES meeting (id),
    user_id INTEGER NOT NULL REFERENCES users (id),
    role VARCHAR(50) NOT NULL,
    PRIMARY KEY (project_id, user_id)
);