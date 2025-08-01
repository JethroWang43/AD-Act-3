-- Active: 1750397424834@@127.0.0.1@5555@calendardb
CREATE TABLE IF NOT EXISTS tasks (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(50) DEFAULT 'pending',
    meeting_id INTEGER REFERENCES meeting(id),
    assigned_to INTEGER REFERENCES users(id),
    due_date DATE
);
