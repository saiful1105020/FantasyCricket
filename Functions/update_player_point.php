CREATE OR REPLACE function update_player_point (tid IN NUMBER ,pid IN NUMBER, mid IN NUMBER) RETURN NUMBER IS

pt NUMBER ;
pace NUMBER;

BEGIN

	pt:=0;

	FOR R1 IN(SELECT * FROM "constants" WHERE TOURNAMENT_ID=tid)
		LOOP
			--variable R1 is used to retrieve columns
			FOR R2 IN (SELECT * FROM "player_match_point" WHERE "player_id"=pid AND "match_id"=mid)
				LOOP
					--inner loop

					pt:=pt+(R2."runs_scored" * R1.BASE_SCORE);

					IF (R2."runs_scored" >= 25) THEN
										pt:=pt+(floor(R2."runs_scored"/25) * R1.MILESTONE_25_RUNS_BONUS);
					END IF;

					pt:=pt+(R2."runs_scored" - R2."balls_played")*R1.BATTING_PACE_BONUS;
					pt:=pt+(R2."sixes"*R1.POINT_FOR_SIX)+(R2."fours"*R1.POINT_FOR_FOUR);
					pt:=pt+(R2."wickets_taken"*R1.POINT_FOR_WICKET);

					IF (R2."wickets_taken" >= 2) THEN
										pt:=pt+(floor(R2."wickets_taken"/2) * R1.MILESTONE_2_WICKET_BONUS);
					END IF;

					pt:=pt+(R2."maiden_overs"*R1.POINT_FOR_MAIDEN);	
					pace:=floor(R2."balls_bowled"*1.5 - R2."runs_conceded");

					IF ( pace>= 0) THEN
										pt:=pt+(pace* R1.POSITIVE_BOWLING_PACE);
					ELSE
										pt:=pt+(pace* R1.NEGATIVE_BOWLING_PACE);
					END IF;

					pt:=pt+(R2."catches"*R1.CATCH_POINT);
					pt:=pt+(R2."stumpings"*R1.STUMPING_POINT);
					pt:=pt+(R2."run_outs"*R1.RUN_OUT_POINT);

					pt:=pt+R2."motm_bonus";

				END LOOP;

		END LOOP ;

		return pt;

		EXCEPTION
			WHEN OTHERS THEN
				return 0;
END ;
/