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

Date: 2015-06-01 14:34:49
*/


-- ----------------------------
-- Table structure for "FANTASY_CRICKET"."constants"
-- ----------------------------
DROP TABLE "FANTASY_CRICKET"."constants";
CREATE TABLE "FANTASY_CRICKET"."constants" (
"BASE_SCORE" NUMBER DEFAULT 1  NULL ,
"MILESTONE_25_RUNS_BONUS" NUMBER NULL ,
"BATTING_PACE_BONUS" NUMBER NULL ,
"POINT_FOR_SIX" NUMBER NULL ,
"POINT_FOR_FOUR" NUMBER NULL ,
"POINT_FOR_WICKET" NUMBER NULL ,
"POINT_FOR_MAIDEN" NUMBER NULL ,
"MILESTONE_2_WICKET_BONUS" NUMBER NULL ,
"POSITIVE_BOWLING_PACE" NUMBER NULL ,
"NEGATIVE_BOWLING_PACE" NUMBER NULL ,
"CATCH_POINT" NUMBER NULL ,
"STUMPING_POINT" NUMBER NULL ,
"RUN_OUT_POINT" NUMBER NULL ,
"MOTM_BONUS_POINT" NUMBER NULL ,
"TOURNAMENT_ID" NUMBER NOT NULL 
)
LOGGING
NOCOMPRESS
NOCACHE

;

-- ----------------------------
-- Records of constants
-- ----------------------------
INSERT INTO "FANTASY_CRICKET"."constants" VALUES ('1', '10', '1', '5', '2', '20', '15', '15', '2', '1', '10', '15', '15', '50', '81');
INSERT INTO "FANTASY_CRICKET"."constants" VALUES ('1', '10', '1', '5', '2', '20', '15', '15', '2', '1', '10', '15', '15', '50', '1');
INSERT INTO "FANTASY_CRICKET"."constants" VALUES ('1', '10', '1', '5', '2', '20', '15', '15', '2', '1', '10', '15', '15', '50', '62');

-- ----------------------------
-- Indexes structure for table constants
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table "FANTASY_CRICKET"."constants"
-- ----------------------------
ALTER TABLE "FANTASY_CRICKET"."constants" ADD PRIMARY KEY ("TOURNAMENT_ID");
