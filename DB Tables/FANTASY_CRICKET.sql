/*
Navicat Oracle Data Transfer
Oracle Client Version : 11.1.0.7.0

Source Server         : Cricket_Fantasy
Source Server Version : 110200
Source Host           : localhost:1521
Source Schema         : FANTASY_CRICKET

Target Server Type    : ORACLE
Target Server Version : 110200
File Encoding         : 65001

Date: 2015-05-14 21:38:53
*/


-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."inter_phase"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."inter_phase";
CREATE TABLE "FANTASY_CRICKET"."inter_phase" (
"inter_phase_id" NUMBER NOT NULL ,
"prev_phase_id" NUMBER NOT NULL ,
"next_phase_id" NUMBER NOT NULL ,
"free_transfers" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of inter_phase
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."match"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."match";
CREATE TABLE "FANTASY_CRICKET"."match" (
"match_id" NUMBER NOT NULL ,
"start_time" TIMESTAMP(6)  NOT NULL ,
"team1_id" NUMBER NOT NULL ,
"team2_id" NUMBER NOT NULL ,
"motm_id" NUMBER NOT NULL ,
"tournament_id" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of match
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."phase"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."phase";
CREATE TABLE "FANTASY_CRICKET"."phase" (
"phase_id" NUMBER NOT NULL ,
"phase_name" VARCHAR2(50 BYTE) NOT NULL ,
"start_time" TIMESTAMP(6)  NOT NULL ,
"finish_time" TIMESTAMP(6)  NOT NULL ,
"free_transfers" NUMBER NOT NULL ,
"tournament_id" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of phase
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."player"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."player";
CREATE TABLE "FANTASY_CRICKET"."player" (
"player_id" NUMBER NOT NULL ,
"price" FLOAT(126) NOT NULL ,
"player_cat" VARCHAR2(20 BYTE) NOT NULL ,
"name" VARCHAR2(50 BYTE) NOT NULL ,
"team_id" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of player
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."player_match_point"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."player_match_point";
CREATE TABLE "FANTASY_CRICKET"."player_match_point" (
"player_match_point_id" NUMBER NOT NULL ,
"player_id" NUMBER NOT NULL ,
"match_id" NUMBER NOT NULL ,
"runs_scored" NUMBER NULL ,
"balls_played" NUMBER NULL ,
"fours" NUMBER NULL ,
"sixes" NUMBER NULL ,
"wickets_taken" NUMBER NULL ,
"balls_bowled" NUMBER NULL ,
"runs_conceded" NUMBER NULL ,
"maiden_overs" NUMBER NULL ,
"catches" NUMBER NULL ,
"stumpings" NUMBER NULL ,
"run_outs" NUMBER NULL ,
"total_points" NUMBER NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of player_match_point
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."player_tournament"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."player_tournament";
CREATE TABLE "FANTASY_CRICKET"."player_tournament" (
"player_tournament_id" NUMBER NOT NULL ,
"player_id" NUMBER NOT NULL ,
"tournament_id" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of player_tournament
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."team"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."team";
CREATE TABLE "FANTASY_CRICKET"."team" (
"team_id" NUMBER NOT NULL ,
"team_name" VARCHAR2(50 BYTE) NOT NULL ,
"jersy_image" VARCHAR2(255 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of team
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."team_tournament"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."team_tournament";
CREATE TABLE "FANTASY_CRICKET"."team_tournament" (
"team_tournament_id" NUMBER NOT NULL ,
"team_id" NUMBER NOT NULL ,
"tournament_id" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of team_tournament
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."tournament"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."tournament";
CREATE TABLE "FANTASY_CRICKET"."tournament" (
"tournament_id" NUMBER NOT NULL ,
"tournament_name" VARCHAR2(255 BYTE) NOT NULL ,
"start_date" DATE NOT NULL ,
"end_date" DATE NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of tournament
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."user_match_team"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."user_match_team";
CREATE TABLE "FANTASY_CRICKET"."user_match_team" (
"user_match_team_id" NUMBER NOT NULL ,
"user_id" NUMBER NOT NULL ,
"match_id" NUMBER NOT NULL ,
"captain_id" NUMBER NOT NULL ,
"total_point" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of user_match_team
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."user_match_team_player"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."user_match_team_player";
CREATE TABLE "FANTASY_CRICKET"."user_match_team_player" (
"user_match_team_player" NUMBER NOT NULL ,
"user_match_team_id" NUMBER NOT NULL ,
"player_id" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of user_match_team_player
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."user_tournament"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."user_tournament";
CREATE TABLE "FANTASY_CRICKET"."user_tournament" (
"user_tournament_id" NUMBER NOT NULL ,
"user_id" NUMBER NOT NULL ,
"tournament_id" NUMBER NOT NULL ,
"user_team_name" VARCHAR2(50 BYTE) NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of user_tournament
-- ----------------------------

-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."userInfo"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."userInfo";
CREATE TABLE "FANTASY_CRICKET"."userInfo" (
"user_id" NUMBER NOT NULL ,
"user_name" VARCHAR2(50 BYTE) NOT NULL ,
"email" VARCHAR2(50 BYTE) NOT NULL ,
"password" VARCHAR2(128 BYTE) NOT NULL ,
"birthday" DATE NULL ,
"country" VARCHAR2(50 BYTE) NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of userInfo
-- ----------------------------
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('47', 'Abdullah', 'abdullahwasim42@gmail.com', 'e369853df766fa44e1ed0ff613f563bd', null, 'Nepal');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('52', 'Hibijibi', 'hibi@g', '7215ee9c7d9dc229d2921a40e899ec5f', null, null);
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('2', 'Neamul', 'neamul.kabir11@gmail.com', 'Neamul', TO_DATE('1994-02-12 23:39:56', 'YYYY-MM-DD HH24:MI:SS'), 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('24', 'Test_User', 'test_user_3@gmail.com', '033bd94b1168d7e4f0d644c3c95e35bf', null, 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('25', 'Test_User_2', 'test_user@gmail.com', '033bd94b1168d7e4f0d644c3c95e35bf', null, 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('45', 'Md. Saiful Islam', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', null, null);
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('46', 'Neamul', 'neamul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', null, 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('48', 'Temporary', 'temp@gmail.com', '7215ee9c7d9dc229d2921a40e899ec5f', null, null);
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('1', 'Saiful', 'saiful.11722@gmail.com', '11722', null, 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('3', 'Dipon', 'dipon2276@gmail.com', 'insuline', null, 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('4', 'Test', 'test@gmail.com', 'pass', null, null);
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('5', 'Test', 'test@gmail.com', 'pass', null, null);
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('6', 'Test', 'test@gmail.com', 'pass', null, null);
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('49', 'New User', 'new@ymail.com', '7215ee9c7d9dc229d2921a40e899ec5f', null, 'Bangladesh');
INSERT INTO "FANTASY_CRICKET"."userInfo" VALUES ('50', 'New User 2', 'new@gmail.com', '7215ee9c7d9dc229d2921a40e899ec5f', null, null);

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."INTER_PHASE_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."INTER_PHASE_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."INTER_PHASE_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."MATCH_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."MATCH_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."MATCH_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."PHASE_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."PHASE_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."PHASE_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."PL_MCH_PT_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."PL_MCH_PT_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."PL_MCH_PT_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."PLAYER_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."PLAYER_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."PLAYER_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."PLAYER_TOURNAMENT_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."PLAYER_TOURNAMENT_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."PLAYER_TOURNAMENT_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."TEAM_ID"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."TEAM_ID";
CREATE SEQUENCE "FANTASY_CRICKET"."TEAM_ID"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 9999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."TEAM_TOURNAMENT_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."TEAM_TOURNAMENT_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."TEAM_TOURNAMENT_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."TOURNAMENT_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."TOURNAMENT_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."TOURNAMENT_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."U_MAT_TM_PLAYER_ID"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."U_MAT_TM_PLAYER_ID";
CREATE SEQUENCE "FANTASY_CRICKET"."U_MAT_TM_PLAYER_ID"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."USER_ID"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."USER_ID";
CREATE SEQUENCE "FANTASY_CRICKET"."USER_ID"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 9999999999999999999999999999
 START WITH 64
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."USER_MATCH_TEAM_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."USER_MATCH_TEAM_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."USER_MATCH_TEAM_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Sequence structure for "FANTASY_CRICKET"."USER_TOURNAMENT_ID_COUNTER"
-- ----------------------------
DROP SEQUENCE "FANTASY_CRICKET"."USER_TOURNAMENT_ID_COUNTER";
CREATE SEQUENCE "FANTASY_CRICKET"."USER_TOURNAMENT_ID_COUNTER"
 INCREMENT BY 1
 MINVALUE 1
 MAXVALUE 999999999999999999999999999
 START WITH 1
 CACHE 20;

-- ----------------------------
-- Indexes structure for table inter_phase
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."inter_phase"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."INTER_PHASE_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."inter_phase" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				:NEW."inter_phase_id" := inter_phase_id_counter.nextval;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."inter_phase"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."inter_phase" ADD CHECK ("inter_phase_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."inter_phase" ADD CHECK ("prev_phase_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."inter_phase" ADD CHECK ("next_phase_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."inter_phase" ADD CHECK ("free_transfers" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."inter_phase"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."inter_phase" ADD PRIMARY KEY ("inter_phase_id");

-- ----------------------------
-- Indexes structure for table match
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."match"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."MATCH_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."match" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				if :NEW."match_id" is null then
						:NEW."match_id" := match_id_counter.nextval;
				end if;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."match"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."match" ADD CHECK ("match_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."match" ADD CHECK ("start_time" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."match" ADD CHECK ("team1_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."match" ADD CHECK ("team2_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."match" ADD CHECK ("motm_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."match" ADD CHECK ("tournament_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."match"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."match" ADD PRIMARY KEY ("match_id");

-- ----------------------------
-- Indexes structure for table phase
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."phase"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."PHASE_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."phase" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				:NEW."phase_id" := phase_id_counter.nextval;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."phase"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."phase" ADD CHECK ("phase_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."phase" ADD CHECK ("phase_name" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."phase" ADD CHECK ("start_time" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."phase" ADD CHECK ("finish_time" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."phase" ADD CHECK ("free_transfers" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."phase" ADD CHECK ("tournament_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."phase"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."phase" ADD PRIMARY KEY ("phase_id");

-- ----------------------------
-- Indexes structure for table player
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."player"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."PLAYER_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."player" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				if :NEW."player_id" is null then
						:NEW."player_id" := player_id_counter.nextval;
				end if;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."player"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player" ADD CHECK ("player_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player" ADD CHECK ("price" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player" ADD CHECK ("player_cat" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player" ADD CHECK ("name" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player" ADD CHECK ("team_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."player"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player" ADD PRIMARY KEY ("player_id");

-- ----------------------------
-- Indexes structure for table player_match_point
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."player_match_point"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."PLAYER_MATCH_PT_AI" BEFORE INSERT ON "FANTASY_CRICKET"."player_match_point" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				:NEW."player_match_point_id" := pl_mch_pt_id_counter.nextval;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."player_match_point"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player_match_point" ADD CHECK ("player_match_point_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player_match_point" ADD CHECK ("player_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player_match_point" ADD CHECK ("match_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."player_match_point"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player_match_point" ADD PRIMARY KEY ("player_match_point_id");

-- ----------------------------
-- Indexes structure for table player_tournament
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."player_tournament"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."PLAYER_TOURNAMENT_AI" BEFORE INSERT ON "FANTASY_CRICKET"."player_tournament" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				:NEW."player_tournament_id" := player_tournament_id_counter.nextval;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."player_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player_tournament" ADD CHECK ("player_tournament_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player_tournament" ADD CHECK ("player_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."player_tournament" ADD CHECK ("tournament_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."player_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player_tournament" ADD PRIMARY KEY ("player_tournament_id");

-- ----------------------------
-- Indexes structure for table team
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."team"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."TEAM_ID" BEFORE INSERT ON "FANTASY_CRICKET"."team" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
  :new."team_id" := team_id.nextval;
END;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."team"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."team" ADD CHECK ("team_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."team" ADD CHECK ("team_name" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."team" ADD CHECK ("jersy_image" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."team"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."team" ADD PRIMARY KEY ("team_id");

-- ----------------------------
-- Indexes structure for table team_tournament
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."team_tournament"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."TEAM_TOURNAMENT_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."team_tournament" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				if :NEW."team_tournament_id" is null then
						:NEW."team_tournament_id" := team_tournament_id_counter.nextval;
				end if;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."team_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."team_tournament" ADD CHECK ("team_tournament_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."team_tournament" ADD CHECK ("team_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."team_tournament" ADD CHECK ("tournament_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."team_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."team_tournament" ADD PRIMARY KEY ("team_tournament_id");

-- ----------------------------
-- Indexes structure for table tournament
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."tournament"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."TOURNAMENT_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."tournament" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				if :NEW."tournament_id" is null then
						:NEW."tournament_id" := tournament_counter.nextval;
				end if;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."tournament" ADD CHECK ("tournament_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."tournament" ADD CHECK ("tournament_name" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."tournament" ADD CHECK ("start_date" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."tournament" ADD CHECK ("end_date" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."tournament" ADD PRIMARY KEY ("tournament_id");

-- ----------------------------
-- Indexes structure for table user_match_team
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."user_match_team"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."USER_MATCH_TEAM_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."user_match_team" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				if :NEW."user_match_team_id" is null then
						:NEW."user_match_team_id" := user_match_team_id_counter.nextval;
				end if;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."user_match_team"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD CHECK ("user_match_team_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD CHECK ("user_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD CHECK ("match_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD CHECK ("captain_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD CHECK ("total_point" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."user_match_team"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD PRIMARY KEY ("user_match_team_id");

-- ----------------------------
-- Indexes structure for table user_match_team_player
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."user_match_team_player"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."U_MAT_TM_PLAYER_AI" BEFORE INSERT ON "FANTASY_CRICKET"."user_match_team_player" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
				:NEW."user_match_team_player" := u_mat_tm_player_id.nextval;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."user_match_team_player"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_match_team_player" ADD CHECK ("user_match_team_player" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_match_team_player" ADD CHECK ("user_match_team_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_match_team_player" ADD CHECK ("player_id" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."user_match_team_player"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_match_team_player" ADD PRIMARY KEY ("user_match_team_player");

-- ----------------------------
-- Indexes structure for table user_tournament
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."user_tournament"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."USER_TOURNAMENT_AUTO_INCREMENT" BEFORE INSERT ON "FANTASY_CRICKET"."user_tournament" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
begin
				if :NEW."user_tournament_id" is null then
						:NEW."user_tournament_id" := user_tournament_id_counter.nextval;
				end if;
			end;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."user_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD CHECK ("user_tournament_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD CHECK ("user_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD CHECK ("tournament_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD CHECK ("user_team_name" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."user_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD PRIMARY KEY ("user_tournament_id");

-- ----------------------------
-- Indexes structure for table userInfo
-- ----------------------------

-- ----------------------------
-- Triggers structure for table "FANTASY_CRICKET"."userInfo"
-- ----------------------------
CREATE OR REPLACE TRIGGER "FANTASY_CRICKET"."USERINFOTRIGGER" BEFORE INSERT ON "FANTASY_CRICKET"."userInfo" REFERENCING OLD AS "OLD" NEW AS "NEW" FOR EACH ROW ENABLE
BEGIN
			:NEW."user_id":=user_id.nextval;
		END;
-- ----------------------------
-- Checks structure for table "FANTASY_CRICKET"."userInfo"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."userInfo" ADD CHECK ("user_id" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."userInfo" ADD CHECK ("email" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."userInfo" ADD CHECK ("password" IS NOT NULL);
ALTER TABLE "FANTASY_CRICKET"."userInfo" ADD CHECK ("user_name" IS NOT NULL);

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."userInfo"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."userInfo" ADD PRIMARY KEY ("user_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."inter_phase"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."inter_phase" ADD FOREIGN KEY ("prev_phase_id") REFERENCES "FANTASY_CRICKET"."phase" ("phase_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."match"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."match" ADD FOREIGN KEY ("motm_id") REFERENCES "FANTASY_CRICKET"."player" ("player_id");
ALTER TABLE "FANTASY_CRICKET"."match" ADD FOREIGN KEY ("team1_id") REFERENCES "FANTASY_CRICKET"."team" ("team_id");
ALTER TABLE "FANTASY_CRICKET"."match" ADD FOREIGN KEY ("team2_id") REFERENCES "FANTASY_CRICKET"."team" ("team_id");
ALTER TABLE "FANTASY_CRICKET"."match" ADD FOREIGN KEY ("tournament_id") REFERENCES "FANTASY_CRICKET"."tournament" ("tournament_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."phase"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."phase" ADD FOREIGN KEY ("tournament_id") REFERENCES "FANTASY_CRICKET"."tournament" ("tournament_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."player"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player" ADD FOREIGN KEY ("team_id") REFERENCES "FANTASY_CRICKET"."team" ("team_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."player_match_point"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player_match_point" ADD FOREIGN KEY ("match_id") REFERENCES "FANTASY_CRICKET"."match" ("match_id");
ALTER TABLE "FANTASY_CRICKET"."player_match_point" ADD FOREIGN KEY ("player_id") REFERENCES "FANTASY_CRICKET"."player" ("player_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."player_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."player_tournament" ADD FOREIGN KEY ("player_id") REFERENCES "FANTASY_CRICKET"."player" ("player_id");
ALTER TABLE "FANTASY_CRICKET"."player_tournament" ADD FOREIGN KEY ("tournament_id") REFERENCES "FANTASY_CRICKET"."tournament" ("tournament_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."team_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."team_tournament" ADD FOREIGN KEY ("team_id") REFERENCES "FANTASY_CRICKET"."team" ("team_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."user_match_team"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD FOREIGN KEY ("captain_id") REFERENCES "FANTASY_CRICKET"."player" ("player_id");
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD FOREIGN KEY ("match_id") REFERENCES "FANTASY_CRICKET"."match" ("match_id");
ALTER TABLE "FANTASY_CRICKET"."user_match_team" ADD FOREIGN KEY ("user_id") REFERENCES "FANTASY_CRICKET"."userInfo" ("user_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."user_match_team_player"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_match_team_player" ADD FOREIGN KEY ("player_id") REFERENCES "FANTASY_CRICKET"."player" ("player_id");
ALTER TABLE "FANTASY_CRICKET"."user_match_team_player" ADD FOREIGN KEY ("user_match_team_id") REFERENCES "FANTASY_CRICKET"."user_match_team" ("user_match_team_id");

-- ----------------------------
-- Foreign Key structure for table "FANTASY_CRICKET"."user_tournament"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD FOREIGN KEY ("tournament_id") REFERENCES "FANTASY_CRICKET"."tournament" ("tournament_id");
ALTER TABLE "FANTASY_CRICKET"."user_tournament" ADD FOREIGN KEY ("user_id") REFERENCES "FANTASY_CRICKET"."userInfo" ("user_id");
