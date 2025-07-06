CREATE EXTENSION IF NOT EXISTS "pgcrypto"; -- required for gen_random_uuid()

CREATE TABLE IF NOT EXISTS public."users" (
    id            UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    first_name    VARCHAR(225) NOT NULL,
    middle_name   VARCHAR(225),
    last_name     VARCHAR(225) NOT NULL,
    username      VARCHAR(225) NOT NULL UNIQUE,
    password      VARCHAR(225) NOT NULL,
    role          VARCHAR(225) NOT NULL
);
