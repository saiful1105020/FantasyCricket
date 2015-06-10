CREATE OR REPLACE TRIGGER update_player_point_trigger
BEFORE INSERT OR UPDATE
ON "player_match_point"
FOR EACH ROW
DECLARE
	cur_tournament NUMBER;
BEGIN
	:NEW."player_match_point_id" := pl_mch_pt_id_counter.nextval;
	SELECT CURRENT_TOURNAMENT() INTO cur_tournament FROM dual;
	:new."total_points" := update_player_point(cur_tournament,:new."player_id",:new."match_id");

EXCEPTION
	WHEN OTHERS THEN
		:new."total_points" :=0;
END ;
/