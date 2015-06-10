CREATE OR REPLACE 
FUNCTION GET_USER_MATCH_POINT(u_id IN NUMBER,m_id IN NUMBER)
RETURN NUMBER IS

total NUMBER;
u_team_id NUMBER;
cur_tournament NUMBER;
cap NUMBER;

BEGIN

cur_tournament:=CURRENT_TOURNAMENT();

SELECT "user_match_team_id","captain_id" INTO u_team_id,cap
FROM "user_match_team" WHERE "user_id"=u_id AND "match_id" =m_id;

total:=0;
total:=total+UPDATE_PLAYER_POINT(cur_tournament, cap, m_id);

FOR R IN (SELECT "player_id"
					FROM "user_match_team_player"
					WHERE "user_match_team_id"=u_team_id)
	LOOP
			total:=total+UPDATE_PLAYER_POINT(cur_tournament, R."player_id", m_id);
	END LOOP;

	return total;
END;
/