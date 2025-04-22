CREATE OR REPLACE FUNCTION delete_reservation(int) RETURNS integer AS
$$
BEGIN
	DELETE FROM reservation WHERE id = $1;
	RETURN 1;
END;
$$
LANGUAGE 'plpgsql';