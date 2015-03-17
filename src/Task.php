<?php
    class Task
    {

        private $description;
        private $id;
        private $category_id;

// Construct the instance of the object

        function __construct($description, $id = null, $category_id)
        {
            $this->description = $description;
            $this->id = $id;
            $this->category_id = $category_id;
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


// Save function queries database and inserts new information into the database. The command returns
// the id, which we set to the objects id property.

        function save()
        {
            $statement = $GLOBALS['DB']->query("INSERT INTO tasks (description, category_id) VALUES ('{$this->getDescription()}', {$this->getCategoryId()}) RETURNING id;");
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            $this->setId($result['id']);
        }


        // {
        //     $statement = $GLOBALS['DB']->query("INSERT INTO tasks (description, category_id) VALUES  ('{$this->getDescription()}', {$this->getCategoryId()}) RETURNING id;");
        //     $result = $statement->fetch(PDO::FETCH_ASSOC);
        //     $this->setId($result['id']);
        // }

// getAll function queries database and returns the stored rows of data. We reformat that data
// by storing values in $new_task. $new_task is then pushed into the array $tasks which holds our total tasks.


        static function getAll()
        {
            $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks;");
            $tasks = array();
            foreach($returned_tasks as $task){
                $description = $task['description'];
                $id = $task['id'];
                $category_id = $task['category_id'];
                $new_task = new Task($description, $id, $category_id);
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
