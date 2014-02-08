select 	
	`schoolclasses`.`discipline_code` AS `discipline_code`,
	`schoolclasses`.`semester` AS `semester`,
	`schoolclasses`.`code` AS `code`,
	`evaluations`.`weight` AS `weight`,
	`grades`.`value` AS `grade`,
	`students`.`enrolment` AS `enrolment`,
	`users`.`name` AS `name`
from 					
		`schoolclasses_students` join 
		`grades` ON (`grades`.`schoolclasses_student_id` = `schoolclasses_students`.`id`) join
		`students` ON (`students`.`enrolment` = `schoolclasses_students`.`student_enrolment`) join 
		`schoolclasses` ON (`schoolclasses`.`id` = `schoolclasses_students`.`schoolclasse_id`) join 
		`users` ON (`students`.`user_id` = `users`.`id`) join
		`evaluations` ON (`schoolclasses`.`id` = `evaluations`.`schoolclasse_id`)
where 	
	`users`.`name` = `Allan`
group by
	`grades`.`id`
;