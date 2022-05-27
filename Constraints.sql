create table temp as (select Responsible_id from Projects);
update Researcher,Projects,temp set Projects.Organization_id = Researcher.Organization_id where Researcher.Researcher_id in (temp.Responsible_id) and Projects.Responsible_id in (temp.Responsible_id);
update Projects set grade = null,  grade_date = null where end_date > NOW();


