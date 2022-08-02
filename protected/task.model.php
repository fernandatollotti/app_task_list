<?php

    class Task 
    {
        private $id;
        private $id_status;
        private $task;
        private $date;

        public function __get( $attr )
        {
            return $this->$attr;
        }

        public function __set( $attr, $val )
        {
            $this->$attr = $val;
            return $this;
        }
    }

?>