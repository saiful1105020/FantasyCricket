CREATE OR REPLACE FUNCTION get_player_phase_point(tid IN NUMBER,pl_id IN NUMBER,ph_id IN NUMBER)
RETURN NUMBER IS

	total NUMBER;

BEGIN

	--cur_phase:=CURRENT_PHASE();
	--cur_tournament :=CURRENT_TOURNAMENT();
	total:=0;
	--pid:=41;

	FOR R IN (SELECT M."match_id" as mid FROM "match" M, "phase" P 
						WHERE M."tournament_id"= tid 
						AND  P."phase_id" = ph_id 
						AND(M."start_time" BETWEEN P."start_time" AND P."finish_time" ))
	LOOP
		--DBMS_OUTPUT.PUT_LINE(R.mid);
			total:=total + UPDATE_PLAYER_POINT(tid, pl_id , R.MID);
		
	END LOOP;

	--DBMS_OUTPUT.PUT_LINE(total);
	return total;

END;
/