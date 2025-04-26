CREATE OR REPLACE FUNCTION get_searched_films(text) RETURNS SETOF film AS
$$
BEGIN
	RETURN QUERY
	SELECT *
	FROM film
	WHERE titre LIKE $1 || '%';
END
$$
language 'plpgsql';