<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 23.08.2018
 * Time: 15:32
 */

class Student extends \base\Model
{
    public function getAllStudents()
    {
        $sql = 'SELECT * FROM students';
        $stmt = Core::$db->getPDO()->query($sql);
        $students = [];
        while ($row = $stmt->fetch())
        {
            $students[] = $row['name'];
            $students[] = $row['lastname'];
        }

        return $students;
    }

    public function getMenu()
    {
        /*$students = $this->getAllStudents();
        ob_start();
        echo '<ul>';
        foreach ($students as $student) {
            echo '<li>' . $student['name'] . '</li>';
        }
        echo '</ul>';
        return $content = ob_get_clean();*/
    }

}