<?php
    class Task
    {

        private $description;
        private $id;
        private $category_id;
        private $due;

// Construct the instance of the object

        function __construct($description, $category_id, $id = null, $due)
        {
            $this->description = $description;
            $this->id = $id;
            $this->category_id = $category_id;
            $this->due = $due;
        }

// Create getters and setters for the private properties of the object

        function setDescription($new_description)
        {
            $this->description = (string) $new_description;
        }

        function getDescription()
        {
            return $this->description;
        }

        function getId()
        {
            return $this->id;
        }

        function setId($new_id)
        {
            $this->id = (int) $new_id;
        }

        function getCategoryId()
        {
            return $this->category_id;
        }

        function setCategoryId($new_category_id)
        {
            $this->category_id = (int) $new_category_id;
        }

        function getDue()
        {
            return $this->due;
        }

        function setDue($new_due)
        {
            $this->due = (string) $new_due;
        }


// Save function queries database and inserts new information into the database. The command returns
// the id, which we set to the objects id property.

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO tasks (description, category_id, due) VALUES ('{$this->getDescription()}', {$this->getCategoryId()}, '{$this->getDue()}') RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }

// getAll function queries database and returns the stored rows of data. We reformat that data
// by storing values in $new_task. $new_task is then pushed into the array $tasks which holds our total tasks.

        static function getAll()
        {
            $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks ORDER BY due;");
            $tasks = array();
            foreach($returned_tasks as $task){
                $description = $task['description'];
                $id = $task['id'];
                $category_id = $task['category_id'];
                $due = $task['due'];
                $new_task = new Task($description, $category_id, $id, $due);
                array_push($tasks, $new_task);
            }

            return $tasks;
        }

//Deletes all data from the database

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM tasks *;");
        }

//Searches tasks based on id and returns tasks with matching id

        static function find($search_id)
        {
            $found_task = null;
            $tasks = Task::getAll();
            foreach($tasks as $task) {
                $task_id = $task->getId();
                if ($task_id == $search_id) {
                    $found_task = $task;
                }
            }
            return $found_task;
        }
    }


 ?>
