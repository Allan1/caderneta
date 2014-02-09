#Professores que ministram a mesma turma
SELECT `User`.`name` AS `professor_1`, `User1`.`name` AS `professor_2`, `Schoolclasse`.`semester`, `Schoolclasse`.`discipline_code`, `Schoolclasse`.`code` FROM `caderneta_eletronica`.`professors` AS `Professor` JOIN `caderneta_eletronica`.`users` AS `User` ON (`User`.`id` = `Professor`.`user_id`) JOIN `caderneta_eletronica`.`professors_schoolclasses` AS `ProfessorsSchoolclasse` ON (`ProfessorsSchoolclasse`.`professor_siape` = `Professor`.`siape`) JOIN `caderneta_eletronica`.`schoolclasses` AS `Schoolclasse` ON (`Schoolclasse`.`id` = `ProfessorsSchoolclasse`.`schoolclasse_id`) JOIN `caderneta_eletronica`.`professors_schoolclasses` AS `ProfessorsSchoolclasse2` ON (`ProfessorsSchoolclasse2`.`schoolclasse_id` = `Schoolclasse`.`id`) JOIN `caderneta_eletronica`.`professors` AS `Professor1` ON (`Professor1`.`siape` = `ProfessorsSchoolclasse2`.`professor_siape`) JOIN `caderneta_eletronica`.`users` AS `User1` ON (`User1`.`id` = `Professor1`.`user_id`) WHERE `Professor`.`siape`<>`Professor1`.`siape` GROUP BY `Schoolclasse`.`id`;
#Quantidade de turmas por professor
SELECT `Professor`.`siape`, `User`.`name`, COUNT(*) as QtdTurmas FROM `caderneta_eletronica`.`professors` AS `Professor` JOIN `caderneta_eletronica`.`users` AS `User` ON (`User`.`id` = `Professor`.`user_id`) JOIN `caderneta_eletronica`.`professors_schoolclasses` AS `ProfessorsSchoolclasse` ON (`ProfessorsSchoolclasse`.`professor_siape` = `Professor`.`siape`) WHERE 1 = 1 GROUP BY `Professor`.`siape` ORDER BY COUNT(*) DESC LIMIT 10;
#Ranking de estudantes com melhores médias entre todas as matérias
SELECT `Student`.`enrolment`, `User`.`name`, SUM(Grade.value*Evalutation.weight/10) as Media, `Schoolclass`.`semester`, `Schoolclass`.`discipline_code`, `Schoolclass`.`code` FROM `caderneta_eletronica`.`students` AS `Student` JOIN `caderneta_eletronica`.`users` AS `User` ON (`User`.`id` = `Student`.`user_id`) JOIN `caderneta_eletronica`.`schoolclasses_students` AS `SchoolclassesStudent` ON (`SchoolclassesStudent`.`student_enrolment` = `Student`.`enrolment`) JOIN `caderneta_eletronica`.`grades` AS `Grade` ON (`SchoolclassesStudent`.`id` = `Grade`.`schoolclasses_student_id`) JOIN `caderneta_eletronica`.`evaluations` AS `Evalutation` ON (`Evalutation`.`id` = `Grade`.`evaluation_id`) JOIN `caderneta_eletronica`.`schoolclasses` AS `Schoolclass` ON (`Schoolclass`.`id` = `SchoolclassesStudent`.`schoolclasse_id`) WHERE 1 = 1 GROUP BY `SchoolclassesStudent`.`id` ORDER BY SUM(`Grade`.`value`*`Evalutation`.`weight`/10) DESC LIMIT 10;

