CREATE OR REPLACE 
FUNCTION "get_player_overall_point" (tid IN NUMBER, pid IN NUMBER)
RETURN NUMBER
IS
total NUMBER;
BEGIN
	-- routine body goes here, e.g.
	-- DBMS_OUTPUT.PUT_LINE('Navicat for Oracle');
	total:=0;
	FOR R IN (SELECT "phase_id" FROM "phase"  WHERE "tournament_id" = tid)
		LOOP
			total:=total+GET_PLAYER_PHASE_POINT(tid, pid, R."phase_id");
		END LOOP;
	RETURN total;
END;
/