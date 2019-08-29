<?php
    class Pagination {

        public $current_page;
        public $per_page;
        public $total_count;
        
        public function __construct($page=1, $per_page=5, $total_count=0) {
            $this->current_page = (int)$page;
            $this->per_page = (int)$per_page;
            $this->total_count = (int)$total_count;
        }

        public function getOffset() {
            return (int)(($this->current_page - 1) * $this->per_page);
        }

        public function getFirstItem() {
            $item_no = $this->getOffset() + 1;
            return $item_no;
        }

        public function getLastItem() {
            if(($this->total_count - $this->getOffset()) < $this->per_page) {
                $item_no = $this->getOffset() + ($this->total_count - $this->getOffset());
            }else {
                $item_no = $this->getFirstItem() + ($this->per_page - 1);
            }
            return $item_no;
        }

        public function totalPage() {
            return ceil($this->total_count/$this->per_page);
        }

        public function getPreviousPage() {
            return $this->current_page - 1;
        }

        public function getNextPage() {
            return $this->current_page + 1;
        }

        public function hasPreviousPage() {
            return $this->getPreviousPage() >= 1 ? true : false;
        }

        public function hasNextPage() {
            return $this->getNextPage() <= $this->totalPage() ? true : false;
        }

    }

?>