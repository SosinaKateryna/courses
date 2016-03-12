# courses

http://rubygarage.ho.ua/files/   работающее приложение


Реализовано
1.Страницы Логин / Регистрация 
2.Возможность создавать / обновлять / удалять проекты
3.Возможность добавлять задачи проект
4.Возможность редактировать / удалять задачи
5.Возможность определить приоритеты задач в проект(перетягивать таски в проекте)
6.Возможность выбрать срок для моей задачи
7.Возможность пометить задачу как "сделано"(чекбокс)
8.Для серверной части использовался PHP
9.Для сохранения испольуется AJAX

SQL TASK:

1.get all statuses, not repeating, alphabetically ordered
Select DISTINCT status from tasks ORDER BY status asc;

2.get the count of all tasks in each project, order by tasks count descending
Select projects.id, count(tasks) as task_count from tasks right join projects on (tasks.project_id = projects.id) GROUP BY projects.id ORDER BY task_count ASC;

3.get the count of all tasks in each project, order by projects names
Select projects.name, count(tasks) from tasks right join projects on (tasks.project_id = projects.id) GROUP BY projects.id ORDER BY projects.name ASC;

4.get the tasks for all projects having the name beginning with “N” letter
status
Select projects.name, tasks.name from tasks inner join projects on (tasks.project_id = projects.id) where tasks.name like 'N%';

5.get the list of all projects containing the ‘a’ letter in the middle of the name, and show the tasks count near each project. Mention that there can exist projects without tasks and tasks with project_id=NULL
Select projects.name, count(tasks) from tasks right join projects on (tasks.project_id = projects.id) where projects.name like '%a%' GROUP BY projects.id;

6.get the list of tasks with duplicate names. Order alphabetically
Select id, name from tasks where name in (select name from tasks GROUP BY name HAVING count() > 1) ORDER BY name; select tasks.id, tasks.name from tasks right join (select name from tasks GROUP BY name HAVING count() > 1) as dup_tasks on (tasks.name = dup_tasks.name) ORDER BY tasks.name;

7.get the list of tasks having several exact matches of both name and status, from the project ‘Garage’. Order by matches count
Select tasks.name from tasks right join projects on (tasks.project_id = projects.id) where projects.name = 'Garage' GROUP BY tasks.name, tasks.status HAVING count(tasks) > 1 ORDER BY count(tasks);

8.get the list of project names having more than 10 tasks in status ‘completed’. Order by project_id
Select projects.name from tasks right join projects on (tasks.project_id = projects.id) where tasks.status = 'completed' GROUP BY projects.id HAVING count(tasks) > 10 ORDER BY projects.id;

