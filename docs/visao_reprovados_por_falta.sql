CREATE VIEW reprovado_por_falta AS 
select 
	`schoolclasses`.`discipline_code` AS `discipline_code`,
	`schoolclasses`.`semester` AS `semester`,
	`schoolclasses`.`code` AS `code`,
	`users`.`name` AS `name`,
	`students`.`enrolment` AS `enrolment`,
	`schoolclasses_students`.`attendance` AS `attendance`,
	`disciplines`.`minimal_attendance` AS `minimal_attendance`
from 
	(					
		`schoolclasses_students` join 
		`students` ON (`students`.`enrolment` = `schoolclasses_students`.`student_enrolment`) join 
		`schoolclasses` ON (`schoolclasses`.`id` = `schoolclasses_students`.`schoolclasse_id`) join 
		`users` ON (`students`.`user_id` = `users`.`id`) join
		`disciplines` ON (`schoolclasses`.`discipline_code` = `disciplines`.`code`)
	) 
where (
	`schoolclasses_students`.`attendance` < `disciplines`.`minimal_attendance`
);