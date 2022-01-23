The site is a platform for saving the information about student, their teachers and Graduate theses they have to do. Each student has many teachers and 1 graduate thesis which has a unique topic. You can search student and teachers by name, graduate thesis, and name of teacher for students and name of student for teachers.

<h2>Getting started:</h2>
<ul>
    <li>run composer install</li>
    <li>make .env file in root directory and configure it</li>
    <li>run migrations: php artisan migrate</li>
    <li>seed the database: php artisan db:seed</li>
</ul>

<h2>Registered users:</h2>
<ul>
    <li>Email: admin@admin.admin</li>
    <li>Password: admin</li>
</ul>

<h2>Models</h2>

Users:
<ul>
    <li>id                  bigint(20)</li>
    <li>name                varchar(255)</li>
    <li>email               varcher(255)</li>
    <li>email_verified_at   timestamp</li>
    <li>password            varcher(255)</li>
    <li>remember_token      varchar(100)</li>
    <li>created_at          timestamp</li>
    <li>updated_at          timestamp</li>
</ul>

Students:
<ul>
    <li>id                  bigint(20)</li>
    <li>name                varchar(255)</li>
    <li>faculty_number      varchar(255)</li>
    <li>created_at          timestamp</li>
    <li>updated_at          timestamp</li>
    <li>graduate_thesis_id  bigint(20)</li>
</ul>

Teachers:
<ul>
    <li>id                  bigint(20)</li>
    <li>name                varchar(255)</li>
    <li>created_at          timestamp</li>
    <li>updated_at          timestamp</li>
    <li>image               varchar(255)</li>
</ul>

Graduate Theses:
<ul>
    <li>id                  bigint(20)</li>
    <li>topic               varchar(255)</li>
    <li>created_at          timestamp</li>
    <li>updated_at          timestamp</li>
    <li>teacher_id  bigint(20)</li>
</ul>

<h2>Controllers:</h2>

Public views controllers:
<ul>
    <li>IndexController</li>
    <li>StudentsController</li>
    <li>TeachersController</li>
</ul>

CRUD Controllers:
<ul>
    <li>GraduateThesisCrudController</li>
    <li>StudentCrudController</li>
    <li>TeacherCrudController</li>
</ul>

<h2>Views:</h2>
    /TODO
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
