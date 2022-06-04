create table temp as (select Responsible_id from Projects);
update Researcher,Projects,temp set Projects.Organization_id = Researcher.Organization_id where Researcher.Researcher_id in (temp.Responsible_id) and Projects.Responsible_id in (temp.Responsible_id);
update Projects set grade = null,  grade_date = null where end_date > NOW();
update Projects set grade_date = DATE_ADD(end_date, INTERVAL 1 YEAR);
create table temp as select Researcher.Researcher_id from (Projects join Researcher on Projects.Evaluator_id = Researcher.Researcher_id) where Projects.Organization_id = Researcher.Organization_id;
update Researcher,temp set Researcher.Organization_id = Researcher.Organization_id + 1 where Researcher.Researcher_id in (temp.Researcher_id);
delete from Deliverable using (Deliverable join Projects on Deliverable.Project_id = Projects.Project_id) where (Deliverable.date < Projects.start_date or Deliverable.date > Projects.end_date);

