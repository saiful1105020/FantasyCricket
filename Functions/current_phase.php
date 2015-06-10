CREATE OR REPLACE 
function current_phase
RETURN NUMBER IS
pid NUMBER ;

BEGIN

	SELECT "phase_id" INTO pid FROM "phase" WHERE "tournament_id"=current_tournament() AND SYSDATE BETWEEN "start_time" AND "finish_time" AND "is_started"=1;
	
	RETURN pid ; --return the message
EXCEPTION
--you must return value from this section also
	WHEN NO_DATA_FOUND THEN
		RETURN -1 ;		
	WHEN TOO_MANY_ROWS THEN
	  RETURN -2 ;
	WHEN OTHERS THEN
		RETURN -3 ;
END ;
