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
SELECT p.name AS Name, COUNT( t.id ) AS Tasks_count FROM projects AS p LEFT JOIN tasks AS t ON p.id = t.project_id GROUP BY p.id ORDER BY Tasks_count DESC

3.get the count of all tasks in each project, order by projects names
SELECT p.name AS Name, COUNT( t.id ) AS Tasks_count FROM projects AS p LEFT JOIN tasks AS t ON p.id = t.project_id GROUP BY p.id ORDER BY Name

4.get the tasks for all projects having the name beginning with “N” letter 
Select projects.name, tasks.name from tasks inner join projects on (tasks.project_id = projects.id) where tasks.name like 'N%';

5.get the list of all projects containing the ‘a’ letter in the middle of the name, and show the tasks count near each project. Mention that there can exist projects without tasks and tasks with project_id=NULL
SELECT projects.name, COUNT(tasks.id) FROM projects RIGHT JOIN tasks ON projects.id = project_id  WHERE projects.name LIKE '_%a%_'  GROUP BY projects.name;

6.get the list of tasks with duplicate names. Order alphabetically
SELECT tasks.name, tasks.id FROM tasks INNER JOIN (SELECT id, name FROM tasks GROUP BY name HAVING count(id) > 1) dup  ON tasks.name = dup.name ORDER BY tasks.name ;

7.get the list of tasks having several exact matches of both name and status, from the project ‘Garage’. Order by matches count
SELECT tasks.name, tasks.id, tasks.status  FROM tasks INNER JOIN (SELECT id, status, name FROM tasks GROUP BY status HAVING count(id) > 1) dup ON tasks.status = dup.status WHERE project_id = (SELECT id FROM projects WHERE name = 'GARAGE') ORDER BY tasks.name;

8.get the list of project names having more than 10 tasks in status ‘completed’. Order by project_id
SELECT projects.name, COUNT(tasks.id) as count FROM projects RIGHT JOIN tasks ON projects.id = tasks.project_id WHERE tasks.status = 'completed' GROUP BY projects.name HAVING count > 10 ORDER BY projects.id;

