-- This is used for new databases who doesn't have auto increment in their id
--
-- Change studentTb to the table you want to add autoincrement
ALTER TABLE "calendardb"
ALTER COLUMN id ADD GENERATED BY DEFAULT AS IDENTITY;