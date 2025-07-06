-- Active: 1750397424834@@127.0.0.1@5555@calendardb
CREATE TABLE IF NOT EXISTS user(
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    password TEXT NOT NULL
)