/*
 Navicat Premium Data Transfer

 Source Server         : wdpai-remote
 Source Server Type    : PostgreSQL
 Source Server Version : 140004
 Source Host           : ec2-52-214-23-110.eu-west-1.compute.amazonaws.com:5432
 Source Catalog        : dc5dfl9dtv3jh4
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 140004
 File Encoding         : 65001

 Date: 26/06/2022 18:13:40
*/


-- ----------------------------
-- Table structure for Session
-- ----------------------------
DROP TABLE IF EXISTS "public"."Session";
CREATE TABLE "public"."Session" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "user_id" uuid NOT NULL,
  "notification_id" uuid NOT NULL,
  "login" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "created" int8
)
;

-- ----------------------------
-- Table structure for Task
-- ----------------------------
DROP TABLE IF EXISTS "public"."Task";
CREATE TABLE "public"."Task" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "category_id" uuid NOT NULL,
  "value" varchar(250) COLLATE "pg_catalog"."default" NOT NULL,
  "date_added" date NOT NULL,
  "date_ended" date
)
;

-- ----------------------------
-- Records of Task
-- ----------------------------
INSERT INTO "public"."Task" VALUES ('48ad65cf-c370-4602-8d10-82f36c9cbd03', '2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'hfghfdgh', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('0024ef7a-c841-4552-84ce-3be929b40365', '15697936-4471-4a5e-b199-04e7d4770e80', 'smh', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('609c1963-b013-4b2f-8b3a-4bf3203fa10a', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'jakiś task', '2022-06-20', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('2a435caa-ffb1-4ef5-9805-fc6c8e5c2772', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'JESZCZE INNY', '2022-06-22', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('8a5e8b27-7712-400f-8d2e-da8dbde4bdb2', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'not finished', '2022-06-22', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('38f973b1-9a32-4258-bf9c-a6f482ba49bf', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'inny task', '2022-06-22', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('0db12ddd-b201-4abd-96f6-653b2698e295', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'sdfggf', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('95dc18ad-b3d1-40dc-8dc9-6ba2b3d476c1', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'dwatrzy', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('54493273-6df6-4d58-8ead-4c4dede3af75', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'jede', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('495047df-91af-4ed1-943d-bb8ce3ca18fc', '15697936-4471-4a5e-b199-04e7d4770e80', 'jeden', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('2440fe88-6c3a-49e3-9700-630f4fa6a6a0', '15697936-4471-4a5e-b199-04e7d4770e80', 'inny', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('c8ba2837-b007-424b-bdf7-5a173864ddc2', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', ' jrjr', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('84635d05-0ab2-4551-9761-4fa25e0d6828', 'a53dc99d-adb8-409b-86f4-8e2c6f536cc2', ' jrjr', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('0647fd4e-5059-4286-a3f9-9dc575064cf4', '15697936-4471-4a5e-b199-04e7d4770e80', 'dwa', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('74560e26-f876-4858-a0a7-c66ba779dc15', '15697936-4471-4a5e-b199-04e7d4770e80', 'fgjj', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('79f97160-8066-486c-bedf-32c456c6034a', '15697936-4471-4a5e-b199-04e7d4770e80', '', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('bcadac7f-54ba-47c1-be89-afa527608819', '2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'content', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('3ada477d-d6a9-45c1-9449-94a437577c5e', '2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'content', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('57f66719-c6fc-4bb0-9418-e799dd79009c', '2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'casdc', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('ab851a37-cd8c-490b-ab93-778d0905c3f1', '2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'ikkkk', '2022-06-26', '2022-06-26');
INSERT INTO "public"."Task" VALUES ('d582682c-ba62-42b6-b2dc-835c2008d85a', '2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'sdfgdfg', '2022-06-26', '2022-06-26');

-- ----------------------------
-- Table structure for TaskCategory
-- ----------------------------
DROP TABLE IF EXISTS "public"."TaskCategory";
CREATE TABLE "public"."TaskCategory" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "name" varchar(1) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of TaskCategory
-- ----------------------------
INSERT INTO "public"."TaskCategory" VALUES ('a53dc99d-adb8-409b-86f4-8e2c6f536cc2', 'A');
INSERT INTO "public"."TaskCategory" VALUES ('15697936-4471-4a5e-b199-04e7d4770e80', 'B');
INSERT INTO "public"."TaskCategory" VALUES ('2fea83b0-95ec-4f0b-93c9-2a8c929c90a3', 'C');

-- ----------------------------
-- Table structure for User
-- ----------------------------
DROP TABLE IF EXISTS "public"."User";
CREATE TABLE "public"."User" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "role_id" uuid NOT NULL,
  "notification_id" uuid NOT NULL,
  "login" varchar(40) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of User
-- ----------------------------
INSERT INTO "public"."User" VALUES ('3a6b0e6e-4173-418d-b551-1198f1788175', '393f5b3e-044b-44e1-847e-e34b150f9df3', 'be86c6a6-0554-410a-8ff0-e834f967134d', 'anna', 'anna2');
INSERT INTO "public"."User" VALUES ('51a7e652-6c44-4657-b43e-5cf92c562c41', '0b25bf79-fb53-43bf-8550-9ecf35b141da', 'e58f7f61-2dac-475b-a835-01db7e61c191', 'jsnow@pk.edu.pl', 'admin');
INSERT INTO "public"."User" VALUES ('520ec433-06c2-4d15-8d71-172d6f57e384', '0b25bf79-fb53-43bf-8550-9ecf35b141da', '0ecbe967-80e0-4d9c-9f2b-9e6fe876fc80', 'testowy', '$2y$10$4zL9ETbeSZ2iLtWqXqgfXOHdRSFQeos0HilFz3aJYeGUCSRBk8uYq');
INSERT INTO "public"."User" VALUES ('3e4d9852-6dd9-423f-951d-20bc4ee5fa53', '0b25bf79-fb53-43bf-8550-9ecf35b141da', '7953c997-7b70-44bc-92e5-ea1b2d1750ce', 'krasowska', '$2y$10$tNbGlh1nlP6RZ3gpnm1os.c9QsfEk3hIFeoWWFTkxOcGj7n2lEGWO');
INSERT INTO "public"."User" VALUES ('a0e79a0f-e697-441e-ad6d-fddf7e11da9b', '0b25bf79-fb53-43bf-8550-9ecf35b141da', 'b93966e0-6ef1-460f-a0b0-1847395fd6d0', 'login', '$2y$10$g/dxlWzPZ3XlHdniHH94i.QCFiMJruNQZufZ7JhBC27ch5.p5agZW');

-- ----------------------------
-- Table structure for UserNotification
-- ----------------------------
DROP TABLE IF EXISTS "public"."UserNotification";
CREATE TABLE "public"."UserNotification" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "email" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of UserNotification
-- ----------------------------
INSERT INTO "public"."UserNotification" VALUES ('be86c6a6-0554-410a-8ff0-e834f967134d', 'annakrasowska2@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('e58f7f61-2dac-475b-a835-01db7e61c191', 'scelerosa@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('1e2c0635-136e-4daa-88c1-fef0c81476ca', 'annakrasowska2@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('c8669b8b-39ca-4a46-ac4b-a12b29b3d5ae', 'annakrasowska2@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('04857f6d-069c-43dc-b3bf-407f5195ce9d', 'annakrasowska2@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('0ecbe967-80e0-4d9c-9f2b-9e6fe876fc80', 'annakrasowska2@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('7953c997-7b70-44bc-92e5-ea1b2d1750ce', 'annakrasowska2@gmail.com');
INSERT INTO "public"."UserNotification" VALUES ('b93966e0-6ef1-460f-a0b0-1847395fd6d0', 'annakrasowska2@gmail.com');

-- ----------------------------
-- Table structure for UserRole
-- ----------------------------
DROP TABLE IF EXISTS "public"."UserRole";
CREATE TABLE "public"."UserRole" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "name" varchar(30) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of UserRole
-- ----------------------------
INSERT INTO "public"."UserRole" VALUES ('393f5b3e-044b-44e1-847e-e34b150f9df3', 'admin');
INSERT INTO "public"."UserRole" VALUES ('0b25bf79-fb53-43bf-8550-9ecf35b141da', 'user');

-- ----------------------------
-- Table structure for UserTask
-- ----------------------------
DROP TABLE IF EXISTS "public"."UserTask";
CREATE TABLE "public"."UserTask" (
  "id" uuid NOT NULL DEFAULT gen_random_uuid(),
  "user_id" uuid NOT NULL,
  "task_id" uuid
)
;

-- ----------------------------
-- Records of UserTask
-- ----------------------------
INSERT INTO "public"."UserTask" VALUES ('eb1cb8c4-6dd0-40a6-87f7-6945cf23528a', '3a6b0e6e-4173-418d-b551-1198f1788175', '609c1963-b013-4b2f-8b3a-4bf3203fa10a');
INSERT INTO "public"."UserTask" VALUES ('9d3a70f7-d56e-419d-ae48-3e0adc30d01d', '51a7e652-6c44-4657-b43e-5cf92c562c41', '2a435caa-ffb1-4ef5-9805-fc6c8e5c2772');
INSERT INTO "public"."UserTask" VALUES ('c1600042-0df8-4051-be1f-52c674ec1133', '3a6b0e6e-4173-418d-b551-1198f1788175', '8a5e8b27-7712-400f-8d2e-da8dbde4bdb2');
INSERT INTO "public"."UserTask" VALUES ('f7e6d619-c8e6-4a71-bb6b-031b055ed16b', '520ec433-06c2-4d15-8d71-172d6f57e384', '38f973b1-9a32-4258-bf9c-a6f482ba49bf');
INSERT INTO "public"."UserTask" VALUES ('93d7d5b3-5818-47d1-a058-28c94191ca69', '520ec433-06c2-4d15-8d71-172d6f57e384', '0db12ddd-b201-4abd-96f6-653b2698e295');
INSERT INTO "public"."UserTask" VALUES ('80b1d34a-99d4-4afc-8f36-685fcd194b3e', '520ec433-06c2-4d15-8d71-172d6f57e384', '95dc18ad-b3d1-40dc-8dc9-6ba2b3d476c1');
INSERT INTO "public"."UserTask" VALUES ('3cc111d1-f00d-466d-9831-dc0b15c4c7da', '520ec433-06c2-4d15-8d71-172d6f57e384', '54493273-6df6-4d58-8ead-4c4dede3af75');
INSERT INTO "public"."UserTask" VALUES ('13ef9dbf-eb42-4307-824c-20bc35add440', '520ec433-06c2-4d15-8d71-172d6f57e384', '495047df-91af-4ed1-943d-bb8ce3ca18fc');
INSERT INTO "public"."UserTask" VALUES ('9b7cc38e-622f-4911-92a4-e958a6bff12c', '520ec433-06c2-4d15-8d71-172d6f57e384', '2440fe88-6c3a-49e3-9700-630f4fa6a6a0');
INSERT INTO "public"."UserTask" VALUES ('204ec9f3-5a65-4432-be8c-6b36b53799f4', '520ec433-06c2-4d15-8d71-172d6f57e384', 'c8ba2837-b007-424b-bdf7-5a173864ddc2');
INSERT INTO "public"."UserTask" VALUES ('3305cf94-0679-4d75-be91-767b83401e25', '520ec433-06c2-4d15-8d71-172d6f57e384', '84635d05-0ab2-4551-9761-4fa25e0d6828');
INSERT INTO "public"."UserTask" VALUES ('d69620ed-798f-4241-a21b-94eea06e0e93', '520ec433-06c2-4d15-8d71-172d6f57e384', '0647fd4e-5059-4286-a3f9-9dc575064cf4');
INSERT INTO "public"."UserTask" VALUES ('e3b9fbf2-96f4-4c41-84e4-f02695b6f406', '520ec433-06c2-4d15-8d71-172d6f57e384', '74560e26-f876-4858-a0a7-c66ba779dc15');
INSERT INTO "public"."UserTask" VALUES ('18b79ec0-a95e-4660-b339-5688e7c13da7', '520ec433-06c2-4d15-8d71-172d6f57e384', '79f97160-8066-486c-bedf-32c456c6034a');
INSERT INTO "public"."UserTask" VALUES ('24346a77-45da-4428-8f76-165bab095700', '520ec433-06c2-4d15-8d71-172d6f57e384', 'bcadac7f-54ba-47c1-be89-afa527608819');
INSERT INTO "public"."UserTask" VALUES ('e60c329d-ce7f-4293-95cc-925310831fbf', '520ec433-06c2-4d15-8d71-172d6f57e384', '3ada477d-d6a9-45c1-9449-94a437577c5e');
INSERT INTO "public"."UserTask" VALUES ('f74f3f61-aa72-43b3-8ca4-680553f32ed4', '520ec433-06c2-4d15-8d71-172d6f57e384', '57f66719-c6fc-4bb0-9418-e799dd79009c');
INSERT INTO "public"."UserTask" VALUES ('81730f8d-960b-4b66-84f4-99a8af636794', '520ec433-06c2-4d15-8d71-172d6f57e384', 'ab851a37-cd8c-490b-ab93-778d0905c3f1');
INSERT INTO "public"."UserTask" VALUES ('482284f6-d8f2-4a48-aac9-13d8ba329f5a', '520ec433-06c2-4d15-8d71-172d6f57e384', '0024ef7a-c841-4552-84ce-3be929b40365');
INSERT INTO "public"."UserTask" VALUES ('2286045d-f43b-4a32-827c-e4cd6da03989', '520ec433-06c2-4d15-8d71-172d6f57e384', '48ad65cf-c370-4602-8d10-82f36c9cbd03');
INSERT INTO "public"."UserTask" VALUES ('e7c7226a-d2b0-4fc1-ac9b-70ec62893aa2', '520ec433-06c2-4d15-8d71-172d6f57e384', 'd582682c-ba62-42b6-b2dc-835c2008d85a');

-- ----------------------------
-- Function structure for taskbyusernotfinished_function
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."taskbyusernotfinished_function"("arg_user_id" uuid);
CREATE OR REPLACE FUNCTION "public"."taskbyusernotfinished_function"("arg_user_id" uuid)
  RETURNS TABLE("id" uuid, "category_id" uuid, "category_name" varchar, "value" varchar, "date_added" date, "date_ended" date) AS $BODY$
BEGIN
RETURN QUERY
   SELECT DISTINCT public."Task".id, public."TaskCategory".id, public."TaskCategory".name, public."Task".value, public."Task".date_added, public."Task".date_ended
   FROM public."UserTask" 
   JOIN public."User"
   ON public."UserTask".user_id = arg_user_id
   JOIN public."Task"
   ON public."UserTask".task_id = public."Task".id
   JOIN public."TaskCategory"
   ON public."Task".category_id = public."TaskCategory".id
   WHERE public."Task".date_ended IS NULL OR public."Task".date_ended = now()::date;
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;

-- ----------------------------
-- Function structure for taskbyuserwithdate_function
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."taskbyuserwithdate_function"("arg_user_id" uuid, "arg_date" date);
CREATE OR REPLACE FUNCTION "public"."taskbyuserwithdate_function"("arg_user_id" uuid, "arg_date" date)
  RETURNS TABLE("id" uuid, "category_id" uuid, "category_name" varchar, "value" varchar, "date_added" date, "date_ended" date) AS $BODY$
BEGIN
RETURN QUERY
   SELECT DISTINCT public."Task".id, public."TaskCategory".id, public."TaskCategory".name, public."Task".value, public."Task".date_added, public."Task".date_ended
   FROM public."UserTask" 
   JOIN public."User"
   ON public."UserTask".user_id = arg_user_id
   JOIN public."Task"
   ON public."UserTask".task_id = public."Task".id
   JOIN public."TaskCategory"
   ON public."Task".category_id = public."TaskCategory".id
   WHERE public."Task".date_added <= arg_date AND ((public."Task".date_ended IS NULL AND arg_date <= now()) OR public."Task".date_ended >= arg_date);
END;$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;

-- ----------------------------
-- View structure for Task_View
-- ----------------------------
DROP VIEW IF EXISTS "public"."Task_View";
CREATE VIEW "public"."Task_View" AS  SELECT "Task".id,
    "Task".value,
    "Task".date_added,
    "Task".date_ended,
    "Task".category_id,
    "TaskCategory".name
   FROM "Task"
     LEFT JOIN "TaskCategory" ON "Task".category_id = "TaskCategory".id;

-- ----------------------------
-- View structure for User_View
-- ----------------------------
DROP VIEW IF EXISTS "public"."User_View";
CREATE VIEW "public"."User_View" AS  SELECT "User".id,
    "User".role_id,
    "User".notification_id,
    "User".login,
    "User".password,
    "UserNotification".email,
    "UserRole".name
   FROM "User"
     LEFT JOIN "UserNotification" ON "User".notification_id = "UserNotification".id
     LEFT JOIN "UserRole" ON "User".role_id = "UserRole".id;

-- ----------------------------
-- Uniques structure for table Session
-- ----------------------------
ALTER TABLE "public"."Session" ADD CONSTRAINT "user_id_unique" UNIQUE ("user_id");

-- ----------------------------
-- Primary Key structure for table Session
-- ----------------------------
ALTER TABLE "public"."Session" ADD CONSTRAINT "Session_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table Task
-- ----------------------------
CREATE INDEX "fki_category_id_fk" ON "public"."Task" USING btree (
  "category_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table Task
-- ----------------------------
ALTER TABLE "public"."Task" ADD CONSTRAINT "task_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table TaskCategory
-- ----------------------------
ALTER TABLE "public"."TaskCategory" ADD CONSTRAINT "task_category_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table User
-- ----------------------------
CREATE INDEX "fki_role_id_fk" ON "public"."User" USING btree (
  "role_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);
CREATE INDEX "fki_user" ON "public"."User" USING btree (
  "notification_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table User
-- ----------------------------
ALTER TABLE "public"."User" ADD CONSTRAINT "notification_id_unique" UNIQUE ("notification_id");

-- ----------------------------
-- Primary Key structure for table User
-- ----------------------------
ALTER TABLE "public"."User" ADD CONSTRAINT "user_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table UserNotification
-- ----------------------------
ALTER TABLE "public"."UserNotification" ADD CONSTRAINT "user_notification_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table UserRole
-- ----------------------------
ALTER TABLE "public"."UserRole" ADD CONSTRAINT "user_role_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table UserTask
-- ----------------------------
CREATE INDEX "fki_task_id_fk" ON "public"."UserTask" USING btree (
  "task_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);
CREATE INDEX "fki_user_id_fk" ON "public"."UserTask" USING btree (
  "user_id" "pg_catalog"."uuid_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table UserTask
-- ----------------------------
ALTER TABLE "public"."UserTask" ADD CONSTRAINT "user_task_pk" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table Task
-- ----------------------------
ALTER TABLE "public"."Task" ADD CONSTRAINT "category_id_fk" FOREIGN KEY ("category_id") REFERENCES "public"."TaskCategory" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table User
-- ----------------------------
ALTER TABLE "public"."User" ADD CONSTRAINT "notification_id_fk" FOREIGN KEY ("notification_id") REFERENCES "public"."UserNotification" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."User" ADD CONSTRAINT "role_id_fk" FOREIGN KEY ("role_id") REFERENCES "public"."UserRole" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table UserTask
-- ----------------------------
ALTER TABLE "public"."UserTask" ADD CONSTRAINT "task_id_fk" FOREIGN KEY ("task_id") REFERENCES "public"."Task" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."UserTask" ADD CONSTRAINT "user_id_fk" FOREIGN KEY ("user_id") REFERENCES "public"."User" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;
