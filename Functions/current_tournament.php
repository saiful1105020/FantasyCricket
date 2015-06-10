CREATE OR REPLACE FUNCTION current_tournament
RETURN NUMBER IS
tid NUMBER ;

BEGIN
	SELECT "tournament_id" INTO tid FROM "tournament" where "is_active"=1;
	return tid;

	EXCEPTION
			WHEN TOO_MANY_ROWS THEN
					RETURN 'Multiple Running Tournament';
			WHEN OTHERS THEN
					RETURN 'Unknown Error';
END ;
/
