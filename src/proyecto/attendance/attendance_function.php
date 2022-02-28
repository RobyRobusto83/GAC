<?php

include_once "../db_common.php";

function saveAttendanceData($date, $curse, $employees)
{
    try {
        deleteAttendanceDataByDate($date, $curse);
        $students = getStudentsListByCurse($curse);
        $db = getDatabase();
        $db->beginTransaction();
        $statement = $db->prepare("INSERT INTO student_attendance(student_id, date, curse_id, table_id, status) VALUES (?, ?, ?, ?, ?)");
        foreach ($employees as $employee) {
            $statement->execute([$employee->id, $date, $curse, $students[$employee->id], $employee->status]);
        }
        $db->commit();
        return true;
    } catch (Throwable $t) {
        return $t->getMessage();
    }
}

function deleteAttendanceDataByDate($date, $curse)
{
    $db = getDatabase();
    $statement = $db->prepare("DELETE FROM student_attendance WHERE date = ? AND curse_id = ?");
    return $statement->execute([$date, $curse]);
}

function getAttendanceDataByDate($date, $curse)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT student_id, status FROM student_attendance WHERE date = ? AND curse_id = ?");
    $statement->execute([$date, $curse]);
    return $statement->fetchAll();
}

function getStudentWithAttendanceCount($start, $end)
{
    $query = "select student.name, 
sum(case when status = 'presence' then 1 else 0 end) as presence_count,
sum(case when status = 'absence' then 1 else 0 end) as absence_count 
 from student_attendance
 inner join student on student.id = student_attendance.student_id
 where date >= ? and date <= ?
 group by student_id;";
    $db = getDatabase();
    $statement = $db->prepare($query);
    $statement->execute([$start, $end]);
    return $statement->fetchAll();
}

function getCurseWithAttendanceCount($start, $end)
{
    $query = "select curse.name, 
sum(case when status = 'presence' then 1 else 0 end) as presence_count,
sum(case when status = 'absence' then 1 else 0 end) as absence_count 
 from student_attendance
 inner join curse on curse.id = student_attendance.curse_id
 where date >= ? and date <= ?
 group by curse_id;";
    $db = getDatabase();
    $statement = $db->prepare($query);
    $statement->execute([$start, $end]);
    return $statement->fetchAll();
}

function getTableWithAttendanceCount($start, $end)
{
    $query = "select tables.name, 
sum(case when status = 'presence' then 1 else 0 end) as presence_count,
sum(case when status = 'absence' then 1 else 0 end) as absence_count 
 from student_attendance
 inner join tables on tables.id = student_attendance.table_id
 where date >= ? and date <= ?
 group by table_id;";
    $db = getDatabase();
    $statement = $db->prepare($query);
    $statement->execute([$start, $end]);
    return $statement->fetchAll();
}

function getCurseByID($id)
{
   $db = getDatabase();
    $statement = $db->prepare("SELECT id, name FROM curse WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetchObject();
}

function getStudentsListByCurse($curse_id)
{
    $db = getDatabase();
    $statement = $db->prepare("SELECT st.id, st.table_id FROM student st WHERE st.curse_id = ?");
    $statement->execute([$curse_id]);
    $results = $statement->fetchAll();
    $students = [];
    foreach ($results as $result) {
        $students[$result->id] = $result->table_id;
    }
    return $students;
}